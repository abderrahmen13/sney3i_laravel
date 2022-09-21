<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class FirstChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
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

        return Chartisan::build()
            ->labels(['Current Month'])
            ->dataset('clients', [$clients])
            ->dataset('professionnels', [$professionnels]);
    }
    
}