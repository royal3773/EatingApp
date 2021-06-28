<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use DB;
use App\Model\User;
use App\Model\Admin;
use App\Model\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function index()
    {
        $admin_id = Auth::id();

        //月別売上推移　棒グラフ
        $line_query = Reservation::where('admin_id', $admin_id)->selectRaw("DATE_FORMAT(date, '%Y-%m') as month,SUM(count) as total_count")->groupBy('month')->get()->toArray();
        $date_2021_01 = new DateTime('2020-01');
        $date_this_month = new DateTime(date('Y-m'));
        $diff_month = $date_2021_01->diff($date_this_month)->format('%m')+1;
        $this_year = "2021";
        for($i=0; $i<$diff_month; $i++){
            $line_labels[] = $this_year."-0".$i+1;
            $search_month = array_search($line_labels[$i], array_column($line_query, 'month'));
            if(false === $search_month){
                $line_data[] = 0;
            }else{
                $line_data[] = $line_query[$search_month]['total_count'];
            }
        }

        //今週の曜日を取得
        $monday = date('Y-m-d', strtotime('monday this week'));
        $tuesday = date('Y-m-d', strtotime('tuesday this week'));
        $wednesday = date('Y-m-d', strtotime('wednesday this week'));
        $thursday = date('Y-m-d', strtotime('thursday this week'));
        $friday = date('Y-m-d', strtotime('friday this week'));
        $saturday = date('Y-m-d', strtotime('saturday this week'));
        $sunday = date('Y-m-d', strtotime('sunday this week'));
        $bar_week_labels = [$monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday];
        //曜日ごとの合計値
        $bar_week_query = Reservation::where('admin_id', $admin_id)->whereBetween('date',[$monday, $sunday])->selectRaw("DATE_FORMAT(date, '%Y-%m-%d') as month,SUM(count) as total_count")->groupBy('month')->get()->toArray();
        for($i=0; $i<7; $i++){
            $search_week = array_search($bar_week_labels[$i], array_column($bar_week_query, 'month'));
            if(false === $search_week){
                $bar_week_data[] = 0;
            }else{
                $bar_week_data[] = $bar_week_query[$search_week]['total_count'];
            }
        }
        //曜日毎の平均値
        $bar_avg_week_query = Reservation::whereBetween('date',[$monday, $sunday])->selectRaw("DATE_FORMAT(date, '%Y-%m-%d') as month,SUM(count) as total_count")->groupBy('month')->get()->toArray();
        $bar_avg_week_count_query = Reservation::selectRaw('admin_id')->groupBy('admin_id')->get();
        $bar_avg_count = count($bar_avg_week_count_query);
        for($i=0; $i<7; $i++){
            $search_week = array_search($bar_week_labels[$i], array_column($bar_avg_week_query, 'month'));
            if(false === $search_week){
                $bar_avg_week_data[] = 0;
            }else{
                $bar_avg_week_data[] = intval($bar_avg_week_query[$search_week]['total_count']) / $bar_avg_count;
            }
        }
        // dd($barweekvalues);
        $keys = ['家','研究室','外出','学内','長期不在'];
        $keys1 = ['アイウエ','お','なんでな','やい','えい'];
        $counts = [10,4,3,2,1];
        $counts = [10,4,3,2,1];
        return view('admin_screen.chart',['line_labels' => $line_labels, 'line_data' => $line_data, 'bar_week_labels' => $bar_week_labels, 'bar_week_data' => $bar_week_data, 'bar_avg_week_data' => $bar_avg_week_data, 'keys' => $keys, 'counts' => $counts, 'keys1' => $keys1]);
    }
}
