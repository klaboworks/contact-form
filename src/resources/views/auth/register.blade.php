@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register__back-ground">
</div>

<div class="register__content">
    <div class="register__heading">
        <h2 class="register__title">Register</h2>
    </div>

    <div class="register-form">
        <form action="/register" method="post" class="form">
            @csrf
            <div class="register-form__inner">
                <div class="form__group">
                    <p class="form__label-name">
                        お名前
                    </p>
                    <input type="text" name="name" class="form__input-name" placeholder="例：山田　太郎" value="{{ old('name') }}">
                    <small class="form-input__error-message">
                        @error('name')
                        {{$message}}
                        @enderror
                    </small>
                </div>
                <div class="form__group">
                    <p class="form__label-email">
                        メールアドレス
                    </p>
                    <input type="text" name="email" class="form__input-email" placeholder="例：test@example.com" value="{{ old('email') }}">
                    <small class="form-input__error-message">
                        @error('email')
                        {{$message}}
                        @enderror
                    </small>
                </div>
                <div class="form__group">
                    <p class="form__label-password">
                        パスワード
                    </p>
                    <input type="text" name="password" class="form__input-password" placeholder="例：coachtech1106" value="{{ old('password') }}">
                    <small class="form-input__error-message">
                        @error('password')
                        {{$message}}
                        @enderror
                    </small>
                </div>
                <div class="form__button">
                    <button class="form__button--submit" type="submit">登録</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection