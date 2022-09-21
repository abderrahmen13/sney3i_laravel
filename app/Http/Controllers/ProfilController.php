<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Get edit self profil
    public function index()
    {
        return view('dashboard.profile');
    }

    // self profil update
    public function update(Request $request){
            dd($request->all());
    }

    public function updatePassword(Request $request)
    {
        $request->validate([

            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:24|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:24|required_with:new_password|same:new_password'
        ]);


        $user = User::findOrFail(Auth::user()->id);

        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = Hash::make($request->input('new_password'));
            } else {
                return redirect()->back()->withInput();
            }
        }

        $user->save();

        return redirect()->route('profile')->withSuccess('Password updated successfully.');
    }
}
