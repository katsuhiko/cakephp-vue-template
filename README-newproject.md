# New Project

## CakePHP プロジェクトの作成

```
cd .
docker run --rm -it -v $(pwd):/home/app -w /home/app katsuhikonagashima/php-fpm-base:7.4-buster /bin/bash
```

```
apt-get install -y wget
wget https://getcomposer.org/download/1.9.3/composer.phar

php composer.phar create-project --prefer-dist cakephp/app:4.* cakephp-vue-template

cp composer.phar ./cakephp-vue-template/
exit
```

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
mkdir -p ./assets/js ./assets/sass

curl https://raw.githubusercontent.com/laravel/laravel/master/package.json -O
curl https://raw.githubusercontent.com/laravel/laravel/master/webpack.mix.js -O
curl https://raw.githubusercontent.com/laravel/laravel/master/resources/js/app.js -o ./assets/js/app.js
curl https://raw.githubusercontent.com/laravel/laravel/master/resources/js/bootstrap.js -o ./assets/js/bootstrap.js
curl https://raw.githubusercontent.com/laravel/laravel/master/resources/sass/app.scss -o ./assets/sass/app.scss

docker run --rm -it -v $(pwd):/home/app -w /home/app node:12 npm install
```

webpack.mix.js の内容を変更します。

```
mix.setPublicPath('webroot')
    .js('assets/js/app.js', 'assets/js')
    .sass('assets/sass/app.scss', 'assets/css')
    .sourceMaps();
```
