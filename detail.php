<!DOCTYPE html>
<html lang="ja">


<head>
<meta charset="UTF-8">
<title>NetFlixドラマ詳細データ</title>
<!-- <link rel="stylesheet" href="css/reset.css"> -->
<link rel="stylesheet" href="css/style.css">
</head>


<body>
<h1>NetFlixドラマ 詳細データ</h1>

<?php
$user = "root";
$pass = "root";
try {
    if (empty($_GET['id'])) throw new Exception('ID不正');
    $id = (int) $_GET['id'];
    $dbh = new PDO('mysql:dbname=takeshi_db;charset=utf8;host=localhost', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM gs_bm_table WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
 
} catch (Exception $e) {
    echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
}
?>

<table border="1">
    <thead>
        <tr>
            <th class="title t_border_h">タイトル</th> <th class="t_border_h">ジャンル</th> <th class="t_border_h">ＵＲＬ</th>  <th class="t_border_h">あらすじ</th>  <th class="t_border_h">キャスト</th> <th class="t_border_h">お気に入り</th> <th class="t_border_h">登録時間</th> 
        </tr>
    </thead>

    <tbody>
        <?php
                echo "<tr>";
            // "を文字列にするには「￥"」=「\"」と記載
                echo "<td class=\"title\" >". "<a href=".htmlspecialchars($result['url'],ENT_QUOTES,'UTF-8').">".htmlspecialchars($result['title'],ENT_QUOTES,'UTF-8')."</a> </td>\n";
                echo "<td>". htmlspecialchars($result['genre'],ENT_QUOTES,'UTF-8') ."</td>";
                echo "<td>". htmlspecialchars($result['url'],ENT_QUOTES,'UTF-8') ."</td>";
                echo "<td>". htmlspecialchars($result['story'],ENT_QUOTES,'UTF-8') ."</td>";
                echo "<td>". nl2br(htmlspecialchars($result['cast'],ENT_QUOTES,'UTF-8')) ."</td>";
                echo "<td>". nl2br(htmlspecialchars($result['bookmark'],ENT_QUOTES,'UTF-8')) ."</td>";
                echo "<td>". nl2br(htmlspecialchars($result['date'],ENT_QUOTES,'UTF-8')) ."</td>";
                echo "</tr>";
            
        ?>
    </tbody>
</table><br>

    <a href='list.php'>トップページへ戻る</a>;

</body>
</html>