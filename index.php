<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
        <title>Document</title>
    </head>
    <body>
        <?php
        if (isset($_GET['login']) && isset($_GET['password'])){
            $login = $_GET['login'];
            $pass = $_GET['password'];
            $host = "localhost";
            $user = "root";
            $xampp_pass = "";
            $bd_name = "reg";

            $sql_connect = new mysqli($host, $user, $xampp_pass, $bd_name);
            if($sql_connect->connect_errno){
                echo $sql_connect-> error;
            }
            $sql = "INSERT INTO users(login, password) VALUES ('$login','$pass')";

            if(!$sql_connect->query($sql))
            {
                echo $sql_connect-> error;   
            }

            $log_in = "INSERT INTO users (login, password) VALUES ('$login','$pass'')";
            
        }
        
        
        ?>
        <header>
        </header>
        <nav>
            <ol>
                <li><a href="/login.php">Авторизация</a></li>
                <li><a href="/signup.php">Регистрация</a></li>
                <li><a href="#">Главная</a></li>
            </ol>
        </nav>
        <main>
            <form method="get" action="index.php">
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" name="login" id="login" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <input type="submit" value="Регистрация!" class="btn btn-primary">
                <input type="submit" value="Вход!!ё!" class="btn btn-primary">
            </form>
        </main>
        <footer>
            2022 Медведев Иван 2012
        </footer>   
        
    </body>
</html>