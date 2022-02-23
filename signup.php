<?php
require "db.php";
?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>

<form action="signup.php" method ="POST">
    <div class="mb-3">
    <p>
        <p><strong>Введите логин</strong>:</p>
        <input type="text" name = "login" class="form-control">
    </p>
    <p>
        <p><strong>Введите электронную почту</strong>:</p>
        <input type="email" name = "email" class="form-control">
    </p>

    <p>
        <p><strong>Создайте пароль</strong>:</p>
        <input type="password" name = "password" class="form-control">
    </p>

    <p>
        <p><strong>Подтвердите пароль</strong>:</p>
        <input type="password" name = "password_2" class="form-control">
    </p>

    <p>
        <input type="submit" value="Зарегистрироваться" class="btn btn-primary">
    </p>
    </div>
</form>