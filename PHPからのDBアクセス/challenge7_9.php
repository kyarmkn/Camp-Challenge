<?php
 /*課題9:フォームからデータを挿入できる処理を構築してください。*/

 require_once 'challenge7_9.php';
 const INPUT = 'challenge7_9.php';
 ?>

 <!DOCTYPE html>
 <html lang="ja">
 <head>
 <meta charset="UTF-8">
       <title><?php echo INPUT ?></title>
 </head>
 <body>
    <form action="<?php echo INPUT ?>" method="POST">
         追加データ：<br><br>
          I D  <input type="text" name="id" value=""><br><br>
         名  前<input type="text" name="name" value=""><br><br>
         年  齢<input type="text" name="age" value=""><br><br>
         電  話<input type="text" name="tell" value=""><br><br>
         誕生日<input type="text" name="birth" value=""><br><br>
         <input type="submit" name="btnSubmit" value="追加">

     </form>
     <br><br>

 <?php
 if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['age']) &&
    isset($_POST['tell']) && isset($_POST['birth'])){
      try{
      $pdo= new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','nakamura','phlox');
      }catch(PDOException $Exception){
         die('接続に失敗しました:'.$Exception->getMessage());
      }

      $id = $_POST['id'];
      $name = $_POST['name'];
      $age = $_POST['age'];
      $tell = $_POST['tell'];
      $birth = $_POST['birth'];

       $sql = "insert into profile(id,name,age,tell,birthday) values(:id,:name,:age,:tell,:birth);";
       $query = $pdo -> prepare($sql);
       $query -> bindValue(':id',"$id");
       $query -> bindValue(':name',"$name");
       $query -> bindValue(':age',"$age");
       $query -> bindValue(':tell',"$tell");
       $query -> bindValue(':birth',"$birth");

       $query -> execute();

       $sql2 = "select * from profile;";
       $query = $pdo -> prepare($sql2);

       $query -> execute();

       $result = $query -> fetchall(PDO::FETCH_ASSOC);

       var_dump($result);
  }

?>

</body>
</html>
