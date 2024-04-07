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
        <form class="header_search_form" action="/sumsearch" method="get">
            @csrf
            <div>
                <input class="date_search" type="date" name="date_search">
            </div>

            <div>
                <p>
                    <button class="search-form__search-submit" type="submit">検索</button>
                    <button class="search-form__reset-submit" type="submit" name="reset">リセット</button>
                    <!-- <input class="search-form__reset-btn btn" type="submit" value="リセット" name="reset"> -->
                </p>
            </div>
        </form>
    </div>


    {{ $attendees->links()}}

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
                            <input type="text" name="break_time" value="" readonly />

                        </td>


                        <td>
                            <input type="text" name="working_time" value="" readonly />

                        </td>

                    </tr>
                </form>
                @endforeach
            </table>


        </div>
    </form>
</div>
@endsection