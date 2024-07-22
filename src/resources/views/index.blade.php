@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">

    <div class="contact-form__heading">
        <p>Contact</p>
    </div>

    <!-- 入力フォーム -->
    <form action="/confirm" method="post" class="form">
        @csrf
        <!-- 名前 -->
        <div class="form-group">
            <div class="form-title required">お名前</div>
            <div class="form-input">
                <div class="form-input__name">
                    <div class="form-input__last-name">
                        <input type="text" name="last_name" placeholder="例：山田" value="{{old('last_name')}}">
                        @error('last_name')
                        <small class="form-input__error-message">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-input__first-name">
                        <input type="text" name="first_name" placeholder="例：太郎" value="{{old('first_name')}}">
                        @error('first_name')
                        <small class="form-input__error-message">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- 性別 -->
        <div class="form-group">
            <div class="form-title required">性別</div>
            <div class="form-input">
                <div class="form-input__gender">
                    <div class="form-input__gender-button">
                        <input type="radio" name="gender" value="1" id="gender" checked class="radio-input"><label for="gender">男性</label>
                    </div>
                    <div class="form-input__gender-button">
                        <input type="radio" name="gender" value="2" id="gender"><label for="gender">女性 </label>
                    </div>
                    <div class="form-input__gender-button">
                        <input type="radio" name="gender" value="3" id="gender"><label for="gender">その他 </label>
                    </div>
                </div>
                @error('gender')
                <small class="form-input__error-message">{{$message}}</small>
                @enderror
            </div>
        </div>

        <!-- メールアドレス -->
        <div class="form-group">
            <div class="form-title required">メールアドレス</div>
            <div class="form-input">
                <div class="form-input__email">
                    <input type="text" name="email" placeholder="例：test@example.com" value="{{old('email')}}">
                </div>
                @error('email')
                <small class="form-input__error-message">{{$message}}</small>
                @enderror
            </div>
        </div>

        <!-- 電話番号 -->
        <div class="form-group">
            <div class="form-title required">tell number</div>
            <div class="form-input">
                <div class="form-input__tell">
                    <input type="text" name="tell" placeholder="09012345678" value="{{old('tell')}}">
                </div>
                @error('tell')
                <small class="form-input__error-message">{{$message}}</small>
                @enderror
            </div>
        </div>

        <!-- 住所 -->
        <div class="form-group">
            <div class="form-title required">住所</div>
            <div class="form-input">
                <div class="form-input__address">
                    <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{old('address')}}">
                </div>
                @error('address')
                <small class="form-input__error-message">{{$message}}</small>
                @enderror
            </div>
        </div>

        <!-- 建物名 -->
        <div class="form-group">
            <div class="form-title">建物名</div>
            <div class="form-input">
                <div class="form-input__building">
                    <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{old('building')}}">
                </div>
            </div>
        </div>

        <!-- お問い合わせの種類 -->
        <div class="form-group">
            <div class="form-title required">お問い合わせの種類</div>
            <div class="form-input">
                <div class="form-input__category">
                    <select name="category_id">
                        <option value="" class="form-input__category--default">選択してください</option>
                        @foreach($categories as $category)
                        <option name="category_id" value="{{$category['id']}}">{{$category['content']}}</option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                <small class="form-input__error-message">{{$message}}</small>
                @enderror
            </div>
        </div>

        <!-- お問い合わせ内容 -->
        <div class="form-group">
            <div class="form-title required">お問い合わせ内容</div>
            <div class="form-input">
                <div class="form-input__detail">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください"> {{ old('detail') }}</textarea>
                </div>
                @error('detail')
                <small class="form-input__error-message">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="form-button">
            <button class="form-button__submit">確認画面</button>
        </div>
    </form>
    @endsection