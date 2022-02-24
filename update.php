<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
        <title>Document</title>
</head>
<?php
// $id = $_REQUEST['id'];
// //$notee = $_REQUEST['note']

// $cat = R::load('notes', $id);
// $cat->note = $new_note; 
// R::store($cat);
// header('Location: index.php');
$host="localhost";
$user="root";
$pass="";
$db="registration";

$con = mysqli_connect($host, $user, $pass) or die("no connection");
mysqli_select_db($con,$db) or die("no select db");
if(isset($_REQUEST["target_id"]))
    {
    $target_id = $_REQUEST["target_id"];
    $note = $_REQUEST["note"];



    $s = "UPDATE notes SET note = '".$note."' WHERE id = ".$target_id;
    print($s);
    mysqli_query($con, $s);
    header('Location: index.php');
    exit();
    }

if (isset($_REQUEST['id']))
    {

    $id = $_REQUEST['id'];
    $s = "SELECT * FROM notes WHERE id = ".$id;
    $res = mysqli_query($con, $s);
    $asd = mysqli_fetch_row($res);

    print('<form>');
    print('<div class="mb-3">');
    print('<input hidden type="text" name="target_id" value="'.$id.'" required>');
    print('<input type="text" class="form-control" name="note" value="'.$asd[1].'" required>');
    print('<input type="submit" class="btn btn-primary" value="Принять изменения" name="send">');
    print('<br>');
    print('</div>');
    print('</form>');
    }
?>
