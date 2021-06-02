@extends('layouts.app')

@section('style')
<script src="{{ mix('js/usertop.js') }}"></script>
<!-- <link href="{{ asset('css/usertop.css') }}" rel="stylesheet"> -->

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

        <form class="input-group" action="/user/top/search_keyword" method="POST">
        @csrf
            <input type="search" name="keyword" class="form-control rounded" placeholder="Search" aria-label="Search">
            <input type="text" id="latitude" name="latitude" >
            <input type="text" id="longitude" name="longitude" >
            <button type="submit" class="btn btn-outline-primary">search</button>
        </form>
                <div class="card-body">
                     こちらはユーザートップです。
                </div>
            </div>
        </div>

    </div>

        
    </div>
                <div>
                <a class="btn btn-primary" href = "userchatselect">testチャット画面一覧</a>
                </div>

                <script type="text/javascript">

</script>
</div>
@component('components.user.search_genre')
@endcomponent


@endsection

