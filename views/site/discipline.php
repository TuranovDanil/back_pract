<h5 class="text-dark">Подразделения</h5>
<div class="d-flex  flex-wrap">
    <form action="/pop-it-mvc/discipline/filter-discipline" >
        <?php
        foreach ($divisions as $division){
            echo '<div class="form-check  px-4">' . '<label>';
            echo "<input class='form-check-input' name='filter[]' type='checkbox' value=\"$division->id\">";
            echo $division->name . '</label>';
            echo '</div>';
        }
        ?>
        <button class="btn btn-dark">Найти</button>
    </form>
    <form action="/pop-it-mvc/discipline/search">
    <div class="input-group rounded">
        <input name="search" type="search" class="form-control rounded" placeholder="Сотрудник" aria-label="Search"
               aria-describedby="search-addon"/>
        <button>Найти</button>
    </form>

    </div>
    <div><a class="btn btn-dark" href="<?= app()->route->getUrl('/discipline') ?>">Сбросить</a></div>
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

