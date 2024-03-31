@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="main_head">
    <h2>打刻画面</h2>
    <h2>{{ $user->name }}さんの打刻ページです</h2>
    <input type="hidden" name="user_id" value="{{ $user->id }}" />
    <input type="hidden" name="user_email" value="{{ $user->email }}" />
    <p><?php
        $start_time = date("Y-m-d H:i:s");

        print_r($start_time);

        ?></p>
</div>
<form class="form_work_start" action="/workstart" method="post">
    @csrf
    <div class="work_start_btn">
        <input type="hidden" name="user_id" value="{{ $user->id }}" />
        <input type="hidden" name="user_name" value="{{ $user->name }}" />
        <input type="hidden" name="user_email" value="{{ $user->email }}" />
        <input type="hidden" name="work_date" />
        <input type="hidden" name="work_start_time" />
        <input type="submit" value="出勤" />
    </div>
</form>
<form class="form_work_end" action="/workend" method="post">
    @csrf
    <div class="work_end_btn">
        <input type="hidden" name="user_id" value="{{ $user->id }}" />
        <input type="hidden" name="user_name" value="{{ $user->name }}" />
        <input type="hidden" name="user_email" value="{{ $user->email }}" />
        <input type="hidden" name="work_date" />
        <input type="hidden" name="work_end_time" />
        <input type="submit" value="退勤" />
    </div>
</form>
<form class="form_break_start" action="/breakstart" method="post">
    @csrf
    <div class="break_start_btn">
        <input type="submit" value="休憩開始" />
    </div>
</form>
<form class="form_break_end" action="/breakend" method="post">
    @csrf
    <div class="break_end_btn">
        <input type="submit" value="休憩終了" />
    </div>
</form>
@endsection