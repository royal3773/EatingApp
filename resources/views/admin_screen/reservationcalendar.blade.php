@extends('layouts.admin_app')

@section('style')
    <script src="{{ mix('js/fullcalendar.js') }}" defer></script>
    <link rel="stylesheet" href="{{ mix('css/fullcalendar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reservationcalendar.css') }}">
    @endsection
    
    @section('content')
    <div class="container">
      <div id="calendarmonth" class="calendarmonth"></div>
      <div id="calendar" class="calendar"></div>
    
    
    
    </div>

    
    
    <script src="{{ asset('js/reservationcalendar.js') }}"></script>
    
    @endsection
