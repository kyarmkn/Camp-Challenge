<?php
 /*1～6までのステップを踏んで、「DBからデータを取得、取得したデータを表示できる、2種類のクラス」を作成してください。期限:4日

　１．DBに人の情報を入れたテーブルを作成してください。 k
　２．DBに駅の情報を入れたテーブルを作成してください。 k
　３．baseという抽象クラスを作成し、以下を実装してください。
　　・loadというprotectedな関数を用意してください。
　　・showという公開関数を用意してください。
　４．３で作成した抽象クラスを継承して、以下のクラスを作成してください。
　　・人の情報を扱うHumanクラス
　　・駅の情報を扱うStationクラス
　　また、各クラスに隠匿変数でtableという変数を用意し、各クラスの初期化処理で
　　table変数にテーブル名を設定してください。
　５．load関数でDBから全情報を取得するように各クラスの関数を実装してください。
　　その際、table変数を利用して、データを取得するようにしてください。
　６．show関数で各テーブルの情報の一覧が表示されるようにしてください。
*/


 abstract class base{
          abstract protected function load();
          public function show(){
            echo $this -> load();
          }
}

          class Human extends base{
            private $table = '';
            function __construct($t){
              $this -> table = $t;
            }
            function load(){
              try{
              $pdo= new PDO('mysql:host=localhost;dbname=challenge9;charset=utf8','nakamura','phlox');
              }catch(PDOException $Exception){
               	die('接続に失敗しました:'.$Exception->getMessage());
              }

              $sql = "select*from $this->table";
              $query = $pdo -> prepare($sql);
              $query -> execute();
              $result = $query -> fetchall(PDO::FETCH_ASSOC);
              var_dump($result);
            }
         }

        class Station extends base{
            private $table = '';
            function __construct($t){
              $this -> table = $t;
            }
            function load(){
              try{
                $pdo = new PDO('mysql:host=localhost;dbname=challenge9;charset=utf8','nakamura','phlox');
              }catch(PDOException $Exception){
      	         die('接続に失敗しました:'.$Exception->getMessage());
               }
               $sql = "select * from $this->table" ;
               $query = $pdo -> prepare($sql);
               $query -> execute();
               $result = $query -> fetchall(PDO::FETCH_ASSOC);
               var_dump($result);
             }
        }

 $h=new Human('human');
 $s=new Station('station');

 $h->load();
 $s->load();
 ?>
