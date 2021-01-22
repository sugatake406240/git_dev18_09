<!-- セッション -->
<?php session_start(); ?>

<!-- 外部コード　読み込み -->
<?php require 'funcs.php'; ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>


<?php
// 前回セッション　クリア
unset($_SESSION['customer']);

// DB接続 gs_db
$pdo=new PDO('mysql:host=localhost;dbname=takeshi_db;charset=utf8', 
	'root', 'root');

// SQL文　セット gs_user_tableの検索をする文を生成
$sql=$pdo->prepare('select * from gs_user_table where lid=?');

// echo $_REQUEST['lpw'];
// echo '<br>';
// echo $hash;
// echo '<br>';

$sql->execute([$_REQUEST['lid']]);

// パスワード　一致フラグ初期化
$chk=0;

foreach ($sql as $row) {
	if(password_verify($_REQUEST['lpw'], $row['lpw'])){
	//パスワード一致 
	$chk=1;

	$_SESSION['customer']=[
		'id'=>$row['id'], 'name'=>$row['name'], 
		'lid'=>$row['lid'],'lpw'=>$row['lpw'], 
		'kanri_flg'=>$row['kanri_flg'], 
		'life_flg'=>$row['life_flg']
	];
	}

}
if (isset($_SESSION['customer']) && $chk==1 ) {
	redirect("list.php");

	// echo 'いらっしゃいませ、', $_SESSION['customer']['name'], 'さん。';
} else {
	echo 'ログイン名またはパスワードが違います。';
}
?>
<?php require 'footer.php'; ?>
