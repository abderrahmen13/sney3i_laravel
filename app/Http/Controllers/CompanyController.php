<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; 

class CompanyController extends Controller
{
    public function index(Request $request){
        $items = User::withTrashed()->where('role' , 'societe')
        ->when($request->company_name, function ($query, $company_name) {
            return $query->where('name', 'like', "%{$company_name}%");
        }, function ($query) {
            return $query->orderBy('status' , 'asc')
            ->orderBy('created_at' , 'desc');
        })->paginate(20);

        return view('dashboard.company.index' , ['items' => $items]);
    }

    public function verification(Request $request){
        $request->validate([

            'company_id' => 'required',
            'status' => 'required'
        ]);
        $user = User::where('id' , $request->company_id)->first();
        
        if($request->status == 'Accept'){
            $status = 'verified';
            Mail::send('email.confirmation', ["email" => $user->email , 'name' => $user->name , 'verified' => "true"] ,function($message) use($request , $user){
                $message->to($user->email);
                $message->subject('Account Verification');
            });

        }else if ($request->status == 'Reject'){
            Mail::send('email.confirmation', ["email" => $user->email , 'name' => $user->name , 'verified' => "false"] ,function($message) use($request , $user){
                $message->to($user->email);
                $message->subject('Account Verification');
            });
            $status = 'rejected';
        }
        User::where('id' , $request->company_id)->update(['status' => $status]);
        return redirect()->route('company')->withSuccess('Societe '. $status .' successfully.');

    }

    public function delete(Request $request){
        $request->validate([
            'company_id' => 'required',
        ]);
        User::where('id' , $request->company_id)->delete();
        return redirect()->route('company')->withSuccess('Societe deleted successfully.');
    }

    public function restore(Request $request){
        $request->validate([
            'company_id' => 'required',
        ]);
        User::where('id' , $request->company_id)->restore();
        return redirect()->route('company')->withSuccess('Societe restored successfully.');
    }
}
