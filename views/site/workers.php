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

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">фамилия</h5>
            <h6 class="card-subtitle mb-2 text-muted">имя</h6>
            <h6 class="card-subtitle mb-2 text-dark">отчество</h6>
            <h6 class="card-subtitle mb-2 text-muted">пол</h6>
            <h6 class="card-subtitle mb-2 text-dark">дата рождения</h6>
            <h6 class="card-subtitle mb-2 text-muted">адрес</h6>
            <h6 class="card-subtitle mb-2 text-dark">должность</h6>
            <h6 class="card-subtitle mb-2 text-muted">подразделение</h6>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">фамилия</h5>
            <h6 class="card-subtitle mb-2 text-muted">имя</h6>
            <h6 class="card-subtitle mb-2 text-dark">отчество</h6>
            <h6 class="card-subtitle mb-2 text-muted">пол</h6>
            <h6 class="card-subtitle mb-2 text-dark">дата рождения</h6>
            <h6 class="card-subtitle mb-2 text-muted">адрес</h6>
            <h6 class="card-subtitle mb-2 text-dark">должность</h6>
            <h6 class="card-subtitle mb-2 text-muted">подразделение</h6>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">фамилия</h5>
            <h6 class="card-subtitle mb-2 text-muted">имя</h6>
            <h6 class="card-subtitle mb-2 text-dark">отчество</h6>
            <h6 class="card-subtitle mb-2 text-muted">пол</h6>
            <h6 class="card-subtitle mb-2 text-dark">дата рождения</h6>
            <h6 class="card-subtitle mb-2 text-muted">адрес</h6>
            <h6 class="card-subtitle mb-2 text-dark">должность</h6>
            <h6 class="card-subtitle mb-2 text-muted">подразделение</h6>
        </div>
    </div>
</div>