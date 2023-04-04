
<h5 class="text-dark">Дисциплина</h5>
<div class="">

    <?php
    echo '<div class="card" style="width: 18rem;">' . '<div class="card-body">';
    echo '<h5 class="card-title">' . $dis->id . ' | ' . $dis->name . '</h5>';
    echo "<img href=\"$dis->image\">";
    echo "<a href=/pop-it-mvc/dis/{$dis->id}/delete><button class='btn btn-dark'>Удалить</button></a>";
    echo '</div>' . '</div>';
    ?>
</div>
<h2>Редактирование</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <div class="form-group">
        <label>Название <input type="text" name="name" class="form-control"></label>
    </div>
    <button class="btn btn-dark">Изменить</button>
</form>
