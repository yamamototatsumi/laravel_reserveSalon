# udemy Laravel講座
##　ダウンロード方法

git clone
git clone https://github.com/yamamototatsumi/laravel_reserveSalon

git clone ブランチを指定してダウンロードする場合

git clone -b https://github.com/yamamototatsumi/laravel_reserveSalon

もしくはzipファイルでダウンロードしてください

## インストール方法

- cd laravel_reserveSalon
- composer install
- npm install
- npm run dev

.env example　をコピーして.envファイルを作成

.envファイルの中の下記をご利用の環境に合わせて変更してください。

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_reserveSalon
DB_USERNAME=root
DB_PASSWORD=7491gorira

XAMPP/MANPまたは他の開発環境でDBを起動した後に、

php artisan migrate:fresh -seed

と実行してください。(データベーステーブルとダミーデータが追加されればOK)

最後に
php artisan key:generate
と入力してキーを生成後、

php artisan serve
で簡易サーバーを立ち上げ、表示確認してください。

##インストール後の実施事項

画像のリンク
php artisan storage;link

プロフィールで画像アップロード機能を使う場合は、
.envのAPP_URLを下記に変更して下さい。

# APP_URL=http://localhost
APP_URL=http://127.0.0.1:8000

Tailwindcss 3.xの、justInTimeの機能により、
使ったHTML内クラスのみ反映されるようになっていますので、
HTMLを編集する際は、 npm run dev
を実行しながら編集するようにしてください。

