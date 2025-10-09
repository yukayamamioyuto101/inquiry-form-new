@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<main>
<header class="confirm-header">
    <div class="confirm-header-inner">
        <h1 class="confirm-title">FashionablyLate</h1>
    </div>
</header>

<div class="main-container">
    <h2 class="confirm-subtitle">Confirm</h2>

<form class="form" action="{{ route('thanks') }}" method="post">
    @csrf
    <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
    <div class="confirm-table">
    <table class="confirm-table__inner">
      
      <tr>
  <th>お名前</th>
  <td>
    <div class="name-group">
      <!-- firstname と lastname をそれぞれ送信する -->
      <input type="text" name="first_name" class="first_name" value="{{ $contact['first_name'] }}" readonly>
      <!-- lastname の前にスペースを加える -->
      <input type="text" name="last_name" class="last_name" value="{{ $contact['last_name'] }}" readonly>
    </div>
  </td>
</tr>

            <tr>
                <th>性別</th>
                <td><input type="text" name="gender" value="{{ $contact['gender'] }}" readonly></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><input type="email" name="email" value="{{ $contact['email'] }}" readonly></td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td><input type="tel" name="tel" value="{{ $contact['tel'] }}" readonly></td>
            </tr>
            <tr>
                <th>住所</th>
                <td><input type="text" name="address" value="{{ $contact['address'] }}" readonly></td>
            </tr>
            <tr>
                <th>建物名</th>
                <td><input type="text" name="building" value="{{ $contact['building'] }}" readonly></td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td><input type="text" name="category_content" value="{{ $category->content }}" readonly></td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td><input type="text" name="detail" value="{{ $contact['detail'] }}" readonly></td>
            </tr>
        </table>
    </div>

    <div class="form__button">
        <button class="form__button-submit-store" type="submit">送信</button>

        <a href="{{ route('index') }}" class="form__button-submit-edit">修正</a>
    </div>

    </div>
</form>
</div>
</main>
@endsection

