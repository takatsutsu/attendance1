@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/complete.css') }}">
@endsection
@section('content')
    <div class="main_head">
    <h2 class="small-tittle">打刻確認画面</h2>
    <form action="/" method="get">
        <div class=" form_main">
            打刻しました

        </div>
        <div class="form_btn">
            <input type="submit" value="HOME" />
        </div>

    </form>

    @endsection