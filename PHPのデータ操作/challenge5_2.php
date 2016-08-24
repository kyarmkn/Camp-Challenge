<?php
 /*２．以下の機能を実装してください。１で作成したHTMLの入力データを取得し、画面に表示する*/
  $name = $_POST["txtName"];
  $gend = $_POST["rdogd"];
  $hobby = $_POST["shumi"];

  echo $name."<br>";
  echo $gend."<br>";
  echo $hobby;
 ?>
