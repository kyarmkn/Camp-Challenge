<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
if (isset($_GET['mode']) && $_GET['mode'] == "RESULT") {//直接アクセスさせないための追加
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>更新結果画面</title>
</head>
  <body>
    <?php
    //GETを変数へ入れる
    $id = $_GET['id'];
    $name = $_GET['name'];
    $year = $_GET['year'];
    $month = $_GET['month'];
    $day = $_GET['day'];
    $type = $_GET['type'];
    $tell = $_GET['tell'];
    $comme = $_GET['comment'];

    $result = update_profile($name,$year,$month,$day,$type,$tell,$comme,$id);
    //エラーが発生しなければ表示を行う
    if(!isset($result)){
    ?>
    <h1>更新確認</h1>
    以上の内容で更新しました。<br>
    <br>

    <?php
    echo return_top();


    }else{
        echo 'データの更新に失敗しました。次記のエラーにより処理を中断します:'.$result;
        echo "<br><br>".return_top();
    }


  }else{//直接アクセスさせないための追加
      echo "不正なアクセスです。";
      echo "<br><br>";
      echo return_top();
  }
    ?>
  </body>
</html>
