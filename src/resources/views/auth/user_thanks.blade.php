@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/user_thanks.css') }}">
@endsection
@section('content')
<div class="main_head">
    <h2 class="small-tittle">アカウント登録完了画面</h2>
    <div class=" form_main">
        アカウント登録ありがとうございます。
        認証メールを送付致しましたので
        メールより認証を行ってください。
    </div>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="form_btn">認証メール再送信</button>
        @endsection

        @if (session('message'))
        <div class="alert-success" role="alert">
            {{ session('message') }}
        </div>
        @endif
    </form>