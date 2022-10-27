<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\category;
use App\Models\client;
use App\Models\subcategory;
use Illuminate\Http\Request;
use App\Charts\FirstChart;
use App\Charts\SecondChart;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\professionel_cateogry;

class DashboardController extends Controller
{
    public function index() {
        $count= [];
        $count['users'] = client::count();
        $count['category'] = category::count();
        $count['sub_category'] = subcategory::count();
        $count['company'] = Admin::where('role' , 'societe')->count();

        $sub = Carbon::now();
        $now = Carbon::now();

        $sub_month = $sub->subMonth()->format('Y-m');
        $curr_month = $now->format('Y-m');

        $clients = DB::table('clients')
            ->where('created_at', 'LIKE', "%" . $curr_month . "%")
            ->count();

        $professionnels = DB::table('professionnels')
            ->where('created_at', 'LIKE', "%" . $curr_month . "%")
            ->count();

        $firstChart = new FirstChart;
        $firstChart->labels(['Current Month']);
        $firstChart->dataset('clients', 'bar', [$clients]);
        $firstChart->dataset('professionnels', 'bar', [$professionnels]);
        

        $proffessions = category::get();
        $labels = [] ; 
        $count2 = [] ; 
        foreach ($proffessions as $proffession){
            $category_list = subcategory::where('parent_id' , $proffession->id)->pluck('id');
            array_push($labels , $proffession->name);
            $proffessionel_count = professionel_cateogry::whereIn('category_id' , $category_list)->count();
            array_push($count2 , $proffessionel_count);
        }
        $secondChart = new SecondChart;
        $secondChart->labels($labels);
        $secondChart->dataset('proffesion', 'bar', $count2);
      
        return view('dashboard.index' , ['count' => $count, 'firstChart' => $firstChart, 'secondChart' => $secondChart]);

    }
}
