@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<main>
<header class="admin-header">
    <div class="admin-header-inner">
        <h1 class="admin-title">FashionablyLate</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">logout</button>
        </form>
    </div>
</header>

<div class="main-container">
   <h2 class="admin-subtitle">Admin</h2>
   <form action="{{ route('admin.search') }}" method="GET" class="search-form">
        <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">

        <select name="gender">
            <option value="">性別</option>
            <option value="male">男性</option>
            <option value="female">女性</option>
            <option value="other">その他</option>
        </select>

        <select name="category_id">
            <option value="">お問い合わせの種類</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->content }}</option>
            @endforeach
        </select>

        <input type="date" name="created_at"  class="date-input">

        <button type="submit" class="btn btn-search">検索</button>
    </form>

        <a href="{{ route('admin') }}" class="btn btn-reset">リセット</a>

        <button type="button" class="btn btn-export">エクスポート</button>
    

<table class="contact-table">
    <thead>
        <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>

            <td>
                @if($contact->gender == 'male') 男性
                @elseif($contact->gender == 'female') 女性
                @else その他
                @endif
            </td>

            <td>{{ $contact->email }}</td>
            <td>{{ $contact->category->content }}</td>
            
            <td>
                <button 
                    class="btn btn-detail open-modal"
                    data-id="{{ $contact->id }}"
                    data-name="{{ $contact->first_name }} {{ $contact->last_name }}"
                    data-gender="@if($contact->gender == 'male') 男性 @elseif($contact->gender == 'female') 女性 @else その他 @endif"
                    data-email="{{ $contact->email }}"
                    data-tel="{{ $contact->tel }}"
                    data-address="{{ $contact->address }}"
                    data-building="{{ $contact->building }}"
                    data-category="{{ $contact->category->content }}"
                    data-detail="{{ $contact->detail }}"
                >
                    詳細
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="pagination">{{ $contacts->links() }}</div>

<!-- モーダル本体 -->
<div id="detailModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>

        <p><strong>お名前:</strong> <span id="modalName"></span></p>
        <p><strong>性別:</strong> <span id="modalGender"></span></p>
        <p><strong>メールアドレス:</strong> <span id="modalEmail"></span></p>
        <p><strong>電話番号:</strong> <span id="modalTel"></span></p>
        <p><strong>住所:</strong> <span id="modalAddress"></span></p>
        <p><strong>建物名:</strong> <span id="modalBuilding"></span></p>
        <p><strong>お問い合わせの種類:</strong> <span id="modalCategory"></span></p>
        <p><strong>お問い合わせ内容:</strong></p>
        <div id="modalDetail" style="white-space: pre-line;"></div>

        <form id="deleteForm" action="" method="POST">
            @csrf
            @method('DELETE')
          <div class="button-container">
            <button type="submit" class="btn btn-danger">削除</button>
          </div>
        </form>
    </div>
</div>

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('detailModal');
    const closeBtn = modal.querySelector('.close');
    const deleteForm = document.getElementById('deleteForm');

    document.querySelectorAll('.open-modal').forEach(button => {
        button.addEventListener('click', function() {
            // モーダルに値をセット
            document.getElementById('modalName').textContent = this.dataset.name;
            document.getElementById('modalGender').textContent = this.dataset.gender;
            document.getElementById('modalEmail').textContent = this.dataset.email;
            document.getElementById('modalTel').textContent = this.dataset.tel;
            document.getElementById('modalAddress').textContent = this.dataset.address;
            document.getElementById('modalBuilding').textContent = this.dataset.building;
            document.getElementById('modalCategory').textContent = this.dataset.category;
            document.getElementById('modalDetail').textContent = this.dataset.detail;

            // 削除フォームの action にIDをセット
            deleteForm.action = '{{ route("admin.destroy", ":id") }}'.replace(':id', this.dataset.id);

            // モーダル表示
            modal.style.display = 'flex';
        });
    });

    // 閉じるボタン
    closeBtn.addEventListener('click', () => modal.style.display = 'none');

    // モーダル外クリックで閉じる
    window.addEventListener('click', e => {
        if (e.target === modal) modal.style.display = 'none';
    });
});
</script>
@endsection
