<?php
try{
$pdo= new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','nakamura','phlox');
}catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}

$sql =" select * from profiles where name like '%茂%' ";
$query = $pdo -> prepare($sql);
$query -> execute();

$result = $query -> fetchall(PDO::FETCH_ASSOC);

var_dump($result);

?>
