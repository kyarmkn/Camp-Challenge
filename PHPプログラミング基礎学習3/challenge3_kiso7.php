<?php
//課題7:引き数、戻り値はなしの関数を用意。初期値3のglobal値を2倍していく、ローカルな値はstaticとしてその関数が何回実行されたのかを保持していくような関数である。この関数を20回呼び出す
$global_number = 3;

function kadai7(){
  static $local_number = 1;
  $local_number++;
  global $global_number;
  $global_number*=2;
echo "No.".$local_number."<br>";
echo $global_number."<br>";
}

$num = 0;
do{
	kadai7();
	$num++;
}while($num<20);
?>
