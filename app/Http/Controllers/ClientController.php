<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    public function index(){
        $items = client::withTrashed()->orderBy('status' , 'asc')
        ->orderBy('created_at' , 'desc')->get();
        return view ('dashboard.client.index' , ['items' => $items]);

    }
    public function verification(Request $request){
        $request->validate([

            'client_id' => 'required',
            'status' => 'required'
        ]);

        $user = client::where('id' , $request->client_id)->first();
        if($request->status == 'Accept'){
            $status = 'verified';
            Mail::send('email.confirmation', ["email" => $user->email , 'name' => $user->first_name , 'verified' => "true"] ,function($message) use($request , $user){
                $message->to($user->email);
                $message->subject('Account Verification');
            });

        }else if ($request->status == 'Reject'){
            Mail::send('email.confirmation', ["email" => $user->email , 'name' => $user->first_name , 'verified' => "false"] ,function($message) use($request , $user){
                $message->to($user->email);
                $message->subject('Account Verification');
            });
            $status = 'rejected';
        }
        client::where('id' , $request->client_id)->update(['status' => $status]);
        return redirect()->route('client')->withSuccess('client '. $status .' successfully.');

    }

    public function delete(Request $request){
        $request->validate([
            'client_id' => 'required',
        ]);
        client::where('id' , $request->client_id)->delete();
        return redirect()->route('client')->withSuccess('client deleted successfully.');
    }

    public function restore(Request $request){
        $request->validate([
            'client_id' => 'required',
        ]);
        client::where('id' , $request->client_id)->restore();
        return redirect()->route('client')->withSuccess('client restored successfully.');
    }
}
