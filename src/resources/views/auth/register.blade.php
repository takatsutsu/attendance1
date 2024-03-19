@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="main_head">
    <h2>Register</h2>
</div>
<form class="form" action="/register" method="post">
    @csrf
    <div class="form_main">
        <p>お名前 <input type="text" name="name" placeholder="" value="{{ old('name') }}" /></p>
        <div class="form__error">
            @error('name')
            {{ $message }}
            @enderror
        </div>
        <p>メールアドレス<input type="email" name="email" placeholder="" value="{{ old('email') }}" /> </p>
        <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
        </div>

        <p>パスワード <input type="password" name="password" /></p>
        <div class="form__error">
            @error('password')
            {{ $message }}
            @enderror
        </div>

        <p>パスワード（確認用） <input type="password" name="password_confirmation" /></p>

        <div class="form__error">
            @error('password_confirmation')
            {{ $message }}
            @enderror
        </div>


        <div class="form_btn">
            <input type="submit" />
        </div>
    </div>

</form>

@endsection