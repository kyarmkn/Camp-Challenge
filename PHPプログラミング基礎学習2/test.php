<?php
    $arr = array(
                       1 => 'soeda',
                       2 => 'hayashi',
                       3 => 'geekjob',
                  );

    // 要素のみをループ処理する場合
    foreach($arr as $value) {
        echo $value;
    }

    // キーワードと要素の両方を利用する場合
    foreach($arr as $key => $value) {
        echo 'key:' . $key . ' value:' . $value;
    }
?>
