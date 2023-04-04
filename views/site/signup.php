<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <div class="form-group">
        <label>Фамилия <input type="text" name="surname" class="form-control"></label>
    </div>
    <div class="form-group">
        <label>Имя <input type="text" name="name" class="form-control"></label>
    </div>
    <div class="form-group">
        <label>Отчество <input type="text" name="patronymic" class="form-control"></label>
    </div>
    <div class="form-group">
        <label>Пол
            <select class="form-select" aria-label="Default select example" name="id_sex">
                <?php
                foreach ($sexes as $sex) {
                    echo "<option value=\"$sex->id\">" . $sex->name . '</option>';

                }
                ?>
            </select>
        </label>
    </div>
    <div class="form-group">
        <label>Дата рождения <input type="date" name="birth" class="form-control"></label>
    </div>
    <div class="form-group">
        <label>Адрес <input type="text" name="address" class="form-control"></label>
    </div>
    <div class="form-group">
        <label>Должность
        <select class="form-select" aria-label="Default select example" name="id_position">
            <?php
            foreach ($positions as $position) {
                echo "<option value=\"$position->id\">" . $position->name . '</option>';

            }
            ?>
        </select>
        </label>
    </div>
    <div class="form-group">
        <label>Подразделение
        <select class="form-select" aria-label="Default select example" name="id_division">
            <?php
            foreach ($divisions as $division) {
                echo "<option value=\"$division->id\">" . $division->name . '</option>';

            }
            ?>
        </select>
        </label>
    </div>
    <div class="form-group">
        <label>Роль
            <select class="form-select" aria-label="Default select example" name="role">
                <option value="admin">admin</option>
                <option value="moder">moder</option>
                <option value="worker">worker</option>
            </select>
        </label>
    </div>
    <div class="form-group">
        <label>Логин <input type="text" name="login" class="form-control"></label>
    </div>
    <div class="form-group">
        <label>Пароль <input type="password" name="password" class="form-control"></label>
    </div>
    <button class="btn btn-dark">Зарегистрироваться</button>
</form>