<?php
/*課題2:前回の課題1で作成したテーブルに自由なメンバー情報を格納する処理を構築してください*/
 try{
 $pdo= new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','nakamura','phlox');
 }catch(PDOException $Exception){
   die('接続に失敗しました:'.$Exception->getMessage());
 }

  $sql = "insert into profile(id,name,age,tell,birthday)
          values (:id,:name,:age,:tell,:birthday)";
  $query = $pdo -> prepare($sql);

  $query -> bindValue(':id',1);
  $query -> bindValue(':name','佐藤 清');
  $query -> bindValue(':age',24);
  $query -> bindValue(':tell','012-345-6789');
  $query -> bindValue(':birthday','1992-08-21');

  $query -> execute();

   ?>
