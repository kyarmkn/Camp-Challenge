<!-- 課題1.トップページへの戻るリンクが存在しないページがある。定義済みの関数を利用して実装しなさい
→「require_once '../common/scriptUtil.php';」「return_top();」を追加
課題2. insert_confirm.phpにて生年月日の入力がされていない(年月日が「----」のままでも処理を通過してしまう)時にも正しく判定されるようにしなさい
→生年月日のnameとmethodを追加
課題4.再度入力する際に、このままではフォームに値が保持されていない。適切な処理を施して、再度入力の際にはフォームに値を保持したままにさせなさい
→セッションの追加と、それぞれのフォームに保持するコード追加 -->


<?php require_once '../common/scriptUtil.php';?>
<?php require_once '../common/defineUtil.php';?>
<?php session_start();
  // $_SESSIONの中身があるか
  if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
  } else {
    $name = '';
  }
  if (isset($_SESSION['year'])) {
    $year = $_SESSION['year'];
  } else {
    $year = '';
  }
  if (isset($_SESSION['month'])) {
    $month = $_SESSION['month'];
  } else {
    $month = '';
  }
  if (isset($_SESSION['day'])) {
    $day = $_SESSION['day'];
  } else {
    $day = '';
  }
  if (isset($_SESSION['type'])) {
    $type = $_SESSION['type'];
  } else {
    $type = '';
  }
  if (isset($_SESSION['tell'])) {
    $tell = $_SESSION['tell'];
  } else {
    $tell = '';
  }
  if (isset($_SESSION['comment'])) {
    $comment = $_SESSION['comment'];
  } else {
    $comment = '';
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>
    <form action="<?php echo INSERT_CONFIRM ?>" method="POST">
    名前:
    <input type="text" name="name" value=<?php echo $name ?>>
    <br><br>

    生年月日:　
    <select name="year">
      <option  name="year" value="" method="POST">----</option>
        <?php
        for($i=1950; $i<=2010; $i++){
          if($i == $year){?>
           <option value="<?php echo $i;?>" selected><?php echo $i ;?></option>
<?php    }else{ ?>
           <option value="<?php echo $i;?>"><?php echo $i ;?></option>
<?php      }
          } ?>
    </select>年

    <select name="month">
        <option  name="month" value="">--</option>
        <?php
        for($i = 1; $i<=12; $i++){
           if($i == $month){?>
              <option value="<?php echo $i;?>" selected><?php echo $i;?></option>
<?php     }else{ ?>
              <option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php    }
        }?>
    </select>月

    <select name="day">
        <option name="day" value="">--</option>
        <?php
        for($i = 1; $i<=31; $i++){
          if($i == $month){?>
           <option value="<?php echo $i; ?>" selected><?php echo $i;?></option>
<?php   }else{ ?>
           <option value="<?php echo $i; ?>"><?php echo $i;?></option>
<?php   }
         }?>
    </select>日
    <br><br>

    種別:
    <br>
    <input type="radio" name="type" value="エンジニア" checked
       <?php   if ($type == "エンジニア") { echo 'checked'; } ?>>エンジニア<br>
    <input type="radio" name="type" value="営業"
      <?php   if ($type == "営業") { echo 'checked'; } ?>>営業<br>
    <input type="radio" name="type" value="その他"
      <?php   if ($type == "その他") { echo 'checked'; } ?>>その他<br>
    <br>

    電話番号:
    <input type="text" name="tell" value=<?php echo $tell ?>>
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $comment ?></textarea><br><br>

    <input type="submit" name="btnSubmit" value="確認画面へ">
    <br><br>
    <?php echo return_top();?>
    </form>
</body>
</html>
