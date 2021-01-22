<?php 
 require './header.php';

 if(!isset($_SESSION)){
    session_start();
    }

if(isset($_SESSION['customer'])) {
    echo '<a style="padding:0px 2px;" href="list.php">　番組一覧　</a>';
    echo '<a style="padding:0px 2px;" href="login-gamen.php">　ログイン　</a>';
    echo '<a style="padding:0px 2px;" href="logout-gamen.php">　ログアウト　</a>';
    echo '<a style="padding:0px 2px;" href="kanri-syori.php">　会員登録　</a>';
    echo '<hr><br>';
}else{
    
    echo '<a style="padding:0px 2px;" href="login-gamen.php">ログイン</a>';
    echo '<a style="padding:0px 2px;" href="logout-gamen.php">ログアウト</a>';
    echo '<a style="padding:0px 2px;" href="kanri-syori.php">会員登録</a>';
    echo '<hr>';
    echo '！！！　ログインまたは会員登録をしてください　！！！';
    echo '<br>';
     
}



?>