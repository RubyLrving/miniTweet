# miniTweet
つぶやきを表示するwebサービス

## 環境
- php8.3.13
- Laravel Framework 10.48.22
- docker8.3

## 共有

1. githubからプロジェクトのcloneをダウンロード

2. プロジェクトのルートで実行

```cmd:
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```