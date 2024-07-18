@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin__content">

    <div class="admin__heading">
        <h2 class="admin__title inika-regular">Admin</h2>

        <!-- 検索フォーム -->
        <form action="/admin/search" method="get">
            @csrf
            <nav class="admin__nav">
                <ul>
                    <li class="nav__keyword">
                        <input type="text" name="keyword" value="{{old('keyword')}}" class="nav__email-input" placeholder="名前やメールアドレスを入力してください">
                    </li>
                    <li class="nav__gender">
                        <div class="nav__gender-select">
                            <select name="gender">
                                <option value="">性別</option>
                                <option value="1">男性</option>
                                <option value="2">女性</option>
                                <option value="3">その他</option>
                            </select>
                        </div>
                    </li>
                    <li class="nav__category">
                        <div class="nav__category-select">
                            <select name="category_id">
                                <option value="">お問い合せの種類</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->content}}</option>
                                @endforeach
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="nav__date">
                            <input type="date" name="created_at" value="{{old('created_at')}}" class="nav__date-input">
                        </div>
                    </li>
                    <li class="nav__search">
                        <button class="nav__search-submit" type="submit">検索</button>
                    </li>
                    <li class="nav__reset">
                        <a class="nav__reset-submit" href="/admin">リセット</a>
                    </li>
                </ul>
            </nav>
        </form>

        <menu class="menu-bar">
            <form action="/admin/csv-download" method="get" class="csv-dl">
                @csrf
                <button class="menu__csv-export">エクスポート</button>
            </form>
        </menu>

        <!-- データテーブル -->
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
                <td class="table-data inika-regular">{{$contact->email}}</td>
                <td class="table-data">{{$contact->category['content']}}
                </td>
                <td class="table-data">
                    <button class="table-data__button-detail" popovertarget="mypopover">詳細</button>
                    <!-- モーダルウィンドウ -->
                    <form action="/admin/delete" method="post">
                        @csrf
                        @method('delete')
                        <div id="mypopover" class="contacts-detail" popover>
                            <div class="contacts-detail__inner">
                                <img src="../../public/img/Group 91.png" alt="" class="contacts-detail__button--close">
                                <input type="hidden" name="id" value="{{$contact['id']}}">
                                <table class="contacts-detail__table">
                                    <tr class="contacts-detail__table-row">
                                        <th class="contacts-detail__table-header">お名前</th>
                                        <td class="contacts-detail__table-data">
                                            <span>{{$contact->last_name}}</span><span>{{$contact->first_name}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="contacts-detail__table-header">性別</th>
                                        <td class="contacts-detail__table-data">
                                            <p> @if($contact->gender==1)
                                                {{'男性'}}
                                                @elseif($contact->gender==2)
                                                {{'女性'}}
                                                @else
                                                {{'その他'}}
                                                @endif
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="contacts-detail__table-header">メールアドレス</th>
                                        <td class="contacts-detail__table-data">
                                            <p>{{$contact->email}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="contacts-detail__table-header">電話番号</th>
                                        <td class="contacts-detail__table-data">
                                            <p>{{$contact->tell}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="contacts-detail__table-header">住所</th>
                                        <td class="contacts-detail__table-data">
                                            <p>{{$contact->address}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="contacts-detail__table-header">建物名</th>
                                        <td class="contacts-detail__table-data">
                                            <p>{{$contact->building}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="contacts-detail__table-header">お問い合わせの種類</th>
                                        <td class="contacts-detail__table-data">
                                            <p>{{$contact->category['content']}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="contacts-detail__table-header">お問い合わせ内容</th>
                                        <td class="contacts-detail__table-data">
                                            <p>{{$contact->detail}}</p>
                                        </td>
                                    </tr>
                                </table>
                                <button class="contacs-detail__delete-button--submit">
                                    削除
                                </button>
                    </form>
                </td>
    </div>
</div>
</td>
</tr>
@endforeach
</table>

</div>

</div>
@endsection