# New Project

## CakePHP プロジェクトの作成

```
cd .
docker run --rm -it -v $(pwd):/home/app -w /home/app katsuhikonagashima/php-fpm-base:7.4-buster /bin/bash
```

```
apt-get install -y curl
curl -sS https://getcomposer.org/installer | php

php composer.phar create-project --prefer-dist cakephp/app:4.* cakephp-vue-template

cp composer.phar ./cakephp-vue-template/
exit
```

Github へ追加する。

```
cd cakephp-vue-template/
git init
git add --all
git commit -m "create cakephp project."
git remote add origin https://github.com/katsuhiko/cakephp-vue-template.git
git push -u origin master
```


## Laravel Mix のインストール

```
cd ..
docker run --rm -it -v $(pwd):/home/app -w /home/app katsuhikonagashima/php-fpm-base:7.4-buster /bin/bash
```

```
apt-get install -y curl
curl -sS https://getcomposer.org/installer | php

php composer.phar create-project --prefer-dist laravel/laravel laravel-template
cd laravel-template
php ../composer.phar require laravel/ui
php artisan ui vue
exit
```

```
cd ../cakephp-vue-template/

cp ../laravel-template/package.json ./
cp ../laravel-template/webpack.mix.js ./

mkdir -p ./assets
cp -r ../laravel-template/resources/js ./assets/js
cp -r ../laravel-template/resources/sass ./assets/sass

docker run --rm -it -v $(pwd):/home/app -w /home/app node:12 npm install
docker run --rm -it -v $(pwd):/home/app -w /home/app node:12 npm install --save-dev vue-router
```

./webpack.mix.js 変更 - CakePHP の形に合わせる

```
mix.setPublicPath('webroot')
    .js('assets/js/app.js', 'assets/js')
    .sass('assets/sass/app.scss', 'assets/css')
    .sourceMaps().webpackConfig({devtool: 'source-map'});;
```

./.gitignore 追加 - 余計なファイルをリポジトリにあげないようにする

```
# Laravel Mix specific files #
##############################
/node_modules/
/webroot/assets/
/webroot/mix-manifest.json
```


## Docker の準備

docker-compose を動かすためのファイルを用意

- ./docker-compose.yml の作成
- ./docker/local 配下の各種ファイルの作成
