<!--
課題
5.insert_result.phpにて、直接リンクしてアクセスしてしまった際のエラー処理が存在しない。これを、insert_confirmからのhiddenされたフォームによるPOSTを利用して実現しなさい。
6.insert_result.phpにて、SQLを実行した際に現在時刻が正しい型で格納されない。これを修正しなさい。
8.insert_result.phpにて、SQLを実行した結果正しくデータが格納できたのかどうかを判定していない。これを判定し、「データの挿入に失敗しました:[SQLのエラー文]」となるように修正しなさい。（ヒント:new PDO()を行う時点から工夫する必要がある。シチュエーション:デフォルトでPHPとしてのエラーは吐かれるが、その後の処理が中止されてしまうので、もしその後に「トップへ戻る」などのリンクを吐く処理を記述していた場合実行されなくなってしまう)
-->

<?php require_once '../common/scriptUtil.php'; ?>
<?php require_once '../common/dbaccesUtil.php'; ?>
<?php if (isset($_POST['page']) && $_POST['page'] == "insert") { //課題5で追加しました ?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録結果画面</title>
</head>
<body>

    <h1>登録結果画面</h1><br>
    名前:<?php echo $name;?><br>
    生年月日:<?php echo $birthday;?><br>
    種別:<?php echo $type?><br>
    電話番号:<?php echo $tell;?><br>
    自己紹介:<?php echo $comment;?><br>
    以上の内容で登録しました。<br>

    <?php echo return_top();
    //※ここでTOPページに戻り再度「新規登録」しようとすると前の登録内容が表示されてしまったので追加しました。↓↓
    unset($_SESSION['name']);
    unset($_SESSION['birthday']);
    unset($_SESSION['year']);
    unset($_SESSION['month']);
    unset($_SESSION['day']);
    unset($_SESSION['type']);
    unset($_SESSION['tell']);
    unset($_SESSION['comment']);

  //↓課題5で追加しました。↓
  }else{
    echo "不正なアクセスです。";
    echo "<br><br>";
    echo return_top();
  } ?>

</body>

</html>
