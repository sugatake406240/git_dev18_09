<?php

// ここに関数を記載する　エラー文字列をガードする
require_once('funcs.php');


$user = "root";
$pass = "root";
try {
    if (empty($_GET['id'])) throw new Exception('ID不正');
    $id = (int) $_GET['id'];
    $dbh = new PDO('mysql:host=localhost;dbname=takeshi_db;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM  gs_bm_table WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
} catch (Exception $e) {
    echo "エラー発生: " . h($e->getMessage()) . "<br>";
    die();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>変更フォーム</title>
</head>
<body>
NetFlixドラマ修正<br>

<!-- update.phpで更新 -->
<form method="post" action="update.php">
タイトル名：　<input type="text" name="title" value="<?php echo h($result['title']); ?>"><br>
ジャンル：　<input type="text" name="genre" value="<?php echo h($result['genre']); ?>"><br>
ＵＲＬ：　<textarea name="url" cols="40" rows="2" maxlength="150"><?php echo h($result['url']); ?></textarea><br>
あらすじ：　<textarea name="story" cols="40" rows="6" maxlength="400"><?php echo h($result['story']); ?></textarea><br>
キャスト：　<textarea name="cast" cols="40" rows="2" maxlength="150"><?php echo h($result['cast']); ?></textarea><br>
お気に入り：
<select name="bookmark">
<option value="">選択してください。</option>
<option value="　" <?php if ($result['bookmark'] =='　') echo "selected" ?>>　</option>
<option value="★" <?php if ($result['bookmark'] =='★') echo "selected" ?>>★</option>
</select>
<br> 

<input type="hidden" name="id" value="<?php echo h($result['id']); ?>">
<input type="submit" value="送信"><br>
<!-- submitでlist.phpを実行 -->
<a href='list.php'>トップページへ戻る</a>
</form>
</body>
</html>