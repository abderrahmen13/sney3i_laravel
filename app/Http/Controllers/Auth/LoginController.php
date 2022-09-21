<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
       
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'verified'])) {
            $request->session()->regenerate();
            return redirect('dashboard');
        }else{
            return back()->withErrors([
                'email' => 'Verifiez vos données s\'il vous plait',
            ])->onlyInput('email');
        }

 
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function register(Request $request){
        $comapny = new User();
        $comapny->name = $request->input('name');
        $comapny->email = $request->input('email');
        $comapny->phone = $request->input('phone');
        $comapny->adress = $request->input('siege');
        $comapny->patente = $request->input('patente');
        $comapny->password = Hash::make($request->input('password'));
        if ($request->file('picture')) {
            $file = $request->file('picture');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('company'), $filename);
            $comapny->image = $filename;
        }

        $comapny->role = 'societe';
        $save =$comapny->save();
        return back()->withSuccess(
            'Votre compt est creer avec success ...  vous recevrer un email de confirmation bientot'
        );
    }
}

