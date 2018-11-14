<?php
try{
$con = "mysql:host=mysql.rnu.tn;dbname=gestionEcole";
$pdo = new PDO($con, 'issakha', 'diallo91');
}catch(PDOException $e){
$msg = 'Erreur PDO :'.$e->getMessage();
die($msg);
}
?>


