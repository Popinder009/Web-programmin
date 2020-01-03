<?php 
var_dump($_POST);
include(__DIR__ .'/../database/conect_to_db.php');
global $connect;
$SQL = "insert into admin values('".$_POST['name']."','". $_POST['email']."')";    
echo $SQL;                    
$handel = $connect->prepare($SQL);
    $handel->execute();