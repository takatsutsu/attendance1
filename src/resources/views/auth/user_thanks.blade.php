@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/user_thanks.css') }}">
@endsection
@section('content')
<div class="main_head">
    <h2 class="small-tittle">アカウント登録完了画面</h2>
    <form action="/" method="get">
        <div class=" form_main">
            アカウント登録ありがとうございます。
            認証メールを送付致しましたので
            メールより認証を行ってください。
        </div>
        <div class="form_btn">
            <input type="submit" value="HOME" />
        </div>

    </form>

    @endsection