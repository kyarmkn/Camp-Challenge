<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>challenge4_12</title>
</head>
<body>
    <?php
    /*「坊ちゃん」の文章を、「。」の位置で改行して表示する。
    元の文章の12行目までに対し処理するように
    デモのように、最初に「元の文章」と、後に「変更後の文章」を表示すること*/

    $bocchan_texts = array();
    $read_line = 12;
    $count = 0;
    $figure = '。';
    $exchange_figure = '。<br>';
    $changed_text = array();

    $bocchan_fp = fopen('4_12_bocchan.txt','r');

    for($i=0;$i<$read_line;++$i){
        $bocchan_texts[$i]=fgets($bocchan_fp);
        $count += mb_strlen($bocchan_texts[$i]);
    }

    echo '元の文章'.'<br>';
    $text = file_get_contents('4_12_bocchan.txt');
    echo $text.'<br>';
    echo '<br>'.'これを「'.$figure.'」で改行すると...<br><br><br>';

    $changed_text = bocchan_exchange($bocchan_texts,$exchange_figure);

    foreach ($changed_text as $key => $changed_line){
        /*echo ($key+1).'行目:';*/
        echo $changed_line.'<br>';
    }

    echo '<br>となります。<br>';


    function bocchan_exchange($texts,$exfig){
        global $figure;
        $ex_texts = array();

        foreach ($texts as $line_num => $text_line){
            $ex_texts[$line_num] = str_replace($figure, $exfig, $text_line);
        }

        return $ex_texts;
    }

    ?>
</body>
</html>
