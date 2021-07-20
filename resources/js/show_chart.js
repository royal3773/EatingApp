import {
  Chart,
  ArcElement,
  LineElement,
  BarElement,
  PointElement,
  BarController,
  BubbleController,
  DoughnutController,
  LineController,
  PieController,
  PolarAreaController,
  RadarController,
  ScatterController,
  CategoryScale,
  LinearScale,
  LogarithmicScale,
  RadialLinearScale,
  TimeScale,
  TimeSeriesScale,
  Decimation,
  Filler,
  Legend,
  Title,
  Tooltip
} from 'chart.js';

Chart.register(
  ArcElement,
  LineElement,
  BarElement,
  PointElement,
  BarController,
  BubbleController,
  DoughnutController,
  LineController,
  PieController,
  PolarAreaController,
  RadarController,
  ScatterController,
  CategoryScale,
  LinearScale,
  LogarithmicScale,
  RadialLinearScale,
  TimeScale,
  TimeSeriesScale,
  Decimation,
  Filler,
  Legend,
  Title,
  Tooltip
);

window.make_line_chart = function make_line_chart(line_chart_id, line_labels, line_data)
{

   var ctx = document.getElementById(line_chart_id).getContext('2d');
   var myChart = new Chart(ctx, {
       type: 'line',
       data: {
           labels: line_labels,
           datasets: [{
               label: '月別来客数',
               data: line_data,
               borderWidth: 3,
               backgroundColor: 'rgb(75, 192, 192)',
               borderColor: 'rgb(75, 192, 192)'
           }]
       },
       options: {
        scales: {
          y: {
              min: 0
          }
      }
       }
   });
};
window.make_bar_week_chart = function make_bar_week_chart(bar_week_id, bar_week_labels, bar_week_data) 
{
   var ctx = document.getElementById(bar_week_id).getContext('2d');
   var myChart = new Chart(ctx, {
       type: 'bar',
       data: {
           labels: bar_week_labels,
           datasets: [{
               label: '曜日別来客数',
               data: bar_week_data,
               borderWidth: 1,
               backgroundColor: 'rgb(75, 192, 192)',
               borderColor: 'rgb(75, 192, 192)'

           }]
       },
       options: {
       }
   });
};
window.make_bar_avg_week_chart = function make_bar_avg_week_chart(bar_avg_week_id, bar_avg_week_labels, bar_avg_week_data) 
{
   var ctx = document.getElementById(bar_avg_week_id).getContext('2d');
   var myChart = new Chart(ctx, {
       type: 'bar',
       data: {
           labels: bar_avg_week_labels,
           datasets: [{
               label: '全体の曜日別来客数平均',
               data: bar_avg_week_data,
               borderWidth: 1 ,
               backgroundColor: 'rgb(75, 192, 192)',
               borderColor: 'rgb(75, 192, 192)'

           }]
       },
       options: {
       }
   });
};

window.make_pie_sex_ratio_chart = function make_pie_sex_ratio_chart(pie_sex_ratio_id, pie_sex_ratio_labels, pie_sex_ratio_data)
{
   var ctx = document.getElementById(pie_sex_ratio_id).getContext('2d');
   var myChart = new Chart(ctx, {
       type: 'pie',
       data: {
           labels: pie_sex_ratio_labels,
           datasets: [{
               label: '男女比率',
               data: pie_sex_ratio_data,
               backgroundColor: [
                   'rgba(255, 127, 127, 36.06)',
                   'rgba(158, 206, 255, 81.08)',
               ],
               borderColor: [
                   'rgba(255, 127, 127, 48.59)',
                   'rgba(0, 128, 255, 18.77)',
               ],
               borderWidth: 1
           }]
       },
       options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: '男女比率'
          }
        }
      },
   });
};
window.make_pie_by_age_chart = function make_pie_by_age_chart(pie_by_age_id, pie_by_age_labels, pie_by_age_data)
{
   var ctx = document.getElementById(pie_by_age_id).getContext('2d');
   var myChart = new Chart(ctx, {
       type: 'pie',
       data: {
           labels: pie_by_age_labels,
           datasets: [{
               label: '年齢別比率',
               data: pie_by_age_data,
               backgroundColor: [
                   'rgba(255, 127, 127, 36.06)',
                   'rgba(255, 158, 206, 42.32)',
                   'rgba(255, 206, 86, 0.2)',
                   'rgba(206, 158, 255, 35.91)',
                   'rgba(158, 206, 255, 81.08)',
                   'rgba(158, 255, 255, 94.31)',
                   'rgba(158, 255, 158, 92.24)',
                   'rgba(255, 255, 158, 98.13)',
                   'rgba(255, 206, 158, 85.94)',
               ],
               borderColor: [
                   'rgba(255, 127, 127, 48.59)',
                   'rgba(255, 132, 193, 53.5)',
                   'rgba(255, 206, 86, 1)',
                   'rgba(191, 127, 255, 48.55)',
                   'rgba(127, 191, 255, 75.44)',
                   'rgba(127, 255, 255, 93.12)',
                   'rgba(127, 255, 127, 90.57)',
                   'rgba(255, 255, 127, 97.75)',
                   'rgba(255, 191, 127, 81.86)',
               ],
               borderWidth: 1
           }]
       },
       options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: '年齢別比率'
          }
        }
      },
   });
};
