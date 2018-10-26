<?php
	session_start(); //запускаем сессию
	if(isset($_SESSION['email'])) {
		//авторизованы
		echo 'Привет, '.$_SESSION['nick']."<br/>Твой KYC-статус: ".$_SESSION['kyc_status'];
		echo '<a href="/logout.php">Выйти из учетной записи</a>';
	} else {
		//не авторизованы
		echo 'Привет, гость. Ты не авторизован.<br/>';
		echo '<a href="/login_redirect.php">Авторизация</a>';
	}
	