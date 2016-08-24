 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="UTF-8">
   <title>課題5の7</title>
 </head>
 <body>

   <?php
   /*７．以下の機能を実装してください。

   　　　名前・性別・趣味を入力するページを作成してください。
   　　　また、入力された名前・性別・趣味を記憶し、次にアクセスした際に
   　　　記録されたデータを初期値として表示してください。
   　　　
   　　　※PHPと同時に、HTMLの知識が必要になります。
   　　　※入力フィールドの使い方を調べてみましょう。
  */
     $name = $_COOKIE['Name'];
     $gend = $_COOKIE['Gender'];
     $hobby = $_COOKIE['Hobby'];

     ?>


   <form action="challenge5_7_1.php" method="post">
     名前:<input type="text" name="txtName" value="<?php if(isset($_COOKIE['Name'])){echo $_COOKIE['Name'];}?>"><br>
     性別:
     男性<input type="radio" name="rdogd" value="男性"  "<?php if(isset($_COOKIE['Gender']) && $_COOKIE['Gender'] == "男性"){ echo 'checked'; }?>">
     女性<input type="radio" name="rdogd" value="女性"  "<?php if(isset($_COOKIE['Gender']) && $_COOKIE['Gender'] == "女性"){ echo 'checked'; }?>"><br><br>
     趣味:<br>
     <textarea name="hobby" cols="30" rows="5"><?php if (null !== $_COOKIE['Hobby']) {echo $hobby = $_COOKIE['Hobby'];}?></textarea>
     <input type="submit" name="btnSubmit">
   </form>

 </body>
 </html>
