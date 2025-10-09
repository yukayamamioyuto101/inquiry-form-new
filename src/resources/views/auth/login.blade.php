@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<main>
<header class="login-header">
 <div class="login-header-inner">
    <h1 class="login-title">FashionablyLate</h1>
  
    <a href="{{ route('register') }}" class="register-btn">register</a>

 </div>
</header>

<div class="main-container">
    <h2 class="login-subtitle">Login</h2>
   <div class="form-card">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" id="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                     @if ($errors->has('email'))
                      <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" id="password" name="password" placeholder="例: coachtech1106">
                   @if ($errors->has('password'))
                     <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <button type="submit" class="submit-btn">ログイン</button>
            </form>
          </div>
        </div>
</main>
@endsection
