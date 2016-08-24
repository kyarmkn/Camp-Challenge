<?php
//課題5:戻り値としてある人物のid(数値),名前,生年月日、住所を返却し、受け取った後は全情報を表示する
function profile(){
	$id=139005;
  $name="NAME";
  $birthday="07"."22";
  $adress="NERIMA";
	return array($id,$name,$birthday,$adress);
}

$result = profile();
foreach($result as $value){
	echo "$value <br>";
}

?>
