@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sumsearch.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

@endsection

@section('content')
<div class="main_head">
    <h2>sumsearch</h2>
</div>
<div class="admin__alert">
    @if (session('message'))
    <div class="admin__alert--success">
        {{ session('message') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="admin__alert--danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<div class="admin__content">
    <div class="header_search">
        <form class="header_search_form" name="date_form" action="/sumresearch" method="get">
            @csrf
            <div>
                <input class="date_search" type="date" name="date_search" onchange="submit(this.form)" value="{{$atte['date_search']}}" />
                <a href="/lastdate" onclick="document.date_form.submit(); return false;">前日</a>

                <a href="?action=process" onclick="submit(this.form); return false;">処理を実行する</a>

                <?php
                if (isset($_GET['action']) && $_GET['action'] == 'process') {
                    $date = $atte['date_search']; // 指定した日付
                    $next_day = date("Y-m-d", strtotime($date . " +1 day"));
                    $atte['date_search'] = $next_day;
                }
                ?>


            </div>

            <div>
                <p>
                    <!-- <button class=" search-form__search-submit" type="submit">検索</button> -->
                    <!-- <button class="search-form__reset-submit" type="submit" name="reset">リセット</button> -->
                    <!-- <input class="search-form__reset-btn btn" type="submit" value="リセット" name="reset"> -->
                </p>
            </div>
        </form>
    </div>

    {{ $attendees->links('vendor.pagination.custom')}}


    <form class="create-form">
        <div class="admin-table">
            <table class="admin-table__inner">
                <tr class="admin-table__row">
                    <th class="admin-table__header">名前</th>
                    <th class="admin-table__header">勤務開始</th>
                    <th class="admin-table__header">勤務終了</th>
                    <th class="admin-table__header">休憩時間</th>
                    <th class="admin-table__header">勤務時間</th>

                </tr>
                @foreach ($attendees as $attendee)
                <form action="">
                    <input type="hidden" name="id" value="{{ $attendee->user_id}}" />

                    <tr class="admin-table__row">
                        <td>
                            <input type="text" name="name" value="{{$attendee->user->name}}" readonly />
                        </td>
                        <td>
                            <input type="text" name="work_start" value="{{$attendee->work_start_time}}" readonly />

                        </td>
                        <td>
                            <input type="text" name="work_end" value="{{$attendee->work_end_time}}" readonly />

                        </td>
                        <td>
                            <input type="hidden" name="break_second" value="{{$attendee->break_total}}" readonly />

                            <?php
                            $hours = floor($attendee->break_total / 3600);
                            $minutes = floor(($attendee->break_total % 3600) / 60);
                            $seconds = $attendee->break_total % 60;
                            $hms = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
                            ?>
                            <input type="text" name="break_time" value="{{$hms}}" readonly />

                        </td>


                        <td>
                            <input type="hidden" name="work_second" value="{{$attendee->work_span_second}}" readonly />
                            <?php
                            $work_total_second = $attendee->work_span_second - $attendee->break_total;
                            $hours = floor($work_total_second / 3600);
                            $minutes = floor(($work_total_second % 3600) / 60);
                            $seconds = $work_total_second % 60;
                            $hms = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
                            ?>
                            <input type="text" name="working_time" value="{{$hms}}" readonly />

                        </td>

                    </tr>
                </form>
                @endforeach
            </table>


        </div>
    </form>
</div>
@endsection