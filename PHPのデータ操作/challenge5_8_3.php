<?php
    require_once 'challenge5_8_4.php';
    require_once 'challenge5_8_6.php';

    session_chk();

    $get_data = array();

    if(!empty($_GET['name'])){
        $get_data['name'] = $_GET['name'];
    }
    if(!empty($_GET['honbun'])){
        $get_data['honbun'] = $_GET['honbun'];
    }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title><?php echo SHOW ?></title>
</head>
<body>
    <h1>掲示板</h1>
    <?php
    if(!isset($get_data['name']) || !isset($get_data['honbun'])){
        echo '入力データが不十分です。もう一度入力を行ってください。'."<br><br>";
    }else{
        echo $get_data['name'].'さんの投稿'."<br><br>";
        echo "本文:"."<br>";
        echo $get_data['honbun']."<br><br>";
    }
    ?>
    <form action="challenge5_8_2.php" method="POST">
      <input type="submit" name="btnSubmit" value="戻る">


</body>
</html>
