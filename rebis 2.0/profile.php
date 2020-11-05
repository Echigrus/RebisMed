<?php
	session_start();
	if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
		header("Location: http://f90443p8.beget.tech/signin.php");
		exit;
	}
	else {
		require 'connect.php';
		$sql = "SELECT rights FROM users WHERE id = :id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':id', $_SESSION['user_id']);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($result['rights']==1){
			$rights = true;
			$sql = "SELECT * FROM orders";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
		}else{
			$rights = false;
			$sql = "SELECT * FROM orders WHERE user_id = :id";
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':id', $_SESSION['user_id']);
			$stmt->execute();
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Rebis: Профиль</title>
		<link rel="stylesheet" href="styles.css">
		<!-- Bootstrap core CSS -->
		<link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon -->
		<link rel="icon" href="img/rebis_icon.svg">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
				
		<script src="https://getbootstrap.com/docs/4.5/dist/js/bootstrap.bundle.min.js"></script>
	</head>
	<body class="d-flex flex-column h-100">
		<header>
			<!-- Fixed navbar -->
			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
				<div class="container">
					<a class="navbar-brand" href="index.php">
						<img src="img/rebis_logo.svg" height="40" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="index.php">Главная</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="catDrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Категории</a>
								<div class="dropdown-menu" aria-labelledby="catDrop">
									<a class="dropdown-item" href="#">Категория 1</a>
									<a class="dropdown-item" href="#">Категория 2</a>
									<a class="dropdown-item" href="#">Категория 3</a>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="contacts.php">Контакты</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="cart.php">Корзина</a>
							</li>
						</ul>
						<form class="form-inline my-2 my-md-0">
							<input class="form-control mr-sm-2" type="text" placeholder="Найти..." aria-label="Найти...">
						</form>
						<form class="form-inline my-2 my-md-0">
							<?php
								session_start();
								if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
									echo '<a role="button" class="btn btn-outline-success my-2 my-sm-0" href="signin.php">Войти</a>';
								}
								else {
									echo '<div class="btn-group">';
									echo '<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Профиль</button>';
									echo '<div class="dropdown-menu">
										<a class="dropdown-item" href="profile.php">Заказы</a>
										<a class="dropdown-item" href="logout.php">Выход</a>
									</div>';
									echo '</div></form>';
								}
							?>
						</form>
					</div>
				</div>
			</nav>
		</header>
		<!-- Page content -->
		<main role="main" class="flex-shrink-0">
			<div class="container">
				<h3 class="mt-5 inline">Добро пожаловать, 
					<?php 
						echo $_SESSION['user_name'].'!<span class="sr-only">(current)</span>';
						if($rights){
							echo "<span class='badge badge-danger mx-4'>Администратор</span></h3>";
						} else{ 
							echo "<span class='badge badge-primary mx-4'>Пользователь</span></h3>";
						}
					?>
				<h4 class="mt-3">
					<?php 
						if($rights){
							echo "Все";
						} else {
							echo "Ваши";
						}
					?>
					заказы:</h4>
				<?php
					if($result = $stmt->fetch(PDO::FETCH_ASSOC)){
						echo "<ul class='list-group my-3'>";
						$i = 0;
						do {
							echo "<li class='list-group-item'>";
							echo "ID заказа: " . $result['order_id'] . ", ID клиента: " . $result['user_id'] . ", Дата/время: " . date('Y-m-d H:i:s', strtotime($result['timestamp'])) . ", стоимость: " . $result['price']; 
							echo "</li>";
						} while ($result = $stmt->fetch(PDO::FETCH_ASSOC));
						echo "</ul>";
					}
					else {
						echo "<h4 class='mt-3'>Не найдено заказов</h4>";
					}
				?>
			</div>	
		</main>
		<footer class="footer mt-auto py-3">
			<div class="container text-center">
				<span class="text-muted">© 2020 Pepegas & Co.</span>
			</div>
		</footer>
	</body>
</html>