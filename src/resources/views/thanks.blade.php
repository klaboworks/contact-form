@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks__content">
    <p class="thanks-sentence">お問い合わせありがとうございました</p>
    <a class="thanks-link__go-home" href="/">HOME</a>
</div>
@endsection