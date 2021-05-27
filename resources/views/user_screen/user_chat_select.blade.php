@extends('layouts.app')
 
@section('style')
    <link href="{{ asset('css/user_chat_select.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
 
        </div>
    </div>
 
    {{--  チャット可能ユーザ一覧  --}}
        <div class="card">
            <div class="card-header">お店の名前</div>
            @foreach($admins as $key => $admin)
                <div class="card-body border border-dark">
                    <a href="/chat/{{$admin->id}}" class="stretched-link　invisible"><p class="h3">{{$admin->name}}</p></a>
                </div>
            @endforeach
            </div>
        </div>
</div>
 
@endsection