@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="main_head">
    <h2>Confirm</h2>
</div>

　　<div class="main_head">
    <h2>thanks</h2>
</div>
<form action="/" method="get">
    <div class=" form_main">
        お問い合わせありがとうございます
    </div>
    <div class="form_btn">
        <input type="submit" value="HOME" />
    </div>

</form>

@endsection