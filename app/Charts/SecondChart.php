<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\subcategory;
use App\Models\category;
use App\Models\professionel_cateogry;


class SecondChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
     
        $proffessions = category::get();
        $labels = [] ; 
        $count = [] ; 
        foreach ($proffessions as $proffession){
            $category_list = subcategory::where('parent_id' , $proffession->id)->pluck('id');
            array_push($labels , $proffession->name);
            $proffessionel_count = professionel_cateogry::whereIn('category_id' , $category_list)->count();
            array_push($count , $proffessionel_count);
        }
        return Chartisan::build()
            ->labels($labels)
            ->dataset('proffesion', $count);
    }
}