<?php
function my_profile(){
	echo "私の名前は中村彩夏です。<br>";
	echo "好きな季節は冬<br>";
	echo "趣味はイラストを描くことと散歩です。<br>";
}

function number($num){
	if($num%2 == 0){
		echo "偶数です。";
	}else{
		echo "奇数です。";
    }
}
?>
