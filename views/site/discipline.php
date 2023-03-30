<h5 class="text-dark">Подразделения</h5>
<div class="d-flex  flex-wrap">
<?php
foreach ($divisions as $division){
    echo '<div class="form-check px-4">' . '<label>';
    echo '<input class="form-check-input" type="checkbox" value="">';
    echo $division->name . '</label>';
    echo '</div>';
}
?>
    <div class="input-group rounded">
        <input type="search" class="form-control rounded" placeholder="Сотрудник" aria-label="Search" aria-describedby="search-addon" />
        <button>Найти</button>
  </span>
    </div>
<h5 class="text-dark">Дисциплины</h5>
<div class="d-flex justify-content-between flex-wrap">
    <?php
    foreach ($discipline as $dis) {
        echo '<div class="card" style="width: 18rem;">' . '<div class="card-body">';
        echo '<h5 class="card-title">' . $dis->id . ' | ' . $dis->name . '</h5>';
        echo '<button class="btn btn-dark">Изменить</button>' . '<button class="btn btn-dark">Удалить</button>';
        echo '</div>' . '</div>';
    }
    ?>
</div>

