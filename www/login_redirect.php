<?php
	session_start();                                  //запускаем сессию
	require_once __DIR__ . "/../auth_config.php";     //параметры авторизации
	require_once __DIR__ . "/../vendor/autoload.php"; //загружаем классы
	use App\User;
	//авторизация на сессиях
	if(isset($_SESSION['email'])) {
		//если в сессии есть запись email
		//то переадресуем на главную
		header('Location: /');
	} else {
		//создаем юзера
		$user = new User($auth_config);
		//переадресуем на profile.mfcoin
		//после того как пользователь вернется,
		//он будет направлен на www/callback.php
		$user->oauthRedirect();
		exit();
	}
	