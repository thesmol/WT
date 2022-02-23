<?php require "require_db.php"; ?>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
        <title>Document</title>
</head>
<?php
if( isset($_SESSION['logged_user']) ): 
?>
    Вы авторизованы
    <hr>
    
    Привет, <?php echo $_SESSION['logged_user']->login; ?>!<br>
    <a href="logout.php">Выйти</a><br>

<?php else: ?>
        <?php require "login.php"; ?>
<nav>
            <!-- <ol>
                <li><a href="login2.php">Авторизация</a></li>
                <li><a href="signup.php">Регистрация</a></li>
                <li><a href="index.php">Главная</a></li>
            </ol> -->
</nav>
<?php endif; ?>

