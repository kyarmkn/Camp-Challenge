<!--課題11:profileIDで指定したレコードの、profileID以外の要素をすべて上書きできるフォームを作成してください-->
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form action="challenge7_11.php" method="post">
    I D :<input type="text" name="id"><br><br>
    名 前:<input type="text" name="name">
    電 話:<input type="text" name="tell">
    年 齢:<input type="text" name="age">
    誕生日:<input type="text" name="birth">
        <input type="submit" value="更新">
  </form>

<?php
  if(isset($_POST['id'],$_POST['name'],$_POST['tell'],$_POST['age'],$_POST['birthday'])){
      $id = $_POST['id'];
      $name = $_POST['name'];
      $tell = $_POST['tell'];
      $age = $_POST['age'];
      $birth = $_POST['birth'];
  }else{
    exit;
  }
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','nakamura','phlox');
  }catch(PDOException $Exception){
        die('接続に失敗しました:' .$Exception -> getMessage());
  }
  $sql = "update profile set name=':name', tell=':tell', age=':age', birthday =':birth' where id = ':id'";
  $query = $pdo -> prepare($sql);
  $query -> bindValue(':id',"$id");
  $query -> bindValue(':name',"$name");
  $query -> bindValue(':tell',"$tell");
  $query -> bindValue(':age',"$age");
  $query -> bindValue(':birth',"$birth");

  $query -> execute();

  $sql2 = "select*from profile";
  $query = $pdo -> prepare($sql2);
  
  $result = $query -> fetchall(PDO::FETCH_ASSOC);

  var_dump($result);

?>
</body>
</html>
