<?php
// セッション開始
session_start();

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
// index.php　から受け取る
$title = $_POST['title'];
$genre = $_POST['genre'];
$url = $_POST['url'];
$story = $_POST['story'];
$cast = $_POST['cast'];
$bookmark = $_POST['bookmark'];
// セッションのユーザー名を利用
$user_name =  $_SESSION['customer']['name'];



//2. DB接続します fopen　　$PDOはファイルポインタ
try {
    //ID:'root', Password: 'root'
    $pdo = new PDO('mysql:dbname=takeshi_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成  fwrite
// 1. SQL文を用意　　$stmtにデータの枠をセット  「:name」などnameの仮変数を定義する　ハッキング防止のため
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id,title, genre,url,story,cast,bookmark,user_name,date) VALUES (NULL, :title, :genre,:url,:story,:cast,:bookmark,:user_name,sysdate())");
//  2. バインド変数を用意　:nameの値を枠に書き込む
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':story', $story, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cast', $cast, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookmark', $bookmark, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後 実行結果のエラー処理
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("ErrorMessage:".$error[2]);
} else {
    // 
    //５．index.phpへリダイレクト（戻る）
    header('Location: list.php');
}