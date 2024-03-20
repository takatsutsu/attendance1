@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="main_head">
    <h2>Contact</h2>
</div>
<form class="form" action="/confirm" method="post">
    @csrf
    <div class="form_main">
        <p>お名前<font color="red">※</font>
            <input type="text" name="first_name" placeholder="例：山田" value="{{ old('first_name') }}" />
            <input type="text" name="last_name" placeholder="例：太郎" value="{{ old('last_name') }}" />
        </p>
        <div class="form__error">
            <font color="red">
                @error('first_name')
                {{ $message }}
                @enderror
            </font>
        </div>
        <div class="form__error">
            <font color="red">
                @error('last_name')
                {{ $message }}
                @enderror
            </font>
        </div>
        <p>性別<font color="red">※</font>
            <input type="radio" name="gender" value="1" {{old('gender')==1 ? 'checked' : '' }}>男性
            <input type="radio" name="gender" value="2" {{old('gender')==2 ? 'checked' : '' }}>女性
            <input type="radio" name="gender" value="3" {{old('gender')==3 ? 'checked' : '' }}>その他

        </p>
        <div class="form__error">
            <font color="red">
                @error('gender')
                {{ $message }}
                @enderror
            </font>
        </div>
        <p>メールアドレス<font color="red">※</font>
            <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
        </p>
        <div class="form__error">
            <font color="red">
                @error('email')
                {{ $message }}
                @enderror
            </font>
        </div>

        <p>電話番号 <font color="red">※</font>
            <input type="tel" name="tell" placeholder="080-1234-5678" value="{{ old('tell') }}" />
        </p>
        <div class="form__error">
            <font color="red">
                @error('tell')
                {{ $message }}
                @enderror
            </font>
        </div>
        <p>住所<font color="red">※</font>
            <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷２−3" value="{{ old('address') }}" />
        </p>
        <div class="form__error">
            <font color="red">
                @error('address')
                {{ $message }}
                @enderror
            </font>
        </div>

        <p>建物名
            <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{ old('building') }}" />
        </p>

        <p>お問い合わせの種類<font color="red">※</font>
            <label class="contact-form__gender-label">
                <select name="category_id" value="{{ old('category_id')}}">
                    <option value="" selected hidden>お問い合わせの種類を選択してください</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>
                        {{
                $category->content }}
                    </option>
                    @endforeach
                </select>
            </label>
        </p>

        <div class="form__error">
            <font color="red">
                @error('category_id')
                {{ $message }}
                @enderror
            </font>
        </div>
        <p>お問い合わせ内容<font color="red">※</font>
            <textarea name="detail" cols="50" rows="5" placeholder="問い合わせ内容を入力ください">{{ old('detail') }} </textarea>
        </p>

        <div class="form__error">
            <font color="red">
                @error('detail')
                {{ $message }}
                @enderror
            </font>
        </div>

        <div class="form_btn">
            <input type="submit" value="確認画面" />
        </div>
</form>
@endsection