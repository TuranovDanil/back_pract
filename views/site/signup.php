<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <div class="form-group">
        <label>Имя <input type="text" name="name" class="form-control"></label>
    </div>
    <div class="form-group">
        <label>Логин <input type="text" name="login" class="form-control"></label>
    </div>
    <div class="form-group">
        <label>Пароль <input type="password" name="password" class="form-control"></label>
    </div>
    <button class="btn btn-dark">Зарегистрироваться</button>
</form>