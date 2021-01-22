<!DOCTYPE html>

<html lang="ja">

<head>
<meta charset="UTF-8">
<title>NETFLIXドラマ一覧</title>
<!-- <link rel="stylesheet" href="css/reset.css"> -->
<link rel="stylesheet" href="css/style.css">
</head>


<body>

<?php 
    session_start();

    if(!isset($_SESSION['customer'])){
        redirect("menu.php");
    }


    if($_SESSION['customer']['kanri_flg']==1){
        echo '<div style="font-size:25px; font-weight:bold;">',$_SESSION['customer']['name'],'さんは管理者です</div>';
    }else{
        echo '<div style="font-size:25px; font-weight:bold;">',$_SESSION['customer']['name'],'さんは一般ユーザーです</div>';
    }
?>

    <div style="height:60px; font-size: 2rem;">
    <a href="login-gamen.php">ログイン</a>
    <a href="logout-gamen.php">ログアウト</a>
    <a href="kanri-syori.php">会員登録</a>
    <hr>
    </div>

    <div class="main_visual">
        <h1>NETFLIXドラマ一覧</h1>
    </div>

<a href="add.php" style="  font-size: 2rem;" >ドラマの新規登録</a>

<div class="" >
<?php
require_once('funcs.php');

$user = "root";
$pass = "root";
try {
    // DB接続
    $dbh = new PDO('mysql:dbname=takeshi_db;charset=utf8;host=localhost', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //テーブルgs_bm_tableの値をすべて抜き出して$sqlにセット＝SQLの準備 
    $sql = "SELECT * FROM gs_bm_table";
    // $sqlに問い合わせをして、$stmtに格納＝SQLの実行
    $stmt = $dbh->query($sql);
    // fetchallで配列としてすべてを取り出し、$resultに格納
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
} catch (Exception $e) {
    echo "エラー発生: " . h($e->getMessage()) . "<br>";
    die();
}

?>


<table border="1" class="tablesorter" id="myTable">
    <thead>
        <tr>
        <th class="title t_border_h">NO</th><th class="title t_border_h">タイトル</th> <th class="t_border_h">ジャンル</th> <th class="t_border_h">お気に入り</th> <th class="t_border_h">登録者</th>
        </tr>
    </thead>

    <tbody id="data_reflesh" >
        <?php

            //$resultを１行づつ、$rowに代入される 
            foreach ($result as $row) {

                if($_SESSION['customer']['kanri_flg']==1 || $row['user_name']==$_SESSION['customer']['name']){
                echo "<tr>\n";
                // "を文字列にするには「￥"」=「\"」と記載
                echo "<td class=\"title\" >".h($row['id'])."</td>";
                echo "<td class=\"title\" >". "<a href=".h($row['url']).">".htmlspecialchars($row['title'],ENT_QUOTES,'UTF-8')."</a> </td>\n";
                echo "<td class=\"title\" >".h($row['genre'])."</td>";
                echo "<td class=\"title\" >".h($row['bookmark'])."</td>";
                echo "<td class=\"title\" >".h($row['user_name'])."</td>";
                echo "<td>\n";               
                echo "<a href=detail.php?id=" . h($row['id']) . ">詳細</a>\n";
                echo "｜<a href=edit.php?id=" . h($row['id']) . ">変更</a>\n";
                echo "｜<a href=delete.php?id=" . h($row['id']) . ">削除</a>\n";
                echo "</td>\n";
                echo "</tr>\n";
                }

            }

        ?>
    </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>