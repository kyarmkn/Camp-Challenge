<?php
 /*3．以下の機能を持つクラスを作成してください。
　　　・パブリックな２つの変数
　　　・２つの変数に値を設定するパブリックな関数
　　　・２つの変数の中身をechoするパブリックな関数*/
 class human{
      public $name;
      public $age;
      public function birth($n,$a){
              $this -> name = $n;
              $this -> age  = $a;
      }
        public function showName(){
                return $this -> name;
              }
        public function showAge(){
                return $this -> age;
              }
 }

 $nakamura = new human();
 $nakamura -> birth('中村',22);

 echo $nakamura -> showName();


 /*4．3のクラスを継承し、以下の機能を持つクラスを作成してください。
　　　・２つの変数の中身をクリアするパブリックな関数*/

class female extends human{
      public function setFemale($n,$a){
             $this -> name = $n;
             $this -> age  = $a;
           }
           public function showName(){
             return $this -> name;
           }
           public function showAge(){
             return $this -> age;
           }
}

$tanaka = new female();
$tanaka -> setFemale('田中',23);
echo $tanaka -> showName();
 ?>
