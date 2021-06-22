@extends('layouts.admin_app')

@section('style')
    <script src="{{ mix('js/fullcalendar.js') }}" defer></script>
    <!-- <script src="https://unpkg.com/@popperjs/core@2" defer></script> -->
    <link rel="stylesheet" href="{{ mix('css/fullcalendar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reservationcalendar.css') }}">
    @endsection
    
    @section('content')
    <div class="container">
        <div class="row pb-4">
          <div id="calendarmonth" class="col-5"></div>
          <div id="calendarweek" class="col"></div>
        </div>
          <div id="calendarday" class="calendar"></div>

    
    </div>

    
    
    <!-- <script src="{{ asset('js/reservationcalendar.js') }}"></script> -->
    
    @endsection
