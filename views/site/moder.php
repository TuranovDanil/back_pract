<h3 class="text-danger"><?= $message ?? ''; ?></h3>
<div class="d-flex justify-content-between flex-wrap">

    <form method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <h5 class="text-dark">Сотрудник-дисциплина</h5>
        <div class="form-group">
            <label>Сотрудник
                <select class="form-select" aria-label="Default select example" name="id_worker">
                    <?php
                    foreach ($users as $user) {
                        echo "<option value=\"$user->id\">" . $user->surname . ' ' . $user->name . '</option>';

                    }
                    ?>
                </select>
            </label>
        </div>
        <div class="form-group">
            <label>Дисциплина
                <select class="form-select" aria-label="Default select example" name="id_discipline">
                    <?php
                    foreach ($discipline as $dis) {
                        echo "<option value=\"$dis->id\">" . $dis->name . '</option>';

                    }
                    ?>
                </select>
            </label>
        </div>
        <button class="btn btn-dark">Добавить</button>
    </form>

    <form action="/pop-it-mvc/moder/add-discipline" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <h5 class="text-dark">Дисциплина</h5>
        <div class="form-group">
            <label>Название <input type="text" name="name" class="form-control"></label>
        </div>
        <button class="btn btn-dark">Добавить</button>
    </form>

    <form method="post" action="/pop-it-mvc/moder/add-division">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <h5 class="text-dark">Подразделения</h5>
        <div class="form-group">
            <label>Название <input type="text" name="name" class="form-control"></label>
        </div>
        <div class="form-group">
            <label>Вид
                <select class="form-select" aria-label="Default select example" name="id_type">
                    <?php
                    foreach ($types as $type) {
                        echo "<option value=\"$type->id\">" . $type->name . '</option>';

                    }
                    ?>
                </select>
            </label>
        </div>
        <button class="btn btn-dark">Добавить</button>
    </form>


    <form method="post" action="/pop-it-mvc/moder/add-type">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <h5 class="text-dark">Тип подразделения</h5>
        <div class="form-group">
            <label>Название <input type="text" name="name" class="form-control"></label>
        </div>
        <button class="btn btn-dark">Добавить</button>
    </form>


    <form method="post" action="/pop-it-mvc/moder/add-position">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <h5 class="text-dark">Должность</h5>
        <div class="form-group">
            <label>Название <input type="text" name="name" class="form-control"></label>
        </div>
        <button class="btn btn-dark">Добавить</button>
    </form>
</div>