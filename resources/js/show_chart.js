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

window.make_chart = function make_chart(id, labels, data)
{
   var ctx = document.getElementById(id).getContext('2d');
   var myChart = new Chart(ctx, {
       type: 'pie',
       data: {
           labels: labels,
           datasets: [{
               label: '学生居場所割合',
               data: data,
               backgroundColor: [
                   'rgba(255, 99, 132, 0.2)',
                   'rgba(54, 162, 235, 0.2)',
                   'rgba(255, 206, 86, 0.2)',
                   'rgba(75, 192, 192, 0.2)',
                   'rgba(153, 102, 255, 0.2)',
                   'rgba(255, 159, 64, 0.2)'
               ],
               borderColor: [
                   'rgba(255, 99, 132, 1)',
                   'rgba(54, 162, 235, 1)',
                   'rgba(255, 206, 86, 1)',
                   'rgba(75, 192, 192, 1)',
                   'rgba(153, 102, 255, 1)',
                   'rgba(255, 159, 64, 1)'
               ],
               borderWidth: 1
           }]
       },
       options: {
       }
   });
};
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
               borderWidth: 1
           }]
       },
       options: {
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
               borderWidth: 1
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
               borderWidth: 1
           }]
       },
       options: {
       }
   });
};

window.make_chart1 = function make_chart1(id2, labels2, data2)
{
   var ctx = document.getElementById(id2).getContext('2d');
   var myChart = new Chart(ctx, {
       type: 'pie',
       data: {
           labels: labels2,
           datasets: [{
               label: '学生居場所割合',
               data: data2,
               backgroundColor: [
                   'rgba(255, 99, 132, 0.2)',
                   'rgba(54, 162, 235, 0.2)',
                   'rgba(255, 206, 86, 0.2)',
                   'rgba(75, 192, 192, 0.2)',
                   'rgba(153, 102, 255, 0.2)',
                   'rgba(255, 159, 64, 0.2)'
               ],
               borderColor: [
                   'rgba(255, 99, 132, 1)',
                   'rgba(54, 162, 235, 1)',
                   'rgba(255, 206, 86, 1)',
                   'rgba(75, 192, 192, 1)',
                   'rgba(153, 102, 255, 1)',
                   'rgba(255, 159, 64, 1)'
               ],
               borderWidth: 1
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
                   'rgba(255, 99, 132, 0.2)',
                   'rgba(54, 162, 235, 0.2)',
                   'rgba(255, 206, 86, 0.2)',
                   'rgba(75, 192, 192, 0.2)',
                   'rgba(153, 102, 255, 0.2)',
                   'rgba(255, 159, 64, 0.2)'
               ],
               borderColor: [
                   'rgba(255, 99, 132, 1)',
                   'rgba(54, 162, 235, 1)',
                   'rgba(255, 206, 86, 1)',
                   'rgba(75, 192, 192, 1)',
                   'rgba(153, 102, 255, 1)',
                   'rgba(255, 159, 64, 1)'
               ],
               borderWidth: 1
           }]
       },
       options: {
       }
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
                   'rgba(255, 99, 132, 0.2)',
                   'rgba(54, 162, 235, 0.2)',
                   'rgba(255, 206, 86, 0.2)',
                   'rgba(75, 192, 192, 0.2)',
                   'rgba(153, 102, 255, 0.2)',
                   'rgba(255, 159, 64, 0.2)'
               ],
               borderColor: [
                   'rgba(255, 99, 132, 1)',
                   'rgba(54, 162, 235, 1)',
                   'rgba(255, 206, 86, 1)',
                   'rgba(75, 192, 192, 1)',
                   'rgba(153, 102, 255, 1)',
                   'rgba(255, 159, 64, 1)'
               ],
               borderWidth: 1
           }]
       },
       options: {
       }
   });
};
// var ctx = document.getElementById('myChart').getContext('2d');
// var myChart = new Chart(ctx, {
//     type: 'bar',
//     data: {
//         labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
//         datasets: [{
//             label: '# of Votes',
//             data: [12, 19, 3, 5, 2, 3],
//             backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(255, 206, 86, 0.2)',
//                 'rgba(75, 192, 192, 0.2)',
//                 'rgba(153, 102, 255, 0.2)',
//                 'rgba(255, 159, 64, 0.2)'
//             ],
//             borderColor: [
//                 'rgba(255, 99, 132, 1)',
//                 'rgba(54, 162, 235, 1)',
//                 'rgba(255, 206, 86, 1)',
//                 'rgba(75, 192, 192, 1)',
//                 'rgba(153, 102, 255, 1)',
//                 'rgba(255, 159, 64, 1)'
//             ],
//             borderWidth: 1
//         }]
//     },
//     options: {
//         scales: {
//             y: {
//                 beginAtZero: true
//             }
//         }
//     }
// });