<?php require_once 'templates/front/header.php';?><br><br>

    <div class="container-fluid">
        <div class="container">
            <div class="row text-center">
                <?php foreach ($articles as $article) {
                    require 'templates/front/article_preview.php';
                } ?>
            </div>
        </div>
    </div><br><br><br><br>

<?php require_once 'templates/front/footer.php';?>