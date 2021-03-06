<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<?php
    $data = $_POST;

    if( isset($data['do_login']))
    {
        $errors = array();
        $user = R::findOne('users', 'login = ?', array($data['login']));
        if( $user )
        {
            //логин существует
            if( password_verify($data['password'], $user->password))
            {
                //все норм пора логинить пользователя
                $_SESSION['logged_user'] = $user; // или всего пользователя или его айди
                //echo '<div class="mb-3" style ="color: green;">Вы успешно авторизованы!</div><hr>';
                header('Location: index.php');
            }
            else
            {
                $errors[] = 'Неверный пароль';
            }
        }
        else
        {
            $errors[] = 'Пользователь с таким логином не найден';
        }

        if( !empty($errors))
        {
            echo '<div class="mb-3" style ="color: red;">'.array_shift($errors).'</div><hr>';
            
        }
        

    }
?>
<form action="login2.php" method ="POST">
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
        <input type="submit" value="Войти" class="btn btn-primary" name = "do_login"><br>
        <a href="signup.php">Регистрация</a>
    </p>
    </div>
</form>