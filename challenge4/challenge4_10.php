<?php
/*１０．紹介していないPHPの組み込み関数を利用して、処理を作成してください。
　講義では紹介されていないPHPの組み込み関数はたくさん存在します。
　PHPの公式サイトから関数を選び、実際にロジックを作成してみてください。
　また、この処理を作成するに当たり、下記を必ず実装してください。
　①処理の経過を書き込むログファイルを作成する。
　②処理の開始、終了のタイミングで、ログファイルに開始・終了の書き込みを行う。
　③書き込む内容は、「日時　状況（開始・終了）」の形式で書き込む。
　④最後に、ログファイルを読み込み、その内容を表示してください。*/

$fp = fopen('4_10.txt','w');

$date = date("Y年m月d日 H時i分s秒");
fwrite($fp,$date . "開始\n");
fclose($fp);

$data = array("alfa", "bravo", "charlie");
list($a, $b, $c) = $data;
echo $c;


$fp = fopen('4_10.txt','a');

$date = date("Y年m月d日 H時i分s秒");
fwrite($fp,$date . "終了");
fclose($fp);

$file = file_get_contents('4_10.txt');
echo $file;
 ?>
