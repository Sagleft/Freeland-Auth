<?php
	session_start();                                  //запускаем сессию
	require_once __DIR__ . "/../auth_config.php";     //параметры авторизации
	require_once __DIR__ . "/../vendor/autoload.php"; //загружаем классы
	use App\User;
	
	function filter($string) {
		//небольшая функция фильтра данных
		$string = strip_tags($string);
		$string = stripslashes($string);
		$string = htmlspecialchars($string);
		return trim($string);
	}
	
	if(isset($_SESSION['email'])) {
		//уже авторизован. отправляем на главную
		header("Location: /"); exit;
	}
	//"создаем пользователя"
	$user = new User($auth_config);
	//получаем токен из callback
	//токен генерируется новый где-то каждые 24 часа
	//вы можете записывать токен в БД, чтобы обновлять
	//данные о пользователе при необходимости
	$data = $user->getToken(filter($_GET['code']));
	//получаем данные пользователя
	$userInfo = $user->getUserInfo($data['access_token']);
	
	//заносим email в сессию
	$_SESSION['email'] = strtolower(filter($UserInfo['email']));
	//занесем в сессию также другие данные, чтобы отобразить их на странице
	//эти данные можно кешировать в БД
	$_SESSION['nick']        = filter($UserInfo['nick']);
	$_SESSION['kyc_status']  = filter($UserInfo['kyc_status']);
	//переадресуем
	header("Location: /"); exit;
	
	/*
		в $userInfo вы получаете ассоциативный массив:
			email - адрес электронной почты пользователя, не меняется;
			status - статус пользователя: resident, citizen или guest;
			title - "наименование статуса", может быть observer...;
			first_name - имя;
			last_name - фамилия;
			nick_name - псевдоним;
			date_of_birth - день рождения, например 1990-03-25;
			language - язык учетной записи, например ru;
			kyc_status - статус KYC - верификации аккаунта, может быть RED или GREEN;
	*/