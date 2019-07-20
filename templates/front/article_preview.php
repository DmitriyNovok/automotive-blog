<div class="col-sm-4"><br>
    <img src="data/img/<?= ($article->image !== NULL) ? $article->image : 'no_img.png' ?>" class="img">
    <h3><?= $article->title ?></h3>
    <h5>Автор: <?= $article->user->name ?></h5>
    <h5>Дата публикации: <?= $article->date ?></h5>
    <p><?= $article->text ?></p>
    <a href="/test/testRoutes/Hello" class="btn btn-primary">Читать далее</a>
</div>