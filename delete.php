<?php require "require_db.php"; 
$id = $_REQUEST['id'];
$cat = R::load('notes', $id);
R::trash($cat);
// $host="localhost";
// $user="root";
// $pass="";
// $db="registration";

// $con = mysqli_connect($host, $user, $pass) or die ("no connection");
// mysqli_select_db($con, $db) or die ("ni select db");
// $id = $_REQUEST['id'];
// $query="DELETE FROM `notes` WHERE `notes`.`id` =".$id;
// mysqli_query($con, $query);
header('Location: index.php');

?>