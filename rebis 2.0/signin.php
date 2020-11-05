<?php
	session_start();
	if(isset($_SESSION['user_id']) || isset($_SESSION['logged_in'])){
		header("Location: http://f90443p8.beget.tech/profile.php");
		exit;
	}
	require 'connect.php';
	if(isset($_POST['submit'])){
		$username = !empty($_POST['username']) ? trim($_POST['username']) : null;
		$password = !empty($_POST['password']) ? trim($_POST['password']) : null;
		
		$username = stripslashes($username);
		$username = htmlspecialchars($username);
		$password = stripslashes($password);
		$password = htmlspecialchars($password);
		
		$username = trim($username);
		$password = trim($password);
		
		$sql = "SELECT id, username, password, rights FROM users WHERE username = :username";
		$stmt = $pdo->prepare($sql);
		
		$stmt->bindValue(':username', $username);
		
		$stmt->execute();
		
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($user === false){
			$message = "Пользователь с таким логином не найден.";
			echo "<script> alert('$message');</script>";
		} else{
			$validPassword = password_verify($password, $user['password']);
			
			if($validPassword){
				$_SESSION['user_id'] = $user['id'];
				$_SESSION['user_name'] = $user['username'];
				$_SESSION['logged_in'] = time();
				header("Location: http://f90443p8.beget.tech/profile.php");
				exit;
			} else{
				$message = "Неправильный пароль.";
				echo "<script> alert('$message');</script>";
			}
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Rebis: Вход</title>
		<link rel="stylesheet" href="styles.css">
		<!-- Bootstrap core CSS -->
		<link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon -->
		<link rel="icon" href="img/rebis_icon.svg">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>	
		<script src="https://getbootstrap.com/docs/4.5/dist/js/bootstrap.bundle.min.js"></script>
	</head>
	<body>
		<div class="container">
			<form class="form-signin text-center" action="signin.php" method="post">
				<a class="navbar-brand" href="index.php">
					<img src="img/rebis_logo.svg" height="40" alt="">
				</a>
				<img src="img/pepethefrog.png" width="72" height="72">
				<h1 class="h3 mb-3 font-weight-normal">Пожалуйста, войдите</h1>
				<label for="inputUsername" class="sr-only">Логин</label>
				<input name="username" type="text" id="inputUsername" class="form-control my-2" placeholder="Логин" required="" autofocus="" maxlength="25">
				<label for="inputPassword" class="sr-only">Пароль</label>
				<input name="password" type="password" id="inputPassword" class="form-control my-2" placeholder="Пароль" required="" maxlength="60">
				<button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
				<a class="btn btn-lg btn-outline-primary btn-block" role="button" href="signup.php">Регистрация</a>
				<!-- Copyright -->
				<p class="mt-5 mb-3 text-muted">© 2020 Pepegas & Co.</p>
				<!-- Copyright -->
			</form>
		</div>
	</body>
</html>