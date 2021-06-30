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
        //男女比率
        $pie_sex_querys = Reservation::where('admin_id', $admin_id)->join('users', 'users.id', '=', 'reservations.user_id')
        ->selectRaw('SUM(CASE  sex  WHEN "man" THEN 1 ELSE 0 END) AS "男"')
        ->selectRaw('SUM(CASE  sex  WHEN "female" THEN 1 ELSE 0 END) AS "女"')->get()->toArray();
        $pie_sex_ratio_labels = array_keys($pie_sex_querys[0]);
        $pie_sex_ratio_data = array_values($pie_sex_querys[0]);


        //年齢別
        $pie_by_age_querys = Reservation::where('admin_id', $admin_id)->join('users', 'users.id', '=', 'reservations.user_id')
        ->selectRaw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthday, CURDATE()) >= 0 AND TIMESTAMPDIFF(YEAR, birthday, CURDATE()) <= 10 THEN 1 ELSE 0 END) AS "10才以下"')
        ->selectRaw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthday, CURDATE()) >= 11 AND TIMESTAMPDIFF(YEAR, birthday, CURDATE()) <= 20 THEN 1 ELSE 0 END) AS "11~20"')
        ->selectRaw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthday, CURDATE()) >= 21 AND TIMESTAMPDIFF(YEAR, birthday, CURDATE()) <= 30 THEN 1 ELSE 0 END) AS "21~30"')
        ->selectRaw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthday, CURDATE()) >= 31 AND TIMESTAMPDIFF(YEAR, birthday, CURDATE()) <= 40 THEN 1 ELSE 0 END) AS "31~40"')
        ->selectRaw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthday, CURDATE()) >= 41 AND TIMESTAMPDIFF(YEAR, birthday, CURDATE()) <= 50 THEN 1 ELSE 0 END) AS "41~50"')
        ->selectRaw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthday, CURDATE()) >= 51 AND TIMESTAMPDIFF(YEAR, birthday, CURDATE()) <= 60 THEN 1 ELSE 0 END) AS "51~60"')
        ->selectRaw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthday, CURDATE()) >= 61 AND TIMESTAMPDIFF(YEAR, birthday, CURDATE()) <= 70 THEN 1 ELSE 0 END) AS "61~70"')
        ->selectRaw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthday, CURDATE()) >= 71 AND TIMESTAMPDIFF(YEAR, birthday, CURDATE()) <= 80 THEN 1 ELSE 0 END) AS "71~80"')
        ->selectRaw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthday, CURDATE()) >= 81 THEN 1 ELSE 0 END) AS "80才以上"')->get()->toArray();
        
        $pie_by_age_labels = array_keys($pie_by_age_querys[0]);
        $pie_by_age_data = array_values($pie_by_age_querys[0]);

        $keys = ['家','研究室','外出','学内','長期不在'];
        $keys1 = ['アイウエ','お','なんでな','やい','えい'];
        $counts = [10,4,3,2,1];
        $counts = [10,4,3,2,1];
        return view('admin_screen.chart',[
            'line_labels' => $line_labels, 'line_data' => $line_data, 
            'bar_week_labels' => $bar_week_labels, 'bar_week_data' => $bar_week_data, 'bar_avg_week_data' => $bar_avg_week_data, 
            'pie_sex_ratio_labels' => $pie_sex_ratio_labels, 'pie_sex_ratio_data' => $pie_sex_ratio_data,
            'pie_by_age_labels' => $pie_by_age_labels, 'pie_by_age_data' => $pie_by_age_data,
            'keys' => $keys, 'counts' => $counts, 'keys1' => $keys1]);
    }
}
