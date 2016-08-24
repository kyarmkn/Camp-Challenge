<HTML>
   <head>
   </head>
     <meta charset="UTF-8">
   <body>
     <form enctype="multipart/form-data" action="challenge5_6.php" method="post">
ファイル選択：<input name="userfile" type="file" />
         <input type="submit">
      </form>


<?php
/*６．５で作成したプログラムに、ファイルの中身を読み込んで表示する機能を追加してください。*/

$file_name = 'upload.txt';

move_uploaded_file( $_FILES['userfile']['tmp_name'], $file_name);

$file = file_get_contents('upload.txt');
echo $file
 ?>


 </b\\ody>
 </HTML>
