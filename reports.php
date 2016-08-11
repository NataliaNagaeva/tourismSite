<?php
	session_start();
	include('config.php');
	
	$userLogin = isset($_SESSION['user']) ? $_SESSION['user'] : false;
	
	$name = isset($_GET['name']) ? $_GET['name'] : false;
	$email = isset($_GET['email']) ? $_GET['email'] : false;
	$comment = isset($_GET['comment']) ? $_GET['comment'] : false;
	$error = isset($_GET['err']) ? $_GET['err'] : false;
	
	$mysqli = mysqli_connect($host, $db_user, $db_pass, $db_name);
	
	if (mysqli_connect_errno($mysqli)) {
		echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
	}
	
	$result = $mysqli->query("SELECT `id` FROM `comments`");
	$page_count = ceil(($result->num_rows)/$cmt_count);
	
	$current_page = isset($_GET['cur_pg']) ? $_GET['cur_pg'] : 1;
	
	$result = $mysqli->query("SELECT * FROM `comments` LIMIT ".($cmt_count * ($current_page - 1)) . ", $cmt_count");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Отзывы о нас</title>
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
				<h2 class = "main-title purple-text">Отзывы о нас</h2>
				
				<div class = "comments">
					<?
						while ($row = $result->fetch_assoc()) { ?>
					
						<div class = "comment">
							<div class = "top">
								<div class = "name">
									<?= $row['name']; ?>
								</div>
								<div class = "rep-date">
									<?= $row['date']; ?>
								</div>
							</div>
							<div class = "text">
								<?= $row['comment']; ?>
							</div>
						</div>
					<? } ?>
						
					<div class = "pagination purple-text">
						<? 
							if ($current_page > 1){ ?>
								<a href = "reports.php?cur_pg=<?= ($current_page - 1) ?>">&#9668;</a>
						<? } ?>
						
						<? 
							$start = $current_page;
							if($current_page + $cnt_ref > $page_count){
								$start = $page_count - $cnt_ref + 1;
							}
							
							$start = ($start <= 0) ? 1 : $start;
							$finish = $start + $cnt_ref;
							if($finish > $page_count){
								$finish = $page_count + 1;
								
							}
							
							for ($i = $start; $i < $finish; $i++){ ?>
							<a href = "reports.php?cur_pg=<?= $i ?>" <?= $i == $current_page ? "class='bordered'" : "" ?>><?= $i ?></a>
						<? } ?>
						<? 
							if ($current_page < $page_count){ ?>
								<a href = "reports.php?cur_pg=<?= ($current_page + 1) ?>">&#9658;</a>
						<? } ?>
					</div>
				</div>
				<? if ($userLogin) {?>
				<form id = "report-form" method="POST" action="addReport.php">
					<div class = "row">
						<div class = "cell mid-align">Имя <span class="purple-text">*</span></div>
						<div class = "cell  rcell">
							<input type = "text" name = "name" <?=$error == 1 ? "class=red" : "" ?> value = <?=$name ? $name : "" ?>>
						</div>
					</div>
					<div class = "row">
						<div class = "cell mid-align">Email</div>
						<div class = "cell  rcell"> 
							<input type = "text" name = "email" value = <?=$email ? $email : "" ?>>
						</div>
					</div>
					<div class = "row">
						<div class = "cell mid-align">Содержание <span class = "purple-text">*</span></div>
						<div class = "cell rcell">
							<textarea name='comment' rows = '14' <?=$error == 1 ? "class=red" : "" ?> ><?=$comment ? $comment : "" ?></textarea>
						</div>
					</div>
					<div class = "row bot-align">
						<div class = "cell">Подтверждение изображения <span class = "purple-text">*</span></div>
						<div class = "cell rcell">
							<div class="g-recaptcha" data-sitekey="6Lf7DCQTAAAAAJ8INc9m1y19u81JX3Ev86kWKxRG"></div>
						</div>
					</div>
					<div class = "row">
						<div class = "cell">
							<input type = "submit" value = "Оставить отзыв">
						</div>
					</div>
				</form>
				<? } ?>
			</div>
			<? if($error) {?> <script> alert("Не все обязательные поля заполнены!") </script> <? } ?>
		</div>
	</body>
</html>
<? $mysqli->close(); ?>