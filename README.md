# CakePHP Vue Template


## インストール

```
git clone https://github.com/katsuhiko/laravel-vue-manning.git
cd laravel-vue-manning

docker run --rm -it -v $(pwd):/home/app -w /home/app node:10.16 npm install
cp .env.example .env

docker-compose up -d
docker exec -it app php composer.phar install
docker exec -it app php artisan key:generate
docker exec -it app php artisan migrate
```

----


## プロジェクトの作成

```
docker run --rm -it -v $(pwd):/home/app -w /home/app php:7.3-fpm-stretch /bin/bash

apt-get update
apt-get upgrade -y
apt-get install -y git libzip-dev zip unzip
docker-php-ext-install zip
php composer.phar create-project --prefer-dist laravel/laravel laravel-vue-manning
cp composer.phar ./laravel-vue-manning/
exit

cd laravel-vue-manning/
```


## 追加のライブラリ

- vue-router

```
docker run --rm -it -v $(pwd):/home/app -w /home/app node:10.16 npm install -D vue-router
```

- Vuetify
    - 参考: https://qiita.com/nobu-maple/items/43c1228b8f04837d753b

```
docker run --rm -it -v $(pwd):/home/app -w /home/app node:10.16 npm install -D vuetify
docker run --rm -it -v $(pwd):/home/app -w /home/app node:10.16 npm install -D material-design-icons-iconfont
```

- Storybook
    - 参考: https://qiita.com/sugasaki/items/6dc2169c3e13fbe05eda

```
docker run --rm -it -v $(pwd):/home/app -w /home/app node:10.16 npm install -D @storybook/vue
docker run --rm -it -v $(pwd):/home/app -w /home/app node:10.16 npm install -D babel-preset-vue

docker run --rm -it -v $(pwd):/home/app -w /home/app node:10.16 npm install -D @storybook/addon-actions
docker run --rm -it -v $(pwd):/home/app -w /home/app node:10.16 npm install -D @storybook/addon-notes
docker run --rm -it -v $(pwd):/home/app -w /home/app node:10.16 npm install -D @storybook/addon-storyshots
docker run --rm -it -v $(pwd):/home/app -w /home/app node:10.16 npm install -D @storybook/addon-viewport
```

- v-money

```
docker run --rm -it -v $(pwd):/home/app -w /home/app node:10.16 npm install -D v-money
```


## 参考

- icon一覧
    - https://material.io/tools/icons/?style=baseline


## コミット時のコメント

Angular のコメントルールを参考。

- https://github.com/angular/angular.js/blob/master/DEVELOPERS.md#type

```
feat        : 新機能
fix         : バグ修正
docs        : ドキュメントのみの変更
style       : コードの意味に影響を与えない変更（空白、フォーマット、セミコロンの欠落など）
refactor    : バグを修正も機能も追加しないコード変更
perf        : パフォーマンスを向上させるコード変更
test        : 欠けているテストや既存のテストの修正
chore       : ビルドプロセスの変更、あるいは文書生成などの補助ツールやライブラリーの変更
```
