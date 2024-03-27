@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="main_head">
    <h2>打刻画面</h2>
    <?php $user = Auth::User(); ?>
    <h2>{{ $user->name }}さんの打刻ページです</h2>
    <input type="hidden" name="user_id" value="{{ $user->id }}" />
    <input type="hidden" name="user_email" value="{{ $user->email }}" />
    <p><?php
        $start_time = date("Y-m-d H:i:s");

        print_r($start_time);

        ?></p>
</div>
<form class="form_work_start" action="/complete" method="post">
    @csrf
    <div class="work_start_btn">
        <input type="hidden" name="user_id" value="{{ $user->id }}" />
        <input type="hidden" name="user_name" value="{{ $user->name }}" />
        <input type="hidden" name="user_email" value="{{ $user->email }}" />
        <?php $nowtime = date("Y-m-d H:i:s");
        $today = date("Y-m-d");
        print_r($today); ?>
        <input type="hidden" name="work_date" value="{{ $today }}" />
        <input type="hidden" name="work_start_time" value="{{ $start_time }}" />
        <input type="submit" value="出勤" />
    </div>
</form>
<form class="form_work_end" action="/complete" method="post">
    @csrf
    <div class="work_end_btn">
        <input type="submit" value="退勤" />
    </div>
</form>
<form class="form_break_start" action="/complete" method="post">
    @csrf
    <div class="break_start_btn">
        <input type="submit" value="休憩開始" />
    </div>
</form>
<form class="form_break_end" action="/complete" method="post">
    @csrf
    <div class="break_end_btn">
        <input type="submit" value="休憩終了" />
    </div>
</form>
@endsection