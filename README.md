# miniTweet
つぶやきを表示するwebサービス

## 環境
- php8.3.13
- Laravel Framework 10.48.22
- docker8.3

## 共有

1. githubからプロジェクトのclone

2. dockerを起動

3. プロジェクトのルートで実行

```cmd:
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

4. .env.exampleをコピーして.envの作成

```
 cp .env.example .env
```

5. アプリケーションキー(APP_KEY)を設定する

```
php artisan key:generate
```

6. .envのDB_USERNAME、DB_PASSWORDに任意のパラメータを設定する。

```
DB_USERNAME=
DB_PASSWORD=
```