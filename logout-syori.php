<!-- <?php session_start(); ?> -->
<!-- <?php require 'header.php'; ?> -->



<?php

if (isset($_SESSION['customer'])) {
	unset($_SESSION['customer']);
	echo 'ログアウトしました。';
	echo '<br><br><hr><br>';
} else{
	echo '<p style="font-size:25px; font-weight:bold;">すでにログアウトしています。<p>';
	echo '<br><br><hr><br>';

}

require 'menu.php'; 


?>



<?php require 'footer.php'; ?>
