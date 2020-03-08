# Sample Apps

## マイグレーション

```
docker exec -it app bin/cake bake migration CreateTasks
```

20200308075713_CreateTasks.php 実装

```
docker exec -it app bin/cake migrations migrate
```


## モデルの作成

```
docker exec -it app bin/cake bake model tasks
```


## ルーティング

./config/routes.php 実装

ルーティングは手間でもすべて書くことにしている。


## コントローラーの作成

./src/Controller/Api/TasksController 実装
