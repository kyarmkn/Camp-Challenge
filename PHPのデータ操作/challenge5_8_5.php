<?php
    require_once 'challenge5_8_6.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title><?php echo REDIRECT ?></title>
</head>
<body>
    <?php
    if(isset($_GET['mode']) && $_GET['mode']=='timeout'){
    ?>
        <h1>セッション有効切れ</h1>
        セッション有効期限切れです。三秒後にログイン画面に移動します
    <?php
    }else{
    ?>
        <h1>不正なアクセス</h1>
        不正なアクセスです。三秒後にログイン画面に移動します
    <?php
    }
    ?>
    <meta http-equiv="refresh" content="3;URL='challenge5_8_1.php'">
</body>
</html>
