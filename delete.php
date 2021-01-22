<?php

// ここに関数を記載する　エラー文字列をガードする
require_once('funcs.php');

$user = "root";
$pass = "root";
try {
    if (empty($_GET['id'])) throw new Exception('ID不正');
    $id = (int) $_GET['id'];
    $dbh = new PDO('mysql:host=localhost;dbname=takeshi_db', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM gs_bm_table WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $dbh = null;
    echo "ID: " . h($id) . "の削除が完了しました。"."<br>";
    // 
    //５．index.phpへリダイレクト（戻る）
    header('Location: list.php');
    // echo "<a href='list.php'>トップページへ戻る</a>";

} catch (Exception $e) {
    echo "エラー発生: " . h($e->getMessage()) . "<br>";
    die();
}