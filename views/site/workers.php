<h5 class="text-dark">Подразделения</h5>
<div class="d-flex  flex-wrap">
    <?php
    foreach ($divisions as $division){
        echo '<div class="form-check  px-4">' . '<label>';
        echo '<input class="form-check-input" type="checkbox" value="">';
        echo $division->name . '</label>';
        echo '</div>';
    }
    ?>
</div>
<h5 class="text-dark">Работники</h5>
<div class="d-flex justify-content-between flex-wrap">
    <?php
    foreach ($users as $user){
        echo '<div class="card" style="width: 18rem;">' . '<div class="card-body">';
        echo '<h5 class="card-title mb-2 text-muted">фамилия: ' . $user->surname . '</h5>';
        echo '<h6 class="card-title mb-2 text-dark"">имя: ' . $user->name . '</h6>';
        echo '<h6 class="card-title mb-2 text-muted">отчество: ' . $user->patronymic . '</h6>';
        echo '<h6 class="card-title mb-2 text-dark">пол: ' . $user->id_sex . '</h6>';
        echo '<h6 class="card-title mb-2 text-muted"">дата рождения: ' . $user->birth . '</h6>';
        echo '<h6 class="card-title mb-2 text-dark">адрес: ' . $user->address . '</h6>';
        echo '<h6 class="card-title mb-2 text-muted"">должность: ' . $user->id_position . '</h6>';
        echo '<h6 class="card-title mb-2 text-dark">подразделение: ' . $user->id_division . '</h6>';
        echo '</div>' . '</div>';
    }
    ?>

</div>