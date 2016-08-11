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
			
			<div class="contact">
				<div class="leftBlock"> 
					<div class="drivingDirections">
						Схема проезда
					</div>
					<div id="map">
					</div>
				</div>
				<div class="rightBlock">
					<h3>Центральный офис TUI</h3>
					<p>
					Телефон:</br>
					+7 (495) 937-66-47 (многоканальный)
					</p>
					<p>
					Факс:</br>
					+7 (495) 937-66-07
					</p>
					<p>
					Круглосуточная экстренная связь </br>
					+7 495 642-60-69.
					</p>
					<p>
					Электронная почта:</br>
					Для туристов: online@tui.ru
					</p>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			var map;
			function initMap() {
			  map = new google.maps.Map(document.getElementById('map'), { 
				center: {lat: 54.201420, lng: 45.173936 },
				zoom: 8
			  });
			}
		</script>
		<script async defer
		  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDj8_GTL9Z17U1NVB9Ad_oL2Jb1QkVlJGg&callback=initMap">
		</script>
	</body>
</html>