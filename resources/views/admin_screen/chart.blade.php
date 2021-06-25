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

           linechartid = 'linechart';
           linelabels = @json($linekeys);
           linedata = @json($linecounts);
           make_linechart(linechartid,linelabels,linedata);

           barweekid = 'barweek';
           barweeklabels = @json($barweekkeys);
           barweekdata = @json($barweekvalues);
           make_barweekchart(barweekid, barweeklabels, barweekdata)
       </script>
   </body>

</html>