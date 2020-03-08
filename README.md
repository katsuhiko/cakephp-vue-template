# CakePHP Vue Template


## インストール

```
git clone https://github.com/katsuhiko/cakephp-vue-template.git
cd cakephp-vue-template

docker run --rm -it -v $(pwd):/home/app -w /home/app node:12 npm install
cp .env.example .env

docker-compose up -d
docker exec -it app php composer.phar install
docker exec -it app php artisan key:generate
docker exec -it app php artisan migrate
```
