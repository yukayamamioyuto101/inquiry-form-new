#お問い合わせフォーム

##環境構築
###Dockerビルド
　1.git clone 
  2.cd inquiry-form-new
  3.docker-compose build
    docker-compose up -d
###Laravel環境構築
　1.docker-compose exec php bash
  2.composer install
  3.cp .env.example .env
  4.php artisan key:generate
  5.php artisan migrate
  6.php artisan db:seed

##使用技術
 PHP 7
 Laravel 8
 Mysql 8

##URL
 開発環境：　http://localhost:8085
 phpMyadmin: http;//localhost:8086

 ##使用例
 　1.お問い合わせフォームに情報を入力
   2.確認画面ボタンをクリック
   3.お問い合わせフォームの確認ページが表示される
   4.確認ページの送信ボタンをクリックすると情報が登録され、サンクス画面へ遷移する
   5.ユーザー登録→しログイン→管理画面に入ると登録した情報の検索・閲覧・削除をすることができる

 ##ER図
 <img width="875" height="653" alt="image" src="https://github.com/user-attachments/assets/0afbf61c-3bb1-42e6-bf7a-247cb9e49378" />

