<?php
/*課題
7.データベースアクセス系の処理をdbaccesUtil.phpに切り離しなさい。
8.insert_result.phpにて、SQLを実行した結果正しくデータが格納できたのかどうかを判定していない。これを判定し、「データの挿入に失敗しました:[SQLのエラー文]」となるように修正しなさい。（ヒント:new PDO()を行う時点から工夫する必要がある。シチュエーション:デフォルトでPHPとしてのエラーは吐かれるが、その後の処理が中止されてしまうので、もしその後に「トップへ戻る」などのリンクを吐く処理を記述していた場合実行されなくなってしまう)
*/

//DBへの接続用を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','nakamura','phlox');
        return $pdo;
    } catch (PDOException $e) {
        die('接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
    }
}

/*課題7 以下切り離しました*/
session_start();
$name = $_SESSION['name'];
$birthday = $_SESSION['birthday'];
$type = $_SESSION['type'];
$tell = $_SESSION['tell'];
$comment = $_SESSION['comment'];

//db接続を確立
$insert_db = connect2MySQL();

//DBに全項目のある1レコードを登録するSQL
$insert_sql = "INSERT INTO user_t(name,birthday,tell,type,comment,newDate)"
        . "VALUES(:name,:birthday,:tell,:type,:comment,:newDate)";

//クエリとして用意
$insert_query = $insert_db->prepare($insert_sql);

$date = date("Y/m/d H-i-s");//課題6で追加しました。

//SQL文にセッションから受け取った値＆現在時をバインド
$insert_query->bindValue(':name',$name);
$insert_query->bindValue(':birthday',$birthday);
$insert_query->bindValue(':tell',$tell);
$insert_query->bindValue(':type',$type);
$insert_query->bindValue(':comment',$comment);
$insert_query->bindValue(':newDate',$date);//課題6 $dateに変えました。

//SQLを実行
/*↓課題8で追加しました。↓
try{}catch(PDOException $er){
      echo 'データの挿入に失敗しました。次記のエラーにより処理を中断します:'.$er->getMessage();
      echo "<br><br>";
      echo return_top();
    }*/
try{
$insert_query->execute();
}catch (PDOException $er){
  echo 'データの挿入に失敗しました。次記のエラーにより処理を中断します:'.$er->getMessage();
  echo "<br><br>";
  echo return_top();
}

//接続オブジェクトを初期化することでDB接続を切断
$insert_db=null;
?>
