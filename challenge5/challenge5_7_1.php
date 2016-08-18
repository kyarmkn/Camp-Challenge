<?php
 $name = $_POST["txtName"];
 $gend = $_POST["rdogd"];
 $hobby = $_POST["hobby"];

 if(isset($name)){
   $name = $_POST["txtName"];
 }
 if(isset($gend)){
   $gend = $_POST["rdogd"];
 }
 if(isset($hobby)){
   $hobby = $_POST["hobby"];
 }

 setcookie('Name',$name);
 setcookie('Gender',$gend);
 setcookie('Hobby',$hobby);

 ?>
