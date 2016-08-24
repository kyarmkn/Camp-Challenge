<?php
/*４．３と同じ機能をセッションで作成してください。*/
 session_start();
 $_SESSION['date'] = date('Y年m月d日　H時i分s秒');

 echo "前回のログインは". $_SESSION['date']."です。";
 ?>
