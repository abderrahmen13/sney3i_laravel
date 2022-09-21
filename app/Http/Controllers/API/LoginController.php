<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\client;
use App\Models\proffessionel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    public function register(Request $request)
    {

        $img = $request->image;

        $folderPath = "/proffessionel/";

        $image = str_replace('data:image/png;base64,', '', $img);
        $image = str_replace(' ', '+', $image);
        $imageName = uniqid().'.'.'png';
        \File::put(public_path(). '/proffessionel/' . $imageName, base64_decode($image));
      
        if ($request->Role == 'client') {

            $request->merge([
                'password' => hash::make($request->password),
                'image' =>'/proffessionel/'.$imageName
            ]);
            $user = client::create($request->all());
            return true;
        } else if ($request->Role == 'professionel') {
            $request->merge([
                'password' => hash::make($request->password),
                'image' =>'/proffessionel/'.$imageName
            ]);
            Log::emergency($request->all());

            $user = proffessionel::create($request->all());
            return true;
        } else {

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!'
            ], 400);
        }
    }


    public function login(Request $request)
    {
        if ($request->user_type == "client") {

            $user = client::where('email', $request->email)
            ->where('status','!=','Pending')
            ->first();
            if(!$user)
            { return response()->json([
                 'success' => false,
                 'message' => "bad credentials",
                 
             ], 200);}
            if(Hash::check($request->password, $user->password)){
                return response()->json([
                    'success' => true,
                    'role' => 'client',
                    'user_id' => $user->id,
                    'user_data' => $user

                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "bad credentials",
                ], 200);
            }
        } else  if ($request->user_type == "professionel") {
            $user = proffessionel::where('email', $request->email)
            ->where('status','!=','Pending')
            
            ->first();
            if(!$user)
           { return response()->json([
                'success' => false,
                'message' => "no user",
                
            ], 200);}
            if(Hash::check($request->password, $user->password)){
              
                return response()->json([
                    'success' => true,
                    'role' => 'professionel',
                    'user_id' => $user->id,
                    'user_data' => $user
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "bad credentials",

                ], 200);
            }
        }
    }

    public function profil(Request $request)
    {
        if ($request->user_type == 'client') {
            $user = client::where('id', $request->id)->first();
            return response()->json([
                'success' => true,
                'user' => $user
            ], 200);
        } else if ($request->user_type == 'professionel') {
            $user = proffessionel::where('id', $request->id)->first();
            return response()->json([
                'success' => true,
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'no user type provided'
            ], 200);
        }
    }

    public function profil_update(Request $request)
    {

        if ($request->user_type == 'client') {
            if ($request->password == "") {
                $data = [
                    "first_name" => $request->first_name,
                    "last_name" => $request->last_name,
                    "email" => $request->email
                ];
            } else {
                $data = [
                    "first_name" => $request->first_name,
                    "last_name" => $request->last_name,
                    "email" => $request->email,
                    "password" => Hash::make($request->password)
                ];
            }


            $user = client::where('id', $request->id)->update($data);
            // $user = client::where('id' , $request->id)->first();
            return response()->json([
                'success' => true,
                // 'user' => $user
            ], 200);
        } else if ($request->user_type == 'professionel') {
            if ($request->password == "") {
                $data = [
                    "first_name" => $request->first_name,
                    "last_name" => $request->last_name,
                    "email" => $request->email
                ];
            } else {
                $data = [
                    "first_name" => $request->first_name,
                    "last_name" => $request->last_name,
                    "email" => $request->email,
                    "password" => Hash::make($request->password)
                ];
            }
            $user = proffessionel::where('id', $request->id)->update($data);
            // $user = proffessionel::where('id' , $request->id)->first();
            return response()->json([
                'success' => true,
                // 'user' => $user
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'no user type provided'
            ], 200);
        }
    }

    public function user_image(Request $request)
    {
        if($request->user_type == 'client'){
            $item = client::where('id' , $request->user_id)->value('picture');
        }elseif($request->user_type = 'prof'){
            $item = proffessionel::where('id' , $request->user_id)->value('picture');
        }
        return response()->json([
          $item
        ], 200);
    }
}
