<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<?php
    require "db.php";

    $data = $_POST;
?>
<form action="login.php" method ="POST">
    <div class="mb-3">
    <p>
        <p><strong>Логин</strong>:</p>
        <input type="text" name = "login" class="form-control" value="<?php echo @$data['login']; ?>">
    </p>

    <p>
        <p><strong>Пароль</strong>:</p>
        <input type="password" name = "password" class="form-control" value="<?php echo @$data['password']; ?>">
    </p>

    <p>
        <input type="submit" value="Войти" class="btn btn-primary" name = "do_sighup">
    </p>
    </div>
</form>