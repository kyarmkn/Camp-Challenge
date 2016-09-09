<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
if (isset($_GET['search']) && $_GET['search'] == "Sresult") {
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>検索結果画面</title>
</head>
    <body>
        <h1>検索結果</h1>
        <table border=1>
            <tr>
                <th>名前</th>
                <th>生年</th>
                <th>種別</th>
                <th>登録日時</th>
            </tr>
        <?php
        $result = null;
        if(empty($_GET['name']) && empty($_GET['year']) && empty($_GET['type'])){
            $result = serch_all_profiles();
        }else{
            $result = serch_profiles($_GET['name'],$_GET['year'],$_GET['type']);
        }
        foreach($result as $value){
        ?>
            <tr>
              <form action="<?php echo RESULT_DETAIL; ?>" method="GET"><!--追加-->
                <input type="hidden" name="datail"  value="result_detail">
                <td><a href="<?php echo RESULT_DETAIL ?>?id=<?php echo $value['userID']?>"><?php echo $value['name']; ?></a></td>
              </form>
                <td><?php echo $value['birthday']; ?></td>
                <td><?php echo ex_typenum($value['type']); ?></td>
                <td><?php echo date('Y年m月d日　G時i分s秒', strtotime($value['newDate'])); ?></td>
            </tr>

        <?php
        }
      ?>
        </table>
        <?php echo "<br><br>";
        echo return_top();

      }else{//直接アクセスさせないための追加
          echo "不正なアクセスです。";
          echo "<br><br>";
          echo return_top();
        }?>
</body>
</html>
