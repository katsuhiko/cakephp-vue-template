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
