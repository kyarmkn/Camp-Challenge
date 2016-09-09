<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
if (isset($_GET['order']) && $_GET['order'] == "update") {//直接アクセスさせないための追加
session_start(); //再度入力するために追加
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>変更入力画面</title>
</head>
<body>
    <form action="<?php echo UPDATE_RESULT ?>" method="GET">
    <?php
    $id = $_GET['id'];
    $result = profile_detail($id);

    $name = $_SESSION['name'];
    $birthday = $_SESSION['birthday'];
    $type = $_SESSION['type'];
    $tell = $_SESSION['tell'];
    $comme = $_SESSION['comment'];
    $newDate = $_SESSION['newDate'];

    // 生年月日を年、月、日に分ける
    $birthday = ($result[0]['birthday']);
    $date = DateTime::createFromFormat('Y-m-d', $birthday);
    $year = $date->format('Y');
    $month = $date->format('m');
    $day = $date->format('d');
    ?>
    名前:
    <input type="text" name="name" value="<?php echo $name; ?>">
    <br><br>

    生年月日:　
    <select name="year">
        <option value="">----</option>
        <?php
        for($i=1950; $i<=2010; $i++){ ?>
        <!--if文を追加-->
        <option value="<?php echo $i;?>"<?php if($i==$year){echo "selected";}?>><?php echo $i ;?></option>
        <?php } ?>
    </select>年
    <select name="month">
        <option value="">--</option>
        <?php
        for($i = 1; $i<=12; $i++){?>
          <!--if文を追加-->
        <option value="<?php echo $i;?>"<?php if($i==$month){echo "selected";}?>><?php echo $i;?></option>
        <?php } ;?>
    </select>月
    <select name="day">
        <option value="">--</option>
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        <option value="<?php echo $i; ?>"<?php if($i==$day){echo "selected";}?>><?php echo $i;?></option>
        <?php } ?>
    </select>日
    <br><br>

    種別:
    <br>
    <?php
    for($i = 1; $i<=3; $i++){ ?>
    <input type="radio" name="type" value="<?php echo $i; ?>"<?php if($i==$type){echo "checked";}?>><?php echo ex_typenum($i);?><br>
    <?php } ?>
    <br>

    電話番号:
    <input type="text" name="tell" value="<?php echo $tell; ?>">
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $comme; ?></textarea><br><br>

    <form action="<?php echo UPDATE_RESULT; ?>" method="GET">
    <input type="hidden" name="mode"  value="RESULT">
    <input type="hidden" name="id" value=<?php echo $id ?>>
    <input type="submit" name="btnSubmit" value="以上の内容で更新を行う">
    </form>
    <form action="<?php echo RESULT_DETAIL; ?>" method="GET">
      <input type="submit" name="NO" value="詳細画面に戻る"style="width:100px">
     <input type="hidden" name="id" value=<?php echo $id ?>>
    </form>
    <?php echo return_top();

  }else{//直接アクセスさせないための追加
      echo "不正なアクセスです。";
      echo "<br><br>";
      echo return_top();
    }?>
</body>

</html>
