@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/sumsearch.css') }}">




@endsection

@section('content')
<div class="main_head">
    <h2 class="small-tittle">日付別集計画面</h2>
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
        <form class="header_search_form" name="date_form_last" action="/sumresearch" method="post">
            @csrf
            <div>
                <input class="date_search" type="hidden" name="date_search" value="{{$atte['last_search']}}" />
                <input class="date_search_fg" type="hidden" name="date_flg" value="L" />
                <button class="date-submit_last" type="submit">＜</button>
            </div>
        </form>

        <form class="header_search_form" name="date_form" action="/sumresearch" method="post">
            @csrf
            <div>
                <input class="date_search" type="date" name="date_search" onchange="submit(this.form)" value="{{$atte['date_search']}}" readonly />
                <input class="date_search_fg" type="hidden" name="date_flg" value="T" />

            </div>
        </form>


        <form class="date_form_next" name="date_form_next" action="/sumresearch" method="post">
            @csrf
            <div>
                <input class="date_search" type="hidden" name="date_search" value="{{$atte['next_search']}}" />
                <input class="date_search_fg" type="hidden" name="date_flg" value="N" />
                <button class="date-submit_next" type="submit">＞</button>
            </div>
        </form>

    </div>





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
        <div class="pagination">
            {{ $attendees->appends(request()->input())->links()}}
        </div>
    </form>

</div>
@endsection