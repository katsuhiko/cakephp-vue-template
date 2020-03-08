# CakePHP Vue Template


## インストール

```
git clone https://github.com/katsuhiko/cakephp-vue-template.git
cd cakephp-vue-template

docker run --rm -it -v $(pwd):/home/app -w /home/app node:12 npm install
cp ./config/.env.example ./config/.env
cp ./config/app_local.example.php ./config/app_local.php

docker-compose up -d
docker exec -it app php composer.phar install
```
