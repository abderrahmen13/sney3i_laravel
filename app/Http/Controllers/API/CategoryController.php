<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\subcategory;
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

}
