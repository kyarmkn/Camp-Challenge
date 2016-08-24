<?php
 /*課題6:課題2でINSERTしたレコードを指定して削除してください。SELECT*で結果を表示してください*/
 try{
 $pdo= new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','nakamura','phlox');
 }catch(PDOException $Exception){
  	die('接続に失敗しました:'.$Exception->getMessage());
 }

 $sql = "delete from profile where id=1";
 $quary = $pdo -> prepare($sql);
 $quary -> execute();
 $result = $quary -> fetchall(PDO::FETCH_ASSOC);

 var_dump($result);
 ?>
