<?php
require "db.php";

    $data = $_POST;
    if( isset($data['do_signup']))
    {
        $errors = array();
        // здесь регистрируем
        if( trim($data['login']) == '')
        {
            $errors[] = 'Введите логин!';
        }

        if( trim($data['email']) == '')
        {
            $errors[] = 'Введите почту!';
        }

        if( $data['password'] == '')
        {
            $errors[] = 'Введите пароль!';
        }

        if( $data['password_2'] != $data['password'])
        {
            $errors[] = 'Пароль подтвержден не верно!';
        }

        if( R::count('users', "login = ?", array($data['login'])) > 0)
        {
            $errors[] = 'Пользователь с таким логином уже существует!';
        }
        if( R::count('users', "email = ?", array($data['email'])) > 0)
        {
            $errors[] = 'Пользователь с такой почтой уже существует!';
        }

        if( empty($errors))
        {
            // все норм можно регистрировать
            $user = R::dispense('users');
            $user -> login = $data['login'];
            $user -> email = $data['email'];
            $user -> password = password_hash($data['password'], PASSWORD_DEFAULT);
            R::store($user);
            echo '<div class="mb-3" style ="color: green;">Вы успешно зарегистрированы! Перейдите на <a href="index.php">главную </a>страницу для входа</div><hr>';
        }
        else
        {
            echo '<div class="mb-3" style ="color: red;">'.array_shift($errors).'</div><hr>';
        }
    }

?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>



<form action="signup.php" method ="POST">
    <div class="mb-3">
    <p>
        <p><strong>Введите логин</strong>:</p>
        <input type="text" name = "login" class="form-control" value="<?php echo @$data['login']; ?>">
    </p>
    <p>
        <p><strong>Введите электронную почту</strong>:</p>
        <input type="email" name = "email" class="form-control" value="<?php echo @$data['email']; ?>">
    </p>

    <p>
        <p><strong>Создайте пароль</strong>:</p>
        <input type="password" name = "password" class="form-control" value="<?php echo @$data['password']; ?>">
    </p>

    <p>
        <p><strong>Подтвердите пароль</strong>:</p>
        <input type="password" name = "password_2" class="form-control" value="<?php echo @$data['password_2']; ?>">
    </p>

    <p>
        
        <input type="submit" value="Зарегистрироваться" class="btn btn-primary" name = "do_signup">
        <a href="index.php">Главная</a>
    </p>
    </div>
</form>