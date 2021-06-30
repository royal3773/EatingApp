@extends('layouts.admin_app')

@section('style')
    <link href="{{ asset('css/chart.css') }}" rel="stylesheet" >
@endsection


@section('content')
           <div class="row">
                <div class="col-7">
                    <canvas id="linechart" height="300"></canvas>
                </div>
                <div class="col-5">
                    <div class="mt-4"><canvas id="barweek"></canvas></div>
                    <div class="mt-4"><canvas id="baravgweek"></canvas></div>
                </div>
            </div>
            <div class="row">
                       <div class="col">
                           <canvas id="piesexratio"></canvas>
                        </div>
                        <div class="col">
                            <canvas id="piebyage"></canvas>
                        </div>
            </div>
@endsection

@section('script')
       <script src="{{ mix('js/show_chart.js') }}"></script>
       <script>

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
@endsection