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
                    <input type="text" name="last_name" placeholder="例：山田" value="">
                    <input type="text" name="first_name" placeholder="例：太郎">
                </div>
            </div>
        </div>

        <!-- 性別 -->
        <div class="form-group">
            <div class="form-title required">性別</div>
            <div class="form-input">
                <div class="form-input__gender">
                    <div class="form-input__gender-button">
                        <input type="radio" name="gender" value="1" id="gender" class="radio-input"><label for="gender">男性</label>
                    </div>
                    <div class="form-input__gender-button">
                        <input type="radio" name="gender" value="2" id="gender"><label for="gender">女性 </label>
                    </div>
                    <div class="form-input__gender-button">
                        <input type="radio" name="gender" value="3" id="gender"><label for="gender">その他 </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- メールアドレス -->
        <div class="form-group">
            <div class="form-title required">メールアドレス</div>
            <div class="form-input">
                <div class="form-input__email">
                    <input type="text" name="email" placeholder="例：test@example.com">
                </div>
            </div>
        </div>

        <!-- 電話番号 -->
        <div class="form-group">
            <div class="form-title required">電話番号</div>
            <div class="form-input">
                <div class="form-input__tel">
                    <input type="text" name="tel" placeholder="09012345678">
                </div>
            </div>
        </div>

        <!-- 住所 -->
        <div class="form-group required">
            <div class="form-title">住所</div>
            <div class="form-input">
                <div class="form-input__address">
                    <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3">
                </div>
            </div>
        </div>

        <!-- 建物名 -->
        <div class="form-group">
            <div class="form-title">建物名</div>
            <div class="form-input">
                <div class="form-input__building">
                    <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101">
                </div>
            </div>
        </div>

        <!-- お問い合わせの種類 -->
        <div class="form-group">
            <div class="form-title required">お問い合わせの種類</div>
            <div class="form-input">
                <div class="form-input__category">
                    <select name="category_id" id="">
                        <option value="" class="form-input__category--default">選択してください</option>
                        <option value="">カテゴリ</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- お問い合わせ内容 -->
        <div class="form-group">
            <div class="form-title required">お問い合わせ内容</div>
            <div class="form-input">
                <div class="form-input__detail">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください"></textarea>
                </div>
            </div>
        </div>

        <div class="form-button">
            <button class="form-button__submit">確認画面</button>
        </div>
    </form>
    @endsection