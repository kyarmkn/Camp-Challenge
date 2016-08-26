<!--
課題
1.トップページへの戻るリンクが存在しないページがある。定義済みの関数を利用して実装しなさい
3.insert_confirm.phpにてどの項目が不完全なのかをわかるようにしなさい
5.insert_result.phpにて、直接リンクしてアクセスしてしまった際のエラー処理が存在しない。これを、insert_confirmからのhiddenされたフォームによるPOSTを利用して実現しなさい
-->


<?php require_once '../common/scriptUtil.php'; /*課題1で追加しました*/?>
<?php require_once '../common/defineUtil.php'; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録確認画面</title>
</head>
  <body>
    <?php
    if(!empty($_POST['name']) && !empty($_POST['year']) && !empty($_POST['month']) && !empty($_POST['day']) /*課題2*/
            && !empty($_POST['type']) && !empty($_POST['tell']) && !empty($_POST['comment'])){

        $post_name = $_POST['name'];
        //date型にするために1桁の月日を2桁にフォーマットしてから格納
        $post_birthday = $_POST['year'].'-'.sprintf('%02d',$_POST['month']).'-'.sprintf('%02d',$_POST['day']);
        $post_type = $_POST['type'];
        $post_tell = $_POST['tell'];
        $post_comment = $_POST['comment'];

        //セッション情報に格納
        session_start();
        $_SESSION['name'] = $post_name;
        $_SESSION['birthday'] = $post_birthday;
        $_SESSION['year'] = $_POST['year'];
        $_SESSION['month'] = $_POST['month'];
        $_SESSION['day'] = $_POST['day'];
        $_SESSION['type'] = $post_type;
        $_SESSION['tell'] = $post_tell;
        $_SESSION['comment'] = $post_comment;
    ?>

        <h1>登録確認画面</h1><br>
        名前:<?php echo $post_name;?><br>
        生年月日:<?php echo $post_birthday;?><br>
        種別:<?php echo $post_type?><br>
        電話番号:<?php echo $post_tell;?><br>
        自己紹介:<?php echo $post_comment;?><br>

        上記の内容で登録します。よろしいですか？

        <form action="<?php echo INSERT_RESULT ?>" method="POST">
          <input type="submit" name="yes" value="はい">
          <input type="hidden" name="page" value="insert"><!-- 課題5で追加 -->
        </form>
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>



    <?php }else{ ?>
        <h1>入力項目が不完全です</h1><br>
        <br>
        <!--　↓課題3↓　-->
         入力不足項目：<br>
        <?php
        session_start();
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['year'] = $_POST['year'];
        $_SESSION['month'] = $_POST['month'];
        $_SESSION['day'] = $_POST['day'];
        $_SESSION['type']=$_POST['type'];
        $_SESSION['tell'] = $_POST['tell'];
        $_SESSION['comment'] = $_POST['comment'];

        $error = array();
            if($_POST['name'] === ""){
              $error['name'] = "名前が入力されていません。.<br>";
            }
            if($_POST['year'] === "----"){
              $error['year'] = "生年月日の年が入力されていません。.<br>";
            }
            if($_POST['month'] === "--"){
              $error['month'] = "生年月日の月が入力されていません。.<br>";
            }
            if($_POST['day'] === "--"){
              $error['day'] = "生年月日の日が入力されていません。.<br>";
            }
            if(!isset($_POST['type'])){
              $error['type'] = "種別が選択されていません。.<br>";
            }
            if($_POST['tell'] === ""){
              $error['tell'] = "電話番号が入力されていません。.<br>";
            }
            if($_POST['comment'] === ""){
              $error['comment'] = "自己紹介文が入力されていません。.<br>";
            }
            foreach($error as $message){
                echo $message;
            }
            ?>

        再度入力を行ってください
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
    <?php }
    echo "<br>".return_top(); /*課題1で追加*/?>
</body>
</html>
