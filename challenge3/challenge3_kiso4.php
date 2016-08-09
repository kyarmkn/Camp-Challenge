<?php
//課題4:課題1で定義した関数に追記する形として、戻り値　true(bool値)　を返却するように修正し、関数の呼び出し側でtrueを受け取れたら「この処理は正しく実行できました」、そうでないなら「正しく実行できませんでした」と表示する
function my_profile(){
	echo "私の名前は中村彩夏です。<br>";
	echo "好きな季節は冬<br>";
	echo "趣味はイラストを描くことと散歩です。<br>";
  return true;
}

$result = my_profile();
if($result = true){
  echo "この処理は正しく実行できました";
}else{
  echo "正しく実行できませんでした";
}
?>
