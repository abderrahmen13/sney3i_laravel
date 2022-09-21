<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\proffessionel;
use App\Models\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {

        $items = category::withTrashed()->get();

        foreach ($items as $item) {
            $sub_category = subcategory::withTrashed()->where('parent_id', $item->id)->get();
            $item->sub_category_items = $sub_category;
            foreach($item->sub_category_items as $sub_category_count){
                $sub_category_count->professionel_count = db::table('professionel_cateogry')->where('category_id' , $sub_category_count->id)->count();
            }
            $item->sub_category_count = count($sub_category);
            $sub_category_ids = subcategory::withTrashed()->where('parent_id', $item->id)->pluck('id');
            $item->professionel_count = db::table('professionel_cateogry')->whereIn('category_id' , $sub_category_ids)->count();
        }
        return view('dashboard.category.index', ['items' => $items]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'picture' => 'required',
        ]);
        $cateogry = new category();
        $cateogry->name = $request->input('name');
        if ($request->file('picture')) {
            $file = $request->file('picture');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('icon'), $filename);
            $cateogry->icon = $filename;
        }
        $cateogry->save();

        return redirect()->route('category')->withSuccess('category added successfully.');
    }

    public function sous_category_store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'sous_category_name' => 'required',
            'picture' => 'required',
        ]);
        $cateogry = new subcategory();
        $cateogry->name = $request->input('sous_category_name');
        $cateogry->parent_id = $request->input('category_id');
        if ($request->file('picture')) {
            $file = $request->file('picture');
            $filename = date('YmdHi');
            $file->move(public_path('icon'), $filename);
            $cateogry->icon = $filename;
        }
        $cateogry->save();

        return redirect()->route('category')->withSuccess('category added successfully.');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
        ]);
        category::where('id', $request->category_id)->delete();
        return redirect()->route('category')->withSuccess('categorie supprimée.');
    }

    public function restore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
        ]);
        category::where('id', $request->category_id)->restore();
        return redirect()->route('category')->withSuccess('category restored successfully.');
    }


    public function sub_category_delete(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
        ]);
        subcategory::where('id', $request->category_id)->delete();
        return redirect()->route('category')->withSuccess('sous category deleted successfully.');
    }

    public function sub_category_restore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
        ]);
        subcategory::where('id', $request->category_id)->restore();
        return redirect()->route('category')->withSuccess('sous category restored successfully.');
    }
}
