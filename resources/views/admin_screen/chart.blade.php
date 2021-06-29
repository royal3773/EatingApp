<!DOCTYPE html>
<html lang="ja">

   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <script src="{{ asset('js/show_chart.js') }}"></script>
       <title>Laravel</title>
   </head>

   <body>
       <div class="content">
           <canvas id="allChart"></canvas>
           <canvas id="chart1"></canvas>
           <canvas id="linechart"></canvas>
           <canvas id="barweek"></canvas>
           <canvas id="baravgweek"></canvas>
           <canvas id="piesexratio"></canvas>
           <canvas id="piebyage"></canvas>
           <!-- <canvas id="myChart" width="400" height="400"></canvas> -->
       </div>

       <script src="{{ mix('js/show_chart.js') }}"></script>
       <script>
           id = 'allChart';
           labels = @json($keys);
           data = @json($counts);
           make_chart(id,labels,data);

           id2 = 'chart1';
           labels2 = @json($keys1);
           data2 = @json($counts);
           make_chart1(id2,labels2,data2);

           line_chart_id = 'linechart';
           line_labels = @json($line_labels);
           line_data = @json($line_data);
           make_line_chart(line_chart_id,line_labels,line_data);

           bar_week_id = 'barweek';
           bar_week_labels = @json($bar_week_labels);
           bar_week_data = @json($bar_week_data);
           make_bar_week_chart(bar_week_id, bar_week_labels, bar_week_data);

           bar_avg_week_id = 'baravgweek';
           bar_avg_week_labels = @json($bar_week_labels);
           bar_avg_week_data = @json($bar_avg_week_data);
           make_bar_avg_week_chart(bar_avg_week_id, bar_avg_week_labels, bar_avg_week_data);

           pie_sex_ratio_id = 'piesexratio';
           pie_sex_ratio_labels = @json($pie_sex_ratio_labels);
           pie_sex_ratio_data = @json($pie_sex_ratio_data);
           make_pie_sex_ratio_chart(pie_sex_ratio_id, pie_sex_ratio_labels, pie_sex_ratio_data);

           pie_by_age_id = 'piebyage';
           pie_by_age_labels = @json($pie_by_age_labels);
           pie_by_age_data = @json($pie_by_age_data);
           make_pie_by_age_chart(pie_by_age_id, pie_by_age_labels, pie_by_age_data);
       </script>
   </body>

</html>