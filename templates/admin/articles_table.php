<thead>
<tr>
    <th>ID</th>
    <th>Название статьи</th>
    <th>Дата публикации</th>
    <th>Автор</th>
    <th scope="row"></th>
</tr>
</thead>
<tbody>
<?php foreach ($articles as $article) { ?>
    <tr>
        <td><?= $article->id ?></td>
        <td><a href="admin.php?dispatch=article_read&id=<?= $article->id ?>"><?= $article->title ?></a></td>
        <td><?= $article->date ?></td>
        <td><?= $article->user->name?></td>
        <td>
            <a class="btn btn-outline-success my-2 my-sm-0" href="admin.php?dispatch=article_update&id=<?= $article->id ?>">Редактировать</a>
            <a class="btn btn-outline-success my-2 my-sm-0" href="admin.php?dispatch=article_delete&id=<?= $article->id ?>">Удалить</a>
        </td>
    </tr>
<?php } ?>
</tbody>