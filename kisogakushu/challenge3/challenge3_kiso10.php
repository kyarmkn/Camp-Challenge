<?php
/* 課題10:課題9の処理のうち2人目まででforeachのループを抜けるようにする */
$arr1 = array(
            'id' => 1601,
            'name' => "佐藤",
            'bd' => "01"."01",
            'ad' => "東京",
             );

$arr2 = array(
            'id' => 1602,
            'name' => "鈴木",
            'bd' => "01"."02",
            'ad' => "大阪",
             );

$arr3 = array(
             'id' => 1603,
             'name' =>"高橋",
             'bd' => "01"."03",
             'ad' => "名古屋",
             );

$array = array($arr1,$arr2,$arr3);

foreach ($array as $key1 => $value) {
  if ($value == $array[2]) {
    continue;
  }
  foreach ($value as $key2 => $value2) {
    if($key2 == 'id' || $key2 == 'ad'){
    continue;
    }
    /*if($key2 == $arr2){
      break;
    }*/
    echo $value2;
  }
}

?>
