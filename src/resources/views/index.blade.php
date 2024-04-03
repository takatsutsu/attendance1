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
        <?php
        if ($flag1 == "A") {
            $visu1 = "";
        }
        if ($flag1 == "B" || $flag1 == 'C'  || $flag1 == 'D' || $flag1 == 'E') {
            $visu1 = "disabled";
        }
        ?>
        <button type="submit" {{ $visu1 }}>出　勤</button>
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
        <?php
        if ($flag1 == "B" || $flag1 == 'C') {
            $visu2 = "";
        }
        if ($flag1 == "A" || $flag1 == 'D' || $flag1 == 'E') {
            $visu2 = "disabled";
        }
        ?>
        <button type="submit" {{ $visu2 }}>退　勤</button>
    </div>
</form>

<form class="form_break_start" action="/breakstart" method="post">
    @csrf
    <div class="break_start_btn">
        <input type="hidden" name="user_id" value="{{ $user->id }}" />
        <input type="hidden" name="user_name" value="{{ $user->name }}" />
        <input type="hidden" name="user_email" value="{{ $user->email }}" />
        <input type="hidden" name="break_date" />
        <input type="hidden" name="break_start_time" />
        <?php
        if ($flag1 == "B" || $flag1 == 'C') {
            $visu3 = "";
        }
        if ($flag1 == "A" || $flag1 == 'D' || $flag1 == 'E') {
            $visu3 = "disabled";
        }
        ?>
        <button type="submit" {{ $visu3 }}>休憩開始</button>
    </div>
</form>

<form class="form_break_end" action="/breakend" method="post">
    @csrf
    <div class="break_end_btn">
        <input type="hidden" name="user_id" value="{{ $user->id }}" />
        <input type="hidden" name="user_name" value="{{ $user->name }}" />
        <input type="hidden" name="user_email" value="{{ $user->email }}" />
        <input type="hidden" name="break_date" />
        <input type="hidden" name="break_start_time" />
        <?php
        if ($flag1 == "B" || $flag1 == 'C') {
            $visu4 = "";
        }
        if ($flag1 == "A" || $flag1 == 'D'   || $flag1 == 'E') {
            $visu4 = "disabled";
        }
        ?>
        <button type="submit" {{ $visu4 }}>休憩終了</button>
    </div>
</form>
@endsection