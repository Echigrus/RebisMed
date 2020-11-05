<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Rebis: Контакты</title>
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
							<li class="nav-item active">
								<a class="nav-link" href="contacts.php">Контакты <span class="sr-only">(current)</span></a>
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
				<h2 class="mt-5">Наши филиалы:</h2>
				<div class="card-deck my-5">
				  <div class="card">
					<div class="card-body">
					  <h5 class="card-title">Танкистов, 13</h5>
					  <p class="card-text">
						Пн-Пт: 8:00-20:00<br>
						Сб-Вс: 9:00-16:00<br>
						8-800-123-45-67<br>
						<a href="https://yandex.ru/maps/38/volgograd/stops/stop__9916525/">Как доехать</a>
					  </p>
					</div>
					<div class="card-footer">
					  <small class="text-muted">Закрыт</small>
					</div>
				  </div>
				  <div class="card">
					<div class="card-body">
					  <h5 class="card-title">Краснополянская, 42</h5>
					  <p class="card-text">
						Пн-Пт: 8:00-20:00<br>
						Сб-Вс: 9:00-16:00<br>
						8-800-123-45-68<br>
						<a href="https://yandex.ru/maps/38/volgograd/stops/stop__9916298/">Как доехать</a>
					  </p>
					</div>
					<div class="card-footer">
					  <small class="text-muted">Открыт</small>
					</div>
				  </div>
				  <div class="card">
					<div class="card-body">
					  <h5 class="card-title">51-й Гвардейской Дивизии, 47</h5>
					  <p class="card-text">
						Пн-Пт: 8:00-20:00<br>
						Сб-Вс: 9:00-16:00<br>
						8-800-123-45-70<br>
						<a href="https://yandex.ru/maps/38/volgograd/stops/stop__9916467/">Как доехать</a>
					  </p>
					</div>
					<div class="card-footer">
					  <small class="text-muted">Закрыт</small>
					</div>
				  </div>
				</div>
			</div>
		</main>
		<footer class="footer mt-auto py-3">
			<div class="container text-center">
				<span class="text-muted">© 2020 Pepegas & Co.</span>
			</div>
		</footer>
	</body>
</html>