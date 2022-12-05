<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\professionel_cateogry;
use App\Models\proffessionel;
use App\Models\subcategory;
use App\Models\Rating;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $items = category::get();
        foreach ($items as $item) {
            $sub_category = subcategory::where('parent_id', $item->id)->get();
            $item->sub_category_items = $sub_category;
            $item->sub_category_count = count($sub_category);
        }
        
        return response()->json(
           $items, 200);
    }

    public function subcategory($id)
    {
        $items = subcategory::where('parent_id', $id)->get();
        foreach ($items as $item) {
            $item->prof_count = 10;
        }
        return response()->json($items, 200);
    }
    
    public function category_prof($id)
    {
        $profs = [];
        $items = professionel_cateogry::where('category_id', $id)->get();
        foreach ($items as $item) {
            $prof = proffessionel::where('id',$item->professionel_id)->whereNull('deleted_at')->get();
            $rating = Rating::where('proffessionnel_id', $item->professionel_id)->value('rating');
            array_push($profs,['rating' => $rating, 'prof' => $prof]);
        }
        $profss = collect($profs)->sortBy('rating')->reverse()->toArray();
        $pp = [];
        foreach ($profss as $ii) {
            array_push($pp,$ii['prof']);
        }
        return response()->json($pp, 200);
    }
    
    public function category_prof_adress($id,$adress)
    {
        $profs = [];
        $items = professionel_cateogry::where('category_id', $id)->get();
        foreach ($items as $item) {
            $prof = proffessionel::where('id',$item->professionel_id)->where('adress',$adress)->whereNull('deleted_at')->get();
            $rating = Rating::where('proffessionnel_id', $item->professionel_id)->value('rating');
            array_push($profs,['rating' => $rating, 'prof' => $prof]);
        }
        $profss = collect($profs)->sortBy('rating')->reverse()->toArray();
        $pp = [];
        foreach ($profss as $ii) {
            array_push($pp,$ii['prof']);
        }
        return response()->json($pp, 200);
    }

}
