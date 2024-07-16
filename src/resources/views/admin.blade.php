@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin__content">

    <div class="admin__heading">
        <h2 class="admin__title">Admin</h2>

        <form action="admin/search" method="get">
            @csrf
            <nav class="admin__nav">
                <ul>
                    <li class="nav__name">
                        <input type="text" name="keyword" value="{{old('keyword')}}" class="nav__email-input" placeholder="名前やメールアドレスを入力してください">
                    </li>
                    <li class="nav__gender">
                        <select name="gender" class="nav__gender-select">
                            <option value="">性別</option>
                            <option value="1">男性</option>
                            <option value="2">女性</option>
                            <option value="3">その他</option>
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
                        <input type="date" name="created_at" value="{{old('created_at')}}" class="nav__date-input">
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
                <td class="table-data">
                    <button class="table-data__button-detail" popovertarget="mypopover">詳細</button>
                    <div id="mypopover" class="table-data__detail--modal" popover>
                        <div class="table-data__detail-inner">
                            <table>
                                <tr>
                                    <th>お名前</th>
                                    <td>
                                        <span>{{$contact->last_name}}</span><span>{{$contact->first_name}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>性別</th>
                                    <td>
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
                                    <th>メールアドレス</th>
                                    <td>
                                        <p>{{$contact->email}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>電話番号</th>
                                    <td>
                                        <p>{{$contact->tell}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>住所</th>
                                    <td>
                                        <p>{{$contact->address}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>建物名</th>
                                    <td>
                                        <p>{{$contact->building}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>お問い合わせの種類</th>
                                    <td>
                                        <p>{{$contact->category['content']}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>お問い合わせ内容</th>
                                    <td>
                                        <p>{{$contact->detail}}</p>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>

    </div>

</div>
@endsection