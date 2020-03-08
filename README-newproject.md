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
