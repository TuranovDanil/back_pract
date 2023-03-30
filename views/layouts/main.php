<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <title>Pop it MVC</title>
</head>
<body>
<header>
    <nav class="navbar navbar-dark bg-dark">
        <?php
        if (!app()->auth::check()):
            ?>
            <a class="nav-link text-light" href="<?= app()->route->getUrl('/login') ?>">Вход</a>

        <?php
        else:
            ?>
            <a class="nav-link text-light" href="<?= app()->route->getUrl('/discipline') ?>">Дисциплины</a>
            <a class="nav-link text-light" href="<?= app()->route->getUrl('/workers') ?>">Сотрудники</a>
            <?php
            if (app()->auth::user()->role == 'moder' || app()->auth::user()->role == 'admin'):
                ?>
                <a class="nav-link text-light" href="<?= app()->route->getUrl('/moder') ?>">Moder</a>
            <?php
            endif;
            if (app()->auth::user()->role == 'admin'):
                ?>
                <a class="nav-link text-light" href="<?= app()->route->getUrl('/signup') ?>">Sign Up</a>
            <?php
            endif;
            ?>
            <a class="nav-link text-light" href="<?= app()->route->getUrl('/logout') ?>">Выход
                (<?= app()->auth::user()->name ?>)</a>
        <?php
        endif;
        ?>

    </nav>
</header>
<main>
    <div class="container">
        <?= $content ?? '' ?>
    </div>
</main>

</body>
</html>