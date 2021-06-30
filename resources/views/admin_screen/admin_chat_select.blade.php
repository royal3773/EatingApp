@extends('layouts.admin_app')

@section('style')
    <!-- <link href="{{ asset('css/admin_.css') }}" rel="stylesheet"> -->
@endsection
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        </div>
    </div>
    {{--  チャット可能ユーザ一覧  --}}
        <div class="card">
            <div class="card-header">お客様の名前</div>
            @foreach($users as $key => $user)
                <div class="card-body border border-dark">
                    <a href="/chat/{{$user->id}}" class="stretched-link　invisible"><p class="h3">{{$user->name}}</p></a>
                </div>
            @endforeach
            </div>
        </div>
</div>
 
@endsection