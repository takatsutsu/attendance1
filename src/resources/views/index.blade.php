@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="main_head">
    <h2 class="small-tittle">打刻画面</h2>
    <h2 class="small-message">{{ $user->name }}さん　お疲れ様です！！</h2>
    <input type="hidden" name="user_id" value="{{ $user->id }}" />
    <input type="hidden" name="user_email" value="{{ $user->email }}" />
    <p><?php
        $start_time = date("Y-m-d H:i:s");

        print_r($start_time);

        ?></p>
</div>
<div class="all_btn">
    <div class="work_btn">
        <form class="form_work_start" action="/workstart" method="post">
            @csrf
            <div class="work_start">
                <input type="hidden" name="user_id" value="{{ $user->id }}" />
                <input type="hidden" name="user_name" value="{{ $user->name }}" />
                <input type="hidden" name="user_email" value="{{ $user->email }}" />
                <input type="hidden" name="work_date" />
                <input type="hidden" name="work_start_time" />
                <?php
                if ($btn1 == "A") {
                    $visu1 = "";
                }
                if ($btn1 == "B" || $btn1 == 'C'  || $btn1 == 'D' || $btn1 == 'E') {
                    $visu1 = "disabled";
                }
                ?>
                <button class="work_start_btn" type="submit" {{ $visu1 }}>出　　勤</button>
            </div>
        </form>
        <form class="form_work_end" action="/workend" method="post">
            @csrf
            <div class="work_end">
                <input type="hidden" name="user_id" value="{{ $user->id }}" />
                <input type="hidden" name="user_name" value="{{ $user->name }}" />
                <input type="hidden" name="user_email" value="{{ $user->email }}" />
                <input type="hidden" name="work_date" />
                <input type="hidden" name="work_end_time" />
                <?php
                if ($btn1 == "B" || $btn1 == 'C') {
                    $visu2 = "";
                }
                if ($btn1 == "A" || $btn1 == 'D' || $btn1 == 'E') {
                    $visu2 = "disabled";
                }
                ?>
                <button class="work_end_btn" type=" submit" {{ $visu2 }}>退　　勤</button>
            </div>
        </form>
    </div>
    <div class="break_btn">
        <form class="form_break_start" action="/breakstart" method="post">
            @csrf
            <div class="break_start">
                <input type="hidden" name="user_id" value="{{ $user->id }}" />
                <input type="hidden" name="user_name" value="{{ $user->name }}" />
                <input type="hidden" name="user_email" value="{{ $user->email }}" />
                <input type="hidden" name="break_date" />
                <input type="hidden" name="break_start_time" />
                <?php
                if ($btn1 == "B" || $btn1 == 'C') {
                    $visu3 = "";
                }
                if ($btn1 == "A" || $btn1 == 'D' || $btn1 == 'E') {
                    $visu3 = "disabled";
                }
                ?>
                <button class="break_start_btn" type=" submit" {{ $visu3 }}>休憩開始</button>
            </div>
        </form>

        <form class="form_break_end" action="/breakend" method="post">
            @csrf
            <div class="break_end">
                <input type="hidden" name="user_id" value="{{ $user->id }}" />
                <input type="hidden" name="user_name" value="{{ $user->name }}" />
                <input type="hidden" name="user_email" value="{{ $user->email }}" />
                <input type="hidden" name="break_date" />
                <input type="hidden" name="break_start_time" />
                <?php
                if ($btn1 == "D") {
                    $visu4 = "";
                }
                if ($btn1 == "A" || $btn1 == 'B' || $btn1 == 'C'   || $btn1 == 'E') {
                    $visu4 = "disabled";
                }
                ?>
                <button class="break_end_btn" type="submit" {{ $visu4 }}>休憩終了</button>
            </div>
        </form>
    </div>
</div>
@endsection