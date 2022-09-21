<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\professionel_cateogry;
use App\Models\proffessionel;
use App\Models\subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProffessionelController extends Controller
{

    public function index(Request $request)
    {
 
        if (auth()->user()->role == 'admin') {
            if($request->company_name){
                $company_name_list = User::where('name', 'like', "%{$request->company_name}%")->pluck('id');
             }
            $items = proffessionel::withTrashed()->when($request->company_name, function ($query, $company_name ) {
                return $query->where('first_name', 'like', "%{$company_name}%")->orWhereIn('parent_id' ,  User::where('name', 'like', "%{$company_name}%")->pluck('id'))
                ->OrWhere('last_name', 'like', "%{$company_name}%")->orWhereIn('parent_id' ,  User::where('name', 'like', "%{$company_name}%")->pluck('id'));
            }, function ($query) {
                return $query->orderBy('status' , 'asc')
                ->orderBy('created_at' , 'desc');
            })->paginate(20);
        } else if (auth()->user()->role == 'societe') {
            $items = proffessionel::withTrashed()->orderBy('status', 'asc')
                ->where('parent_id', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->get();
        }
        foreach($items as $item){
            if( $item->parent_id != null){
                $item->parent_name = User::where('id' , $item->parent_id)->value('name');
            }
        }

        $categorys = category::get();
        foreach ($categorys as $category) {
            $sub_category = subcategory::where('parent_id', $category->id)->get();
            $category->sub_category_items = $sub_category;
            $category->sub_category_count = count($sub_category);
        }
        return view('dashboard.proffessionel.index', ['items' => $items , 'categorys' => $categorys]);
    }

    public function store (Request $request){
        $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'gender' => 'required',
            'cin' => 'required',
            'email' => 'required',
            'adress' => 'required',
            'picture' => 'required',
            'phone' => 'required',
            'birthday' => 'required',



        ]);
        $prof = new proffessionel();
        $prof->last_name = $request->input('last_name');
        $prof->first_name = $request->input('first_name');
        $prof->gender = $request->input('gender');
        $prof->cin = $request->input('cin');
        $prof->email = $request->input('email');
        $prof->adress = $request->input('adress');
        $prof->phone = $request->input('phone');
        $prof->status = 'verified';
        $prof->birthday = $request->input('birthday');
        $prof->parent_id = auth()->user()->id;


        $prof->password = 'NO LOGIN';
        if ($request->file('picture')) {
            $file = $request->file('picture');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('proffessionel'), $filename);
            $prof->image = $filename;
        }
        $prof->save();

        return redirect()->route('prof')->withSuccess('proffessionel added successfully.');
    }
    public function verification(Request $request)
    {
        $request->validate([

            'prof_id' => 'required',
            'status' => 'required'
        ]);
        $user = proffessionel::where('id', $request->prof_id)->first();
        if ($request->status == 'Accept') {
            $status = 'verified';
            Mail::send('email.confirmation', ["email" => $user->email, 'name' => $user->name, 'verified' => "true"], function ($message) use ($request, $user) {
                $message->to($user->email);
                $message->subject('Account Verification');
            });
        } else if ($request->status == 'Reject') {
            Mail::send('email.confirmation', ["email" => $user->email, 'name' => $user->name, 'verified' => "false"], function ($message) use ($request, $user) {
                $message->to($user->email);
                $message->subject('Account Verification');
            });
            $status = 'rejected';
        }
        proffessionel::where('id', $request->prof_id)->update(['status' => $status]);
        return redirect()->route('prof')->withSuccess('Proffessionnel ' . $status . ' successfully.');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'prof_id' => 'required',
        ]);
        proffessionel::where('id', $request->prof_id)->delete();
        return redirect()->route('prof')->withSuccess('Proffessionnel deleted successfully.');
    }

    public function restore(Request $request)
    {
        $request->validate([
            'prof_id' => 'required',
        ]);
        proffessionel::where('id', $request->prof_id)->restore();
        return redirect()->route('prof')->withSuccess('Proffessionnel restored successfully.');
    }

    public function affect_category(Request $request){
        foreach($request->categorys as $category){

            $professionel_cateogry = new professionel_cateogry();
            $professionel_cateogry->category_id = $category;
            $professionel_cateogry->professionel_id = $request->prof_id;
          
            $professionel_cateogry->save();
        }
        return redirect()->route('prof')->withSuccess('category affected successfully.');
    }
}
