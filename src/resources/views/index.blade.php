@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<main>
<header class="contact-header">
    <div class="contact-header-inner">
        <h1 class="contact-title">FashionablyLate</h1>
    </div>
</header>

<div class="main-container">
    <h2 class="contact-subtitle">Contact</h2>
    <form class="form" action="{{ route('confirm') }}" method="post">
        @csrf

        {{-- お名前 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="first_name" placeholder="山田" value="{{ old('first_name',session('contact_data.first_name')) }}" />
                    <input type="text" name="last_name" placeholder="太郎" value="{{ old('last_name',session('contact_data.last_name')) }}" />
                </div>
                <div class="form__error">
                    @if ($errors->has('first_name'))
                        <div class="error">{{ $errors->first('first_name') }}</div>
                    @endif
                    @if ($errors->has('last_name'))
                        <div class="error">{{ $errors->first('last_name') }}</div>
                    @endif
                </div>
            </div>
        </div>

        {{-- 性別 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-radio">
                <label>
                    <input type="radio" name="gender" value="male" {{ old('gender', session('contact_data.gender')) == 'male' ? 'checked' : '' }}> 男性
                </label>
                <label>
                    <input type="radio" name="gender" value="female" {{ old('gender', session('contact_data.gender')) == 'female' ? 'checked' : '' }}> 女性
                </label>
                <label>
                    <input type="radio" name="gender" value="other" {{ old('gender', session('contact_data.gender')) == 'other' ? 'checked' : '' }}> その他
                </label>
                <div class="form__error">
                    @if ($errors->has('gender'))
                        <div class="error">{{ $errors->first('gender') }}</div>
                    @endif
                </div>
            </div>
        </div>

        {{-- メールアドレス --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input type="email" name="email" placeholder="test@example.com" value="{{ old('email',session('contact_data.email')) }}" />
                <div class="form__error">
                    @if ($errors->has('email'))
                        <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                </div>
            </div>
        </div>

        {{-- 電話番号 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input type="tel" name="tel" placeholder="09012345678" value="{{ old('tel',session('contact_data.tel')) }}" />
                <div class="form__error">
                    @if ($errors->has('tel'))
                        <div class="error">{{ $errors->first('tel') }}</div>
                    @endif
                </div>
            </div>
        </div>

        {{-- 住所 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input type="text" name="address" placeholder="東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address',session('contact_data.address')) }}" />
                <div class="form__error">
                    @if ($errors->has('address'))
                        <div class="error">{{ $errors->first('address') }}</div>
                    @endif
                </div>
            </div>
        </div>

        {{-- 建物名 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <input type="text" name="building" placeholder="千駄ヶ谷マンション101" value="{{ old('building',session('contact_data.building')) }}" />
                <div class="form__error">
                    @if ($errors->has('building'))
                        <div class="error">{{ $errors->first('building') }}</div>
                    @endif
                </div>
            </div>
        </div>

        {{-- お問い合わせの種類 --}}
<div class="form__group">
    <div class="form__group-title">
        <span class="form__label--item">お問い合わせの種類</span>
        <span class="form__label--required">※</span>
    </div>
    <div class="form__group-content" required>
        <select name="category_id" >
            <option value="">選択してください</option>
            @foreach($categories as $category)
              @if($category->content !== 'ダミーデータ')  {{-- ダミーデータを除外 --}}
                    <option value="{{ $category->id }}"
             <option value="{{ $category->id }}"
               {{ old('category_id', data_get(session('contact_data'), 'category_id')) == $category->id ? 'selected' : '' }}>{{ $category->content }}
             </option>
             @endif
           @endforeach
        </select>
        <div class="form__error">
        @if ($errors->has('category_id'))
            <div class="error">{{ $errors->first('category_id') }}</div>
        @endif
        </div>
    </div>
</div>

        {{-- お問い合わせ内容 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
            </div>
            <div class="form__group-content">
                <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail', session('contact_data.detail')) }}</textarea>
                <div class="form__error">
                    @if ($errors->has('detail'))
                        <div class="error">{{ $errors->first('detail') }}</div>
                    @endif
                </div>
            </div>
        </div>

        {{-- 確認ボタン --}}
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
</main>
@endsection
