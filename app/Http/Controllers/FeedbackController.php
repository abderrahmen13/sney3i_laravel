<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\feedback;
use App\Models\proffessionel;
use App\Models\reclamation;
use App\Models\User;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $items = feedback::get();
        return view('dashboard.feedback.index', ['items' => $items]);
    }

    public function store(Request $request){
        $feedback = new feedback();
        $feedback->fullname = $request->input('name');
        $feedback->email = $request->input('email');
        $feedback->phone = $request->input('phone');
        $feedback->content = $request->input('content');
        $feedback->save();

        return back()->withSuccess('Thank you for the feedback');
    }
    public function reclamation()
    {
        $reclamations = reclamation::get();

        foreach ($reclamations as $reclamation) {
            $username = client::where('id', $reclamation->user_id)->value('first_name');
            $proffessionel_name = proffessionel::where('id', $reclamation->proffessionnel_id)->first();
            $reclamation->user_name = $username;
            $reclamation->proffessionel_name = $proffessionel_name->first_name . ' ' . $proffessionel_name->last_name;
        }
        return view('dashboard.feedback.reclamation', ['items' => $reclamations]);
    }

    public function update_reclamation(Request $request){
        $request->validate([
            'reclamation_id' => 'required',
            'status' => 'required',

        ]);

        reclamation::where('id' , $request->reclamation_id)->update(['status' => $request->status]);
        return redirect()->route('reclamation')->withSuccess('Reclamation updated successfully.');

    }
}
