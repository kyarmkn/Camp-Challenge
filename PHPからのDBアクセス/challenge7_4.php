<?php
/* 課題4:前回の課題1で作成したテーブルからprofileID=1の情報を取得し、画面に取得した情報を表示してください*/
try{
$pdo= new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','nakamura','phlox');
}catch(PDOException $Exception){
   die('接続に失敗しました:'.$Exception->getMessage());
}

$sql = "select*from profile where id=1";

$query = $pdo -> prepare($sql);
$query -> execute();

$result = $query -> fetchall(PDO::FETCH_ASSOC);

var_dump($result);
 ?>
