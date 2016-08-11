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
						
			<div class="article">
				<div class="date">
					<?=date("F j, Y, g:i a"); ?>
				</div>
				<div class="textArt">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pretium accumsan vestibulum. Fusce a scelerisque ipsum. Donec luctus mi in felis lobortis tincidunt. Nulla a lectus consectetur, finibus purus ut, dapibus leo. Phasellus vitae imperdiet magna. In convallis eleifend dolor at malesuada. Donec turpis neque, ultricies sed pharetra quis, consectetur vel magna. Pellentesque elementum rutrum nisl, nec pulvinar eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Nunc ullamcorper vestibulum libero ut egestas. Cras ac sapien vel dui eleifend suscipit vitae at dui. Donec varius a nisl at auctor.
				   </p>
				   <p>
						Praesent placerat sodales purus, suscipit pellentesque augue dignissim eu. Fusce rhoncus ante interdum fermentum consequat. Donec luctus sapien ut ligula facilisis, a rhoncus est iaculis. Integer efficitur id dolor vel aliquam. Quisque hendrerit imperdiet lacus sed dictum. Nullam in tellus non elit faucibus malesuada non et tortor. Praesent vehicula, risus in porta molestie, tellus magna tempus sapien, sit amet malesuada urna urna vel neque. Curabitur sollicitudin faucibus mi nec iaculis. Integer mollis suscipit fermentum. Nam nibh risus, luctus eget diam nec, porttitor hendrerit orci. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce iaculis, lorem non mattis facilisis, nisl turpis vehicula mi, sed pulvinar augue velit non nisl. In tincidunt sit amet risus sit amet placerat. Aliquam et urna justo. Nam pulvinar venenatis elit, quis imperdiet magna.
				   </p>
				   <p>
						Nulla eget dictum odio. Nullam porttitor a ipsum vitae tincidunt. Etiam ut eros tristique, ornare nunc id, tristique dolor. Nunc non efficitur libero. Suspendisse a congue tellus. Donec at felis facilisis, tristique nulla eu, fringilla turpis. Cras vitae bibendum nibh. Aliquam dignissim scelerisque efficitur. Morbi ac magna ac quam commodo placerat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer pretium in orci nec mattis. Ut elementum augue leo, at egestas ligula pretium vitae. Proin cursus orci vel finibus luctus. Curabitur lacinia eros eget tortor malesuada sodales. Cras malesuada ipsum id orci dignissim dapibus.
				   </p>
				</div>
			</div>
		</div>
	</body>
</html>