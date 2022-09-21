<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\client;
use App\Models\client_favorite;
use App\Models\Favoris;
use App\Models\professionel_cateogry;
use App\Models\proffessionel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class ProfessionelController extends Controller
{
    public function index($id ,$user_id)
    {
        $specialist=professionel_cateogry::where('category_id',$id)->
        with('favories', function ( $q) use ($user_id){
            $q->where('client_id', $user_id);
        })->with('person.rating')->get();
 
        return response()->json(
            $specialist
        );  
    }

    public function prof_details($id)
    {

        $item = proffessionel::with('rating')->where('id', $id)->get();
        return response()->json(
            ["data" => $item]
        );
    }

    public function prof_category(Request $request)
    {
        foreach($request->categories as $category){

            $professionel_cateogry = new professionel_cateogry();
            $professionel_cateogry->category_id = $category;
            $professionel_cateogry->professionel_id = $request->professionel_id;
            Log::emergency($professionel_cateogry);
            $professionel_cateogry->save();
        }
        proffessionel::where('id', $request->professionel_id)->update(['has_completed'=>1]);
        return response()->json(
            'category affected'
        );
    }

    public function favori_list($user_id)
    {
        $favoris= Favoris::where('client_id', $user_id)->with('person')->get();

        return response()->json(
            $favoris
        );
    }

    public function add_favori(Request $request)
    {
        $client_favorite = Favoris::create($request->all());
        return response()->json(
            'favori affected'
        );
    }



    public function remove_favori(Request $request)
    {
        Log::emergency($request->all());
        $favoris=Favoris::where('client_id' , $request->client_id)->
        where('proffessionel_id' , $request->proffessionel_id )->delete();
        return response()->json(
            'favori removed'
        );
    }


}
