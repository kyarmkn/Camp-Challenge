<?php
/*３．クッキーに現在時刻を記録し、次にアクセスした際に、前回記録した日時を表示してください。*/
 $access_time = date('Y年m月d日 H時i分s秒');
 setcookie('LastLoginDate',$access_time);

 $lastdate = $_COOKIE['LastLoginDate'];

 echo "前回ログインは".$lastdate."です。";
 ?>
