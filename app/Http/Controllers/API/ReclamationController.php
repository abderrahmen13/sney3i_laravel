<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\reclamation;
use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'user_id' => 'required',
            'content' => 'required',
            'proffessionnel_id' => 'required',
            'status' => 'required',
        ]);

        $reclamation = new reclamation();
        $reclamation->user_id = $request->user_id;
        $reclamation->content = $request->content ; 
        $reclamation->proffessionnel_id = $request->proffessionnel_id;
        $reclamation->status = 'pending' ; 
        $reclamation->save();
        return response()->json([
            'success' => true,
            'message' => ' reclamation added Successfully!'
        ], 200);
    }
}
