<?php
/*２．現在の日時を「年-月-日 時:分:秒」で表示してください。*/
$stamp = mktime(10,38,32,8,9,2016);
$date = date('Y/m/d/H:i:s',$stamp);
echo $date;
?>
