<div>
<?php
foreach ($divisions as $division){
    echo '<div class="form-check">' . '<label>';
    echo '<input class="form-check-input" type="checkbox" value="">';
    echo $division->name . '</label>';
    echo '</div>';
}
?>
</div>
<div class="d-flex justify-content-between flex-wrap">
    <?php
    foreach ($discipline as $dis) {
        echo '<div class="card" style="width: 18rem;">' . '<div class="card-body">';
        echo '<h5 class="card-title">' . $dis->id . ' | ' . $dis->name . '</h5>';
        echo '</div>' . '</div>';
    }
    ?>
</div>

