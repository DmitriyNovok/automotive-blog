<div class="col-sm-4"><br>
    <img src="public/web/img/<?= ($article->image !== NULL) ? $article->image : 'no_img.png' ?>" class="img">
    <h3><?= $article->title ?></h3>
    <h5>Автор: <?= $article->user->name ?></h5>
    <h5>Дата публикации: <?= $article->date ?></h5>
    <p><?= $article->text ?></p>
    <a href="index.php?dispatch=article&id=<?= $article->id ?>" class="btn btn-primary">Читать далее</a>
</div>