# miniTweet
つぶやきを表示するwebサービス

## 環境
- php8.3.13
- Laravel Framework 10.48.22
- docker8.3

## 開発環境の構築

1. githubからプロジェクトのclone

2. プロジェクトのルートへ移動

3. .env.exampleをコピーして.envの作成

```
cp .env.example .env
```

4. .envのDB_USERNAME、DB_PASSWORDに任意のパラメータを設定する。パラメータがない場合には追加。

```
DB_USERNAME=
DB_PASSWORD=
```

5. プロジェクトのルートで実行

```cmd:
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

6. sailの起動

```
./vendor/bin/sail up -d
```

7. コマンドの省略手順を行う

./vendor/bin/sail → sailとする。
google検索してください。


8. アプリケーションキー(APP_KEY)がない場合は設定する

```
sail php artisan key:generate
```

9. 環境変数の変更が反映されてない場合は再ビルド、キャッシュの削除を行う

```
docker-compose up --build -d
```

```
sail php artisan config:cache
```