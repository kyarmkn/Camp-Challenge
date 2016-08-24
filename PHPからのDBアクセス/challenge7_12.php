<!--課題12:検索用のフォームを用意し、名前、年齢、誕生日を使った複合検索ができるようにしてください。-->
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>検索フォーム</title>
</head>
<body>
        <form action="challenge7_12.php" method="POST">
          名前：<input type="text" name="name" value="">
        　年齢：<input type="text" name="age" value="">
        　誕生日：<input type="text" name="birthday" value="">
        <input type="submit" name="btnSubmit" value="検索">

    </form>
    <br><br>

<?php
if(isset($_POST['name'],$_POST['age'],$_POST['birthday']) == false){
  exit;
}elseif(isset($_POST['name'],$_POST['age'],$_POST['birthday'])){
  $name = $_POST['name'];
  $age = $_POST['age'];
  $birth = $_POST['birthday'];
exit;
}

try{
$pdo= new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','nakamura','phlox');
}catch(PDOException $Exception){
   die('接続に失敗しました:'.$Exception->getMessage());
}

 $sql =  "select * from profiles where name like '%$name%' AND age like '%$age%' AND birthday like '%$birth%' ";
 $query = $pdo -> prepare($sql);
 $query -> execute();
 $result = $query -> fetchall(PDO::FETCH_ASSOC);
 var_dump($result);

?>
</body>
</html>
