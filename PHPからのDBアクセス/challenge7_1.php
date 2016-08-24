<?php
try{
$pdo= new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','nakamura','phlox');
}catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}

 ?>
