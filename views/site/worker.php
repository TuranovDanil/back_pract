<h5 class="text-dark">Работник</h5>
<div class="d-flex justify-content-between flex-wrap">

    <?php
    echo '<div class="card" style="width: 18rem;">' . '<div class="card-body">';
    echo '<h5 class="card-title mb-2 text-muted">фамилия: ' . $user->surname . '</h5>';
    echo '<h6 class="card-title mb-2 text-dark"">имя: ' . $user->name . '</h6>';
    echo '<h6 class="card-title mb-2 text-muted">отчество: ' . $user->patronymic . '</h6>';
    echo '<h6 class="card-title mb-2 text-dark">пол: ' . $user->id_sex . '</h6>';
    echo '<h6 class="card-title mb-2 text-muted"">дата рождения: ' . $user->birth . '</h6>';
    echo '<h6 class="card-title mb-2 text-dark">адрес: ' . $user->address . '</h6>';
    echo '<h6 class="card-title mb-2 text-muted"">должность: ' . $user->id_position . '</h6>';
    echo '<h6 class="card-title mb-2 text-dark">подразделение: ' . $user->id_division . '</h6>';
    echo "<a href=/pop-it-mvc/worker/{$user->id}/delete><button class='btn btn-dark'>Удалить</button></a>";
    echo '</div>' . '</div>';
    //    }
    ?>
<!--    <a href="/pop-it-mvc/worker/{$user->id}/delete"><button class="btn btn-dark">Удалить</button></a>-->
</div>
<h2>Редактирование</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <div class="form-group">
        <label>Фамилия <input type="text"  name="surname" class="form-control"></label>
    </div>
    <div class="form-group">
        <label>Имя <input type="text" name="name" class="form-control"></label>
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
    <button class="btn btn-dark">Изменить</button>
</form>
