<?php require_once '../common/defineUtil.php'; ?>
<?php require_once '../common/scriptUtil.php'; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>ユーザー情報検索画面</title>
</head>
  <body>
    <?php session_start(); //追加 ?>
    <form action="<?php echo SEARCH_RESULT ?>" method="GET">

        名前:
        <br>
        <!--valueを追加↓-->
        <input type="text" name="name" value="<?php echo form_value('name'); ?>">
        <br><br>

        生年:
        <br>
        <select name="year">
            <option value="">----</option>
            <?php
            for($i=1950; $i<=2010; $i++){ ?>
              <!--if分の部分を追加-->
              <option value="<?php echo $i;?>"<?php if($i==form_value('year')){echo "selected";}?>><?php echo $i;?></option>
            <?php } ?>
        </select>年生まれ
        <br><br>

        種別:
        <br>
        <?php
        for($i = 1; $i<=3; $i++){ ?>
          <!--if分の部分を追加-->
        <input type="radio" name="type" value="<?php echo $i; ?>"<?php if($i==form_value('type')){echo "checked";}?>><?php echo ex_typenum($i);?><br>
        <?php } ?>
        <br>
        <input type="submit" name="btnSubmit" value="検索">
        <input type="hidden" name="search" value="Sresult"><!--直接アクセスさせないための追加-->
      </form>
      <br><br>
      <?php echo return_top(); ?>
  </body>
</html>
