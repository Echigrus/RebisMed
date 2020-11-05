<html>
	<head>
		<meta charset="utf-8">
		<title>Rebis: Главная</title>
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
							<li class="nav-item active">
								<a class="nav-link" href="index.php">Главная <span class="sr-only">(current)</span></a>
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
				<h2 class="mt-5">Популярные товары:</h2>
				<div class="card-deck my-4">
					<div class="card">
						<img src="items/nurofen.jpeg" class="card-img-top" alt="Нурофен Экспресс">
						<div class="card-body">
							<h5 class="card-title">Нурофен Экспресс</h5>
							<p class="card-text">Капсулы 200 мг, 24 шт.</p>
							<p class="card-text text-right">309 руб. 
								<a href="#" class="btn btn-primary">Добавить</a>
							</p>
						</div>
					</div>
					<div class="card">
						<img src="items/next.jpeg" class="card-img-top" alt="Некст Уно Экспресс">
						<div class="card-body">
							<h5 class="card-title">Некст Уно Экспресс</h5>
							<p class="card-text">Капсулы 200 мг, 20 шт.</p>
							<p class="card-text text-right">266 руб. 
								<a href="#" class="btn btn-primary">Добавить</a>
							</p>
						</div>
					</div>
					<div class="card">
						<img src="items/pentalgin.jpeg" class="card-img-top" alt="Пенталгин экстра">
						<div class="card-body">
							<h5 class="card-title">Пенталгин экстра</h5>
							<p class="card-text">Гель для наруж. прим-я 5%, 50г</p>
							<p class="card-text text-right">291 руб. 
								<a href="#" class="btn btn-primary">Добавить</a>
							</p>
						</div>
					</div>
				</div>
				<div class="card-deck my-4">
					<div class="card">
						<img src="items/mig.jpg" class="card-img-top" alt="МИГ 400">
						<div class="card-body">
							<h5 class="card-title">МИГ 400</h5>
							<p class="card-text">Таблетки 400 мг, 20 шт.</p>
							<p class="card-text text-right">148 руб. 
								<a href="#" class="btn btn-primary">Добавить</a>
							</p>
						</div>
					</div>
					<div class="card">
						<img src="items/naiz.jpeg" class="card-img-top" alt="Найз">
						<div class="card-body">
							<h5 class="card-title">Найз</h5>
							<p class="card-text">Таблетки 100 мг, 20 шт.</p>
							<p class="card-text text-right">245 руб. 
								<a href="#" class="btn btn-primary">Добавить</a>
							</p>
						</div>
					</div>
					<div class="card">
						<img src="items/keltikan.jpg" class="card-img-top" alt="Келтикан комплекс">
						<div class="card-body">
							<h5 class="card-title">Келтикан комплекс</h5>
							<p class="card-text">Капсулы 20 шт.</p>
							<p class="card-text text-right">853 руб. 
								<a href="#" class="btn btn-primary">Добавить</a>
							</p>
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