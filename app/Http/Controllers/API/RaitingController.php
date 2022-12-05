<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\raiting;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RaitingController extends Controller
{
    public function index(Request $request){
  
Rating::create($request->all());
        return response()->json([
            'success' => true,
            'message' => ' raiting added Successfully!'
        ], 200);

    }
    
    public function prof_rating($id)
    {
        $items = Rating::where('proffessionnel_id', $id)->first();
        return response()->json($items, 200);
    }
}
