<?php 
	session_start();
	include('config.php');
	
	if (!isset($_SESSION['user'])){
		header('Location: login.php');
		return;
	}
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$comment = $_POST['comment'];
	
	$mysqli = mysqli_connect($host, $db_user, $db_pass, $db_name);
	
	$error = false;
	
	if (mysqli_connect_errno($mysqli)) {
		echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
	}
		
	if (isset($name) && isset($comment) && strlen(trim($name)) >= 1 && strlen(trim($comment)) >= 1){
		$url = 'https://www.google.com/recaptcha/api/siteverify?secret=6Lf7DCQTAAAAAPEJueilYHFy27soPBCspM8k9sZO&response='
		.(array_key_exists('g-recaptcha-response', $_POST) ? $_POST["g-recaptcha-response"] : '').'&remoteip='.$_SERVER['REMOTE_ADDR'];
		//$resp = json_decode(file_get_contents($url), true);
		$resp = array();
		$resp['success'] = true;
		if ($resp['success'] == true) {
			$date = date('Y.m.d');
			$name = trim($name);
			$comment = trim($comment);
			
			$mysqli->query("INSERT INTO `comments`(`name`, `comment`, `email`, `date`) VALUES ('$name', '$comment', '$email', '$date')");
		}else{
			$error = 2;
		}
	}else{
		$error = 1;
	}
	
	$result = $mysqli->query("SELECT `id` FROM `comments`");
	$page_count = ceil(($result->num_rows)/$cmt_count);
	
	header('Location: reports.php?cur_pg=' . $page_count . ($error ? "&err=$error&name=$name&email=$email&comment=$comment" : ""));
?>