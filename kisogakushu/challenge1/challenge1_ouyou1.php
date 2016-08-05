<?php
/* ７．クエリストリングを利用して、以下の処理を実現してください。
　スーパーのレジでレシートを作る仕組みを作成します。
　クエリストリングで総額・個数・商品種別を受け取って処理します。

　①商品種別は、３つ。１：雑貨、２：生鮮食品、３：その他
　　まずは、この商品種別を表示してください。

　②総額と個数から１個当たりの値段を算出してください。
　　総額と１個当たりの値段を表示してください。

　③3000円以上購入で4%、5000円以上購入で5%のポイントが付きます。
　　購入額に応じたポイントの表示を行ってください。 */

$zakka_type = $_GET["zakka_type"];
$zakka_total = $_GET["zakka_total"];
$zakka_count = $_GET["zakka_count"];

$seisen_type = $_GET["seisen_type"];
$seisen_total = $_GET["seisen_total"];
$seisen_count = $_GET["seisen_count"];

$other_type = $_GET["other_type"];
$other_total = $_GET["other_total"];
$other_count = $_GET["other_count"];

// 一個あたりの値段　=　総額　/　個数
$zakka_each = $zakka_total / $zakka_count;
$seisen_each = $seisen_total / $seisen_count;
$other_each = $other_total / $other_count;

 echo /*"1:雑貨"*/"$zakka_type"."<br>";
 echo "総額"."$zakka_total"."円"."<br>";
 echo "個数"."$zakka_count"."個"."<br>";
 echo "１個あたりの値段："."$zakka_each"."円"."<br>"."<br>";

 echo /*"2.生鮮食品"*/"$seisen_type"."<br>";
 echo "総額"."$seisen_total"."円"."<br>";
 echo "個数"."$seisen_count"."個"."<br>";
 echo "１個あたりの値段："."$seisen_each"."円"."<br>"."<br>";

 echo /*"3.その他"*/"$other_type"."<br>";
 echo "総額"."$other_total"."円"."<br>";
 echo "個数"."$other_count"."個"."<br>";
 echo "１個あたりの値段："."$other_each"."円"."<br>"."<br>";

 //購入金額
 $all = $zakka_total + $seisen_total + $other_total;

 if ($all >= 5000) {
   echo "$all" * 0.05."ポイント";
 }else{
   if($all >= 3000){
   echo "$all" * 0.04."ポイント";
   }
 }

/* http://localhost/kisogakushu/challenge1/challenge1_ouyou1.php?zakka_type=1:雑貨&seisen_type=2.生鮮食品&other_type=3.その他&zakka_total=2000&seisen_total=3000&other_total=4000&zakka_count=5&seisen_count=5&other_count=5
と入力してみた。 */

 ?>
