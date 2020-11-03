<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-type" content = "text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Rebis - Главная</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="styles.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="navbar navbar-light">
			<div class="logo-block">
			<a class="navbar-brand" href="index.html">
				<p class="logo">Rebis</p>
			</a>
			</div>
			<form class="form-inline" id="search">
				<input class="form-control" id="search" type="search" placeholder="Найти...">
				<button class="btn btn-lg btn-outline-success my-2" type="submit">Поиск</button>
				<div class="cart-contacts">
					<a href="contacts.html" tabinder="-1" role="button" class="btn btn-secondary btn-lg">Контакты</a>
					<a href="cart.html" tabinder="-1" role="button" class="btn btn-primary btn-lg">Корзина</a>
				</div>
			</form>
		</div>
		<div class="central-container">
			<div class="categories">
				<ul class="list-group">
				  <li class="list-group-item active">Главная</li>
				  <li class="list-group-item">Витамины и добавки</li>
				  <li class="list-group-item">Зрение</li>
				  <li class="list-group-item">Мед. приборы</li>
				  <li class="list-group-item">Противовирусные</li>
				</ul>
			</div>
			<div class="news-block">
				<div class="list-group">
				  <a href="#" class="list-group-item list-group-item-action">
					<div class="d-flex w-100 justify-content-between">
					  <h5 class="mb-1">Скидка на витамины</h5>
					  <small>Сегодня</small>
					</div>
					<p class="mb-1">Скидки на витамины от 10 до 25% до конца недели...</p>
					<small>Скидки.</small>
				  </a>
				  <a href="#" class="list-group-item list-group-item-action">
					<div class="d-flex w-100 justify-content-between">
					  <h5 class="mb-1">Завоз лекарств</h5>
					  <small>1 день назад</small>
					</div>
					<p class="mb-1">В продажу поступили лекарства для профилактики гриппа и ОРВИ...</p>
					<small>Ассортимент.</small>
				  </a>
				  <a href="#" class="list-group-item list-group-item-action">
					<div class="d-flex w-100 justify-content-between">
					  <h5 class="mb-1">Мы открылись!</h5>
					  <small class="text-muted">3 дня назад</small>
					</div>
					<p class="mb-1">Вы можете сделать заказ с доставкой на сайте или посетить наш магазин по адресу...</p>
					<small class="text-muted">Важное.</small>
				  </a>
				</div>
			</div>
			<div class="item-list">
				<div class="options">
					<div class="searched">
						<h3>Популярные товары:</h3>
					</div>
					<div class="sorting">
						<form class="form-inline">
							<select class="form-control" id="sortSelect">
							  <option>Цена: по возрастанию</option>
							  <option>Цена: по убыванию</option>
							  <option>Название: А до Я</option>
							  <option>Название: Я до А</option>
							</select>
							<button id="sortBtn" class="btn btn-outline-success my-2" type="submit">Применить</button>
						</form>
					</div>
				</div>
				<div class="items">
					<div class="row" id="catalogue">
						<div class="col-4">
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
						</div>
						<div class="col-4">
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
						</div>
						<div class="col-4">
							<div class="card">
							  <img src="items/pentalgin.jpeg" class="card-img-top" alt="Пенталгин экстра">
							  <div class="card-body">
								<h5 class="card-title">Пенталгин экстра</h5>
								<p class="card-text">Гель для наружного применения 5%, 50г</p>
								<p class="card-text text-right">291 руб. 
									<a href="#" class="btn btn-primary">Добавить</a>
								</p>
							  </div>
							</div>
						</div>
					</div>
					<div class="row" id="catalogue">
						<div class="col-4">
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
						</div>
						<div class="col-4">
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
						</div>
						<div class="col-4">
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
				</div>
			</div>
		</div>
		<footer class="footer font-small blue">
		  <!-- Copyright -->
		  <div class="footer-copyright text-center py-3">
			© 2020 Pepegas & Co.
		  </div>
		  <!-- Copyright -->
		</footer>
	</body>
</html>