<?php
/*課題7:profileID=1のnameを「松岡 修造」に、ageを48に、birthdayを1967-11-06に更新してください*/
 try{
   $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','nakamura','phlox');
 }catch(PDOException $Exception){
   die('接続に失敗しました:'.$Exception->getMessage());
 }

 $sql = "update profile set name='松岡 修造',age=48,birthday='1967-11-06' where id=1";
 $query = $pdo -> prepare($sql);
 $query -> execute();

 $sql2 = "select*from profile where id=1";
 $query2 = $pdo -> prepare($sql2);
 $query2 -> execute();
 $result = $query2 -> fetchall(PDO::FETCH_ASSOC);

 var_dump($result);
?>
