<?php require "require_db.php"; ?>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
        <title>Document</title>
</head>
<?php
 $data = $_POST;
 if( isset($data['add_note']))
 {
    $errors = array();
    if( trim($data['note']) == '')
        {
            $errors[] = 'Запишите вашу заметку!';
        }
        if( R::count('notes', "note = ?", array($data['note'])) > 0)
        {
            $errors[] = 'Такая заметка уже существует';
        }
    if( empty($errors))
        {
            $note = R::dispense('notes');
            $note -> note = $data['note'];
            $note -> id_user = $_SESSION['logged_user']->id;
            R::store($note);
            echo '<div class="mb-3" style ="color: green;">Ваша заметка сохранена</div><hr>';
        }
    else
        {
            echo '<div class="mb-3" style ="color: red;">'.array_shift($errors).'</div><hr>';
        }        
 }
?>
<?php
if( isset($_SESSION['logged_user']) ): 
?>
    <form action="index.php" method ="POST">
        <div class="mb-3">
        <p>Привет, <?php echo $_SESSION['logged_user']->login; ?>!
        <a href="logout.php">Выйти</a><br></p>
        <p>
            <p><strong>Ваша заметка</strong>:</p>
            <input type="text" name = "note" class="form-control">
        </p>
        <p>
            <input type="submit" value="Добавить заметку" class="btn btn-primary" name = "add_note"><br>
        </p>
        </div>
    </form>
    <form action="index.php" method ="POST">
    <table border=1>
        <tr>
            <td> Заметка</td>
            <td> Удалить </td>
            <td> Изменить </td>
        </tr>
        
</table> 
    <?php
    $array = array(
        $_SESSION['logged_user']->id,   
    );
    $notes = R::find('notes', 'id_user = ?', array($_SESSION['logged_user']->id));
    foreach($notes as $note)
    {
        echo 'Note: '.$note->note. '<br>';
    }
    ?>
</form>


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

