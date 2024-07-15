@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin__content">

    <div class="admin__heading">
        <h2 class="admin__title">Admin</h2>

        <nav class="admin__nav">
            <form action="">
                <ul>
                    <form action="admin/search" method="get">
                        @csrf
                        <li class="nav__email">
                            <input type="text" name="email" class="nav__email-input" placeholder="名前やメールアドレスを入力してください">
                        </li>
                        <li class="nav__gender">
                            <select name="gender" class="nav__gender-select">
                                <option value="">性別</option>
                                <option value=""></option>
                            </select>
                        </li>
                        <li class="nav__category">
                            <select name="category_id" class="nav__category-select">
                                <option value="">お問い合せの種類</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->content}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="nav__date">
                            <input type="date" name="created_at" class="nav__date-input">
                        </li>
                        <li class="nav__search">
                            <button class="nav__search-submit">検索</button>
                        </li>
                    </form>
                    <li class="nav__reset">
                        <a class="nav__reset-submit" href="/admin">リセット</a>
                    </li>
                </ul>
            </form>
        </nav>

        <menu class="menu-bar">
            <button class="menu__csv-export">エクスポート</button>
        </menu>

        <table class="contacts-table">
            <tr class="contacts-table__row--header">
                <th class="table-header th--name">お名前</th>
                <th class="table-header th--gender">性別</th>
                <th class="table-header th--email">メールアドレス</th>
                <th class="table-header th--category">お問い合せの種類</th>
                <th class="table-header"></th>
            </tr>
            @foreach($contacts as $contact)
            <tr class="contacts-table__row">
                <td class="table-data">
                    <span class="customer-last_name">{{$contact->last_name}}</span>
                    <span class="customer-first_name">{{$contact->first_name}}</span>
                </td>
                <td class="table-data">
                    @if($contact->gender==1)
                    {{'男性'}}
                    @elseif($contact->gender==2)
                    {{'女性'}}
                    @else
                    {{'その他'}}
                    @endif
                </td>
                <td class="table-data">{{$contact->email}}</td>
                <td class="table-data">{{$contact->category['content']}}
                </td>
                <td class="table-data"><button class="table-data__button-detail">詳細</button></td>
            </tr>
            @endforeach
        </table>
    </div>

</div>
@endsection