@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<main>
<div class="main-container">
  <div class="main-container-innner">
    <h2 class="thanks-content">お問い合わせありがとうございました</h2>
<!-- HOMEボタン -->
  <div class="thanks-action">
    <a href="{{ url('/') }}" class="btn-primary">HOME</a>
  </div>
 </div>
</div>
</main>
@endsection
