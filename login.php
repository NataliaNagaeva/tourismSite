<?php 
	session_start();
	include('config.php');
	$userLogin = isset($_SESSION['user']) ? $_SESSION['user'] : false;
	
	if (isset($_SESSION['user'])){
		header('Location: reports.php');
		return;
	}
	else {
		if (isset($_POST['login']) && isset($_POST['pass'])){
			$login = $_POST['login'];
			$pass = $_POST['pass'];
			
			$mysqli = mysqli_connect($host, $db_user, $db_pass, $db_name);
	
			if (mysqli_connect_errno($mysqli)) {
				echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
			}
			
			$res = $mysqli->query("SELECT * FROM `users` WHERE `login`= '$login' AND `pass`= '".md5($pass)."'");
			
			if ($res->num_rows == 1){
				$row = $res->fetch_assoc();
				$_SESSION['user'] = $row['login'];
				header('Location: reports.php');
				return;
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Вход на сайт</title>
		<meta charset="utf-8"/>
		<link href = "css\main.css" rel = "stylesheet">
		<link href = "css\style.css" rel = "stylesheet">
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body>
		<div class="container">
			<header>
				<div class="big-logo">
					<img src="img/main-logo.png"/>
					ТУРИЗМ
				</div>
			<nav>
					<ul class = "dropdown-menu">
						<li><a href="index.php">Главная</a></li>
						<li><a href="gallery.php">Галерея</a></li>
						<li><a href="history.php">История</a></li>
						<li><a href="contacts.php">Контакты</a></li>
						<li><a href="reports.php">Отзывы</a></li>
						<li>Контакты2
								<ul class = "dropdown">
									<li>Main </li>
									<li>About </li>
									<li>Contact </li>
									<li>Other </li>
								</ul>
						</li>
						<li class = "nav-last-child">
							<a href = <?= $userLogin ? 'logout.php' : 'login.php' ?>>
								<?=  $userLogin ? "Выход " . $userLogin : "Вход" ?> 
							</a>
						</li>
					</ul>
				</nav>
				<div class="cap"></div>
			</header>
			
			<div class="content">
				<h2 class = "main-title purple-text">Вход на сайт</h2>
				<form id="login-form" method="POST">
					<label class="purple-text">
						Логин 
						<input type="text" name="login"/>
					</label>
					<label class="purple-text">
						Пароль 
						<input type="password" name="pass"/>
					</label>
					<input type="submit" value="Войти"/>
				</form>
			</div>
	</body>
</html>