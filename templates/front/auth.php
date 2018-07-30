<div class="modal fade" id="Avtoriz" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AvtorizLabel">Авторизация</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="post" action="index.php?dispatch=login">
                        <div class="form-froup">
                            <label for="exampleInputPass">Введите Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email" required>
                        </div>
                        <div class="form-froup">
                            <label for="exampleInputPass">Введите пароль</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPass" aria-describedby="passHelp" placeholder="Пароль" required>
                        </div><br>
                        <div>
                            <button type="submit" class="btn btn-primary">Войти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>