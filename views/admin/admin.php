<?php require_once 'templates/admin/header_admin.php';?>
<br><br>

<h1 class="text-center">Административная панель</h1><br><br>
<div class="container">
    <h2 class="text-center">Список статей</h2><br>
    <a class="btn btn-outline-success my-2 my-sm-0" href="admin.php?dispatch=article_create">Добавить новую статью</a><br><br>
    <table class="table table-hover">
       <?php require 'templates/admin/articles_table.php';?>
    </table><br><br>

    <h2 class="text-center">Список пользователей</h2><br>
    <a class="btn btn-outline-success my-2 my-sm-0" href="admin.php?dispatch=user_create">Добавить нового пользователя</a><br><br>
    <table class="table table-hover">
       <?php require 'templates/admin/users_table.php';?>
    </table>
</div>

<?php require_once 'templates/admin/footer_admin.php';?>