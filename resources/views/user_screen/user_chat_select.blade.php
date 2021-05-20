@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
 
        </div>
    </div>
 
    {{--  チャット可能ユーザ一覧  --}}
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>AdimnName</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($admins as $key => $admin)
        <tr>
            <th>{{$loop->iteration}}</th>
            <td>{{$admin->name}}</td>
            <td><a href="/chat/{{$admin->id}}"><button type="button" class="btn btn-primary">Chat</button></a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
 
</div>
 
@endsection