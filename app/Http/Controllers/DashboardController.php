<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\category;
use App\Models\client;
use App\Models\subcategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $count= [];
        $count['users'] = client::count();
        $count['category'] = category::count();
        $count['sub_category'] = subcategory::count();
        $count['company'] = Admin::where('role' , 'societe')->count();
      
        return view('dashboard.index' , ['count' => $count]);

    }
}
