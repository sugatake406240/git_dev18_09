<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>NETFLIXデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><h1>NETFLIX　データ登録画面</h1></div>

    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<?php session_start();  ?>

<div style="font-size: 2rem;">
<a href='list.php'>トップページへ戻る</a>
</div>
<!-- ｆｏｒｍ入力後　insert.phpを実行 -->
<form method="POST" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <!-- <legend>NetFlixドラマ　詳細データ</legend> -->
     <label>タイトル：<input type="text" name="title"></label><br>
     <label>ジャンル：<input type="text" name="genre"></label><br>
     ＵＲＬ：<br>
     <label><textArea name="url" rows="4" cols="40"></textArea></label><br>
     あらすじ：<br>
     <label><textArea name="story" rows="4" cols="40"></textArea></label><br>
     キャスト：<br>
     <label><textArea name="cast" rows="4" cols="40"></textArea></label><br>
     <label>お気に入り：<input type="text" name="bookmark"></label><br>
     <input type="hidden" name="user_name" >
     <input type="submit" value="送信">
    </fieldset>
 
  </div>
</form>


<!-- Main[End] -->


</body>
</html>
