<?php require_once 'templates/Admin/header_crud.php';?>

<br>
<h2 class="text-center">Добавить новую статью</h2>
<form action="admin.php" method="post" id="article-create-form">
    <div class="container">
        <div class="form-group">
            <label for="article_name">Название статьи</label>
            <input id="article_name" type="text" class="form-control" name="article_title">
        </div>

        <div class="form-group">
            <label for="article_text">Текст статьи</label>
            <input id="article_text" type="text" class="form-control" name="article_text">
        </div>

        <div class="form-group">
            <label for="date_publication">Дата публикации</label>
            <input id="date_publication" type="date" class="form-control" name="article_date">
        </div>

        <label for="author">Автор</label>
        <input id="author" class="form-control" name="user_id">
        <br>

        <input type="hidden" name="dispatch" value="article_create">
        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Добавить">
    </div>
</form>

<?php require_once 'templates/Admin/footer_admin.php';?>