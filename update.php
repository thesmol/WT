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

    print("<form class='mb-3'>");
    print('<input hidden type="text" name="target_id" value="'.$id.'" required>');
    print('<input type="text" name="note" value="'.$asd[1].'" required>');
    print('<input type="submit" value="Отправить запрос" name="send">');
    print("</form>");
    }
?>
