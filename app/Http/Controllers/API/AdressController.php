<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Adress;
use Illuminate\Http\Request;

class AdressController extends Controller
{
    public function index()
    {
        $items = Adress::get();
        return response()->json(
           $items, 200);
    }

}
