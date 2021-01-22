<?php

// ここに関数を記載する　エラー文字列をガードする
require_once('funcs.php');


$user = "root";
$pass = "root";
$title = $_POST['title'];
$genre = $_POST['genre'];
$url = $_POST['url'];
$story = $_POST['story'];
$cast = $_POST['cast'];
$bookmark = $_POST['bookmark'];



// $category = (int) $_POST['category'];
// $difficulty = (int) $_POST['difficulty'];
// $budget = (int) $_POST['budget'];
try {
    if (empty($_POST['id'])) throw new Exception('ID不正');
    $id = (int) $_POST['id'];
    $dbh = new PDO('mysql:host=localhost;dbname=takeshi_db', $user,$pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE gs_bm_table SET title = ?, genre = ?, url = ?, story = ?, cast = ? , bookmark = ?, date=sysdate() WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $title, PDO::PARAM_STR);
    $stmt->bindValue(2, $genre, PDO::PARAM_STR);
    $stmt->bindValue(3, $url, PDO::PARAM_STR);
    $stmt->bindValue(4, $story, PDO::PARAM_STR);
    $stmt->bindValue(5, $cast, PDO::PARAM_STR);
    $stmt->bindValue(6, $bookmark, PDO::PARAM_STR);
    $stmt->bindValue(7, $id, PDO::PARAM_INT);
    $stmt->execute();
    $dbh = null;
    echo "ID: " . h($id) . "レシピの更新が完了しました。<br>";
    // 
    //５．index.phpへリダイレクト（戻る）
    header('Location: list.php');
    // echo "<a href='list.php'>トップページへ戻る</a>";
} catch (Exception $e) {
    echo "エラー発生: " . h($e->getMessage()) . "<br>";
    die();
}