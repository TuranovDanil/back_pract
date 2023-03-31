<div>

    <h2 class="text-dark">Авторизация</h2>

    <h3 class="text-danger"><?= $message ?? ''; ?></h3>

    <h3><?= app()->auth->user()->name ?? ''; ?></h3>
    <?php
    if (!app()->auth::check()):
        ?>
        <form method="post">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <div class="form-group">
                <label>Логин <input type="text" name="login" class="form-control"></label>
            </div>
            <div class="form-group">
                <label>Пароль <input type="password" name="password" class="form-control"></label>
            </div>
            <button class="btn btn-dark">Войти</button>
        </form>
    <?php endif;
    ?>
</div>