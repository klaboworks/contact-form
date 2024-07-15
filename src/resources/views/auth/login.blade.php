@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login__back-ground">
</div>

<div class="login__content">
    <div class="login__heading">
        <h2 class="login__title">Login</h2>
    </div>

    <div class="login-form">
        <form action="/login" method="post" class="form">
            <div class="login-form__inner">
                <div class="form__group">
                    <p class="form__label-email">
                        メールアドレス
                    </p>
                    <input type="text" name="email" class="form__input-email" placeholder="例：test@example.com">
                    <div class="input-form__error-message">
                        @error('email')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form__group">
                    <p class="form__label-password">
                        パスワード
                    </p>
                    <input type="text" name="password" class="form__input-password" placeholder="例：coachtech1106">
                </div>
                <div class="form__button">
                    <button class="form__button--submit">ログイン</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection