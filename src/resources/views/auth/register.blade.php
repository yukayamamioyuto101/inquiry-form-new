@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<main>
  
<header class="register-header">
 <div class="register-header-inner">
    <h1 class="register-title">FashionablyLate</h1>
    <a href="{{ route('login') }}" class="login-btn">login</a>
 </div>
</header>

<div class="main-container">
    <h2 class="register-subtitle">Register</h2>
   <div class="form-card">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">お名前</label>
                    <input type="text" id="name" name="name" placeholder="例: 山田 太郎" value="{{ old('name') }}">
                 @if ($errors->has('name'))
                <div class="error">{{ $errors->first('name') }}</div>
                @endif
                </div>

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
                    <label for="password_confirmation">パスワード確認</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                    @if ($errors->has('password'))
                     <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <button type="submit" class="submit-btn">登録</button>
            </form>
          </div>
        </div>
     </div>
    </main>
 @endsection
