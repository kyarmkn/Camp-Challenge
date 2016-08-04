<?php
//課題6:名前による検索プログラムを実装する。3人分のプロフィール(項目は課題5参照)をあらかじめ定義しておく。引き数にそれらのプロフィールと文字列をとり、戻り値は1人分のプロフィール情報を返却する。引き数の文字が名前に含まれる(部分一致)プロフィール情報(複数名合致する場合は最初のプロフィールとする)を戻り値として返却する。それ以降などは課題5と同じ扱いに
function profile($profile){
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


if ($profile == "佐藤"){
   return $arr1;
 }elseif ($profile == "鈴木") {
   return $arr2;
 }elseif ($profile == "高橋") {
   return $arr3;
  }
}
$result = profile("高橋");

foreach ($result as $key => $value) {
  echo $value;
}

//あとでもう一回考え直します！

?>
