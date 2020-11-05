<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Rebis: Корзина</title>
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
							<li class="nav-item active">
								<a class="nav-link" href="cart.php">Корзина <span class="sr-only">(current)</span></a>
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
				<h2 class="mt-5">Ваша корзина:</h2>
				<ul class="list-group my-3">
					<li class="list-group-item">
						<div class="row">
							<div class="col-6">
								<h5 class="product-name"><b>Нурофен Экспресс</b></h5><h5><small>Капсулы 200 мг, 24 шт.</small></h5>
							</div>
							<div class="col-3 text-right mt-2">
								<h6><strong>309.00 руб. <span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-2">
								<input class="form-control input-sm" type="number" value="1" min="1" max="100">
							</div>
							<div class="col-1">
								<button type="button" class="btn btn-outline-danger">X</button>
							</div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-6">
								<h5 class="product-name"><b>Некст Уно Экспресс</b></h5><h5><small>Капсулы 200 мг, 20 шт.</small></h5>
							</div>
							<div class="col-3 text-right mt-2">
								<h6><strong>266.00 руб. <span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-2">
								<input class="form-control input-sm" type="number" value="1" min="1" max="100">
							</div>
							<div class="col-1">
								<button type="button" class="btn btn-outline-danger">X</button>
							</div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-6">
								<h5 class="product-name"><b>Пенталгин Экстра</b></h5><h5><small>Гель для наружного применения 5%, 50г</small></h5>
							</div>
							<div class="col-3 text-right mt-2">
								<h6><strong>291.00 руб. <span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-2">
								<input class="form-control input-sm" type="number" value="1" min="1" max="100">
							</div>
							<div class="col-1">
								<button type="button" class="btn btn-outline-danger">X</button>
							</div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-8">
								<h4>Итого: 866.00 руб.
								</h4>
							</div>
							<div class="col-4">
								<h4 class="text-right">
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#login">Оформить</button>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reset">Сброс</button>
								</h4>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Авторизация</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
						Пожалуйста, войдите в аккаунт или зарегистрируйтесь. Ваша корзина сохранится.
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Отмена</button>
							<button type="button" class="btn btn-success">Далее</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Отмена заказа</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
						Вы уверены, что хотите отменить заказ? Ваша корзина будет очищена.
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal">Отмена</button>
							<button type="button" class="btn btn-danger">Далее</button>
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