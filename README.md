# miniTweet
つぶやきを表示するwebサービス

## 環境
- php8.4
- Laravel Framework 10.48.22
- docker8.3

## 開発環境の構築

1. githubからプロジェクトのcloneのSSHを取得して実行

2. プロジェクトのルートへ移動

```
cd ./minitweet
```

3. .env.exampleをコピーして.envの作成

```
cp .env.example .env
```

4. .envのDB_USERNAME、DB_PASSWORDに任意のパラメータを設定する。

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
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

6. sailの起動

```
./vendor/bin/sail up -d
```

7. 別の項目に記載されているコマンドの省略手順を行う（このファイルの下記に記載）

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

## コマンドの省略手順

1. macの場合

シェルの設定ファイルを開く。

```
vim ~/.zshrc
```

iキーを押してインサイトモードにし、エイリアスの入力をする。

```
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

escキーを押す。

終了コマンドを押す。

```
:wq
```

設定ファイルの再読み込みします。

```
source ~/.zshrc
```

## 開発環境の準備(元のlaravelのプロジェクトからの変更点)

1. UTCを日本時間のJSTへ変更

docker/8.4/Dockerfileの「ENV TZ」を変更する。

```
ENV TZ='Asia/Tokyo'
```

再ビルドを実行する。

```
sail build --no-cache
```

再起動する。

```
sail up -d
```

ログインをする。

```
sail shell
```

日付を確認する。

```
date
```

ログアウトする。

```
exit
```

2. MySQLの文字コードを変更

docker/8.4に「my.cnf」を作成する。
下記を記載する。

```
[mysqld]
character-set-server = utf8mb4
collation-server = utf8mb4_bin

[client]
default-character-set = utf8mb4
```

docker-compose.ymlのmysqlのvolumesに下記を追記する。

```
 - './docker/8.4/my.cnf:/etc/my.cnf'
```

mysqlへログインする。

```
sail mysql
```

文字コードを確認する。

```
show variables like '%char%';
```

mysqlからログアウトする。

```
exit
```

## テストコード

- テストの実行   

```
sail test
```

- `sail artisan optimize`後にbreezeの基本テストコードでエラーが出る   

```
sail artisan cache:clear
sail artisan config:clear
sail artisan route:clear
sail artisan view:clear
```