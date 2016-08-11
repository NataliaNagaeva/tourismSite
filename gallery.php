<?php
	session_start();
	$userLogin = isset($_SESSION['user']) ? $_SESSION['user'] : false;
 ?>
 
<!DOCTYPE html>
<html>
	<head>
		<title>Главная</title>
		<meta charset="utf-8"/>
		<link href = "css\main.css" rel = "stylesheet">
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
			
			<div class="gallery">
				<div class="tRow">
					<div class="photo">
						<div class="galImg">
							<img src="img/gal1.jpg" />
						</div>
						<div>
							Машинка едет путешествовать
						</div>
					</div>
					<div class="photo">
						<div class="galImg">
							<img src="img/gal2.jpg" />
						</div>
						<div>
							Чуваки смотрят на горы
						</div>
					</div>
				</div>
				<div class="tRow">
					<div class="photo">
						<div class="galImg">
							<img src="img/gal3.jpg" />
						</div>
						<div>
							Пять ёлок и озеро
						</div>
					</div>
					<div class="photo">
						<div class="galImg">
							<img src="img/gal4.jpg" />
						</div>
						<div>
							Чуваки фоткаются на фоне гор
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>