# book-management

神戸情報大学院大学の課題用のアプリケーション

## 使用技術

- PHP 8.x
- Laravel 9.x
- MySQL 8.x
- Nginx
- Docker Compose

## ローカル開発環境の構築方法（Mac）

ローカル端末に Docker Desktop for Mac のインストールが必要。

1. コンテナ起動

```bash
$ docker-compose up -d
```

2. リネーム

```bash
$ cd server
$ mv .env.example .env
$ chmod -R 777 storage bootstrap/cache
```

3. php コンテナにアクセスし、各種コマンドを叩く

```bash
$ docker-compose exec php bash
# 以下はphpコンテナ内で実行
$ composer install
$ php artisan key:generate
```

4. 動作確認

ブラウザに`http://localhost/`を入力しアクセスし、HTML が返されれば OK。
