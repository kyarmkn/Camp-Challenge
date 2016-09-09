<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
//if (isset($_GET['detail']) && $_GET['detail'] == "result_detail") {
session_start(); //再度入力する時に使う
?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>ユーザー情報詳細画面</title>
</head>
  <body>
    <?php
    $id = $_GET['id'];
    $result = profile_detail($_GET['id']);
    //エラーが発生しなければ表示を行う
    if(is_array($result)){

      $_SESSION['name'] = $result[0]['name'];
      $_SESSION['birthday'] = $result[0]['birthday'];
      $_SESSION['type'] =  $result[0]['type'];
      $_SESSION['tell'] = $result[0]['tell'];
      $_SESSION['comment'] = $result[0]['comment'];
      $_SESSION['newDate'] = $result[0]['newDate'];

      $name = $_SESSION['name'];
      $birth = $_SESSION['birthday'];
      $type = $_SESSION['type'];
      $tell = $_SESSION['tell'];
      $comme = $_SESSION['comment'];
      $newDate = $_SESSION['newDate'];
    ?>

    <h1>詳細情報</h1>
    名前:<?php echo $name;?><br>
    生年月日:<?php echo $birth;?><br>
    種別:<?php echo ex_typenum($type);?><br>
    電話番号:<?php echo $tell;?><br>
    自己紹介:<?php echo $comme;?><br>
    登録日時:<?php echo date('Y年m月d日　G時i分s秒', strtotime($newDate)); ?><br>

    <form action="<?php echo UPDATE; ?>" method="GET">
        <input type="submit" name="update" value="変更"style="width:100px">
        <input type="hidden" name="order" value="update"><!--直接アクセスさせないためのhidden追加-->
        <input type="hidden" name="id" value=<?php echo $id ?>>
    </form>
    <form action="<?php echo DELETE; ?>" method="GET">
        <input type="submit" name="delete" value="削除"style="width:100px">
        <input type="hidden" name="order" value="delete"><!--直接アクセスさせないためのhidden追加-->
        <input type="hidden" name="id" value=<?php echo $id ?>>
    </form><br><br>
    <?php echo return_top();
    ?>

    <?php
    }else{
        echo 'データの検索に失敗しました。次記のエラーにより処理を中断します:'.$result;
    echo "<br><br>".return_top();
    }

/*  }else{//直接アクセスさせないための追加
   echo "不正なアクセスです。";
   echo "<br><br>";
   echo return_top();
 }  */?>
  </body>
</html>
