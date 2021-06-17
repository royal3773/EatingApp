@extends('layouts.admin_app')

@section('style')
    <script src="{{ asset('js/fullcalendar.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reservationcalendar.css') }}">
    @endsection
    
    @section('content')
    <div class="container">
      <div id="calendar" class="calendar"></div>
    </div>
    
    
    <script src="{{ asset('js/reservationcalendar.js') }}"></script>
    
    @endsection
