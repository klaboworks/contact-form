@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm-content">
    <div class="confirm__heading inika-regular">
        <p>Confirm</p>
    </div>
    <form action="/thanks" method="post">
        @csrf
        <table class="confirm-table">
            <tr class="confirm-table__row">
                <th class="confirm-table__head">お名前</th>
                <td class="confirm-table__data">
                    <span class="confirm-table__data--name">{{$contact['last_name']}}</span>
                    <input type="hidden" name="last_name" value="{{$contact['last_name']}}">
                    <span class="confirm-table__data--name">{{$contact['first_name']}}</span>
                    <input type="hidden" name="first_name" value="{{$contact['first_name']}}">
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__head">性別</th>
                <td class="confirm-table__data">
                    @if($contact['gender']==1)
                    {{'男性'}}
                    @elseif($contact['gender']==2)
                    {{'女性'}}
                    @else
                    {{'その他'}}
                    @endif
                    <input type="hidden" name="gender" value="{{$contact['gender']}}">
                </td>
            </tr>
            <tr class=" confirm-table__row">
                <th class="confirm-table__head">メールアドレス</th>
                <td class="confirm-table__data">{{$contact['email']}}</td>
                <input type="hidden" name="email" value="{{$contact['email']}}">
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__head">電話番号</th>
                <td class="confirm-table__data">{{$contact['tell']}}</td>
                <input type="hidden" name="tell" value="{{$contact['tell']}}">
            </tr>
            <tr class=" confirm-table__row">
                <th class="confirm-table__head">住所</th>
                <td class="confirm-table__data">{{$contact['address']}}</td>
                <input type="hidden" name="address" value="{{$contact['address']}}">
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__head">建物名</th>
                <td class="confirm-table__data">{{$contact['building']}}</td>
                <input type="hidden" name="building" value="{{$contact['building']}}">
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__head">お問い合わせの種類</th>
                <td class="confirm-table__data">
                    @if($contact['category_id']==1)
                    {{'商品のお届けについて'}}
                    @elseif($contact['category_id']==2)
                    {{'商品の交換について'}}
                    @elseif($contact['category_id']==3)
                    {{'商品トラブル'}}
                    @elseif($contact['category_id']==4)
                    {{'ショップへのお問い合わせ'}}
                    @elseif($contact['category_id']==5)
                    {{'その他'}}
                    @endif
                </td>
                <input type="hidden" name="category_id" value="{{$contact['category_id']}}">
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__head">お問い合わせ内容</th>
                <td class="confirm-table__data">{{$contact['detail']}}</td>
                <input type="hidden" name="detail" value="{{$contact['detail']}}">
            </tr>
        </table>

        <div class="buttons-group">
            <button class="confirm-button__submit">送信</button>
            <a href="/" class="confirm-link__correct">修正</a>
        </div>
    </form>
</div>
@endsection