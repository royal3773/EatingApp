@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pt-4">
            <div class="card">
                <div class="card-header">トップ画面</div>

                <div class="card-body">
                    こちらはお店のトップページです。
                </div>
            </div>
        </div>
    </div>

    <div class="pt-4">
        <p>予約合計申し込みランキング</p>
        <table class="table table-hover">
            <thead>
                <tr class="table-dark">
                    <th scope="col">順位</th>
                    <th scope="col">店名</th>
                    <th scope="col">来客数</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rankings as $ranking)
                <tr class="table-light">
                     <th scope="row">{{ $loop->index + 1 }}</th>
                     <td>{{ $admins_name[$loop->index] }}</td>
                     <td>{{ $ranking['total'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection