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
			//получение товаров
			$sql = "SELECT * FROM goods";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			$data_goods = $stmt->fetchAll(PDO::FETCH_ASSOC);
			//получение категорий
			$sql = "SELECT * FROM categories";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			$data_categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}else{
			header("Location: http://f90443p8.beget.tech/profile.php");
			exit;
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Rebis: CR (4 л/р)</title>
		<link rel="stylesheet" href="styles.css">
		<!-- Bootstrap core CSS -->
		<link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon -->
		<link rel="icon" href="img/rebis_icon.svg">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://getbootstrap.com/docs/4.5/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
	</head>
	<body class="d-flex flex-column h-100">
		<main role="main" class="flex-shrink-0">
			<div class="container">
				<div class="alert icon-alert with-arrow alert-success form-alter" role="alert" style="display:none">
					<i class="fa fa-fw fa-check-circle"></i>
					<strong> Success ! </strong> Data saved successfully. 
				</div>
				<div class="alert icon-alert with-arrow alert-danger form-alter" role="alert" style="display:none">
					<i class="fa fa-fw fa-times-circle"></i>
					<strong> Note !</strong> Data saving failed. 
				</div>
				<form id="add_form" action="" method="post" novalidate>
				<table class="table table-striped border">
				  <thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Категория</th>
					  <th scope="col">Название</th>
					  <th scope="col">Описание</th>
					  <th scope="col">Цена, руб.</th>
					  <th scope="col">Продано, шт.</th>
					</tr>
				  </thead>
				  <tbody>
					<?php
						if ($data_goods != NULL) {
							foreach ($data_goods as $row) {
								$id = $row['id'];
								$category_key = array_search($row['category_id'], array_column($data_categories, 'id'));
								$category = $data_categories[$category_key]['name'];
								$name = $row['name'];
								$about = $row['about'];
								$price = $row['price'];
								$total_sold = $row['total_sold'];
								echo "<tr><th scope=\"row\">$id</th>";
								echo "<td>$category</td>";
								echo "<td>$name</td>";
								echo "<td>$about</td>";
								echo "<td>$price</td>";
								echo "<td>$total_sold</td></tr>";
							}
						}
						else {
							echo "<h4 class='mt-3'>Не найдено товаров</h4>";
						}
					?>
					<tr>
						<th scope="row"><label class="form-label">*</label></th>
						<td>
							<div class="form-group">
								<select class="form-select" id="category" name="category" required>
									<option value>Выберите...</option>
									<?php
										foreach($data_categories as $row){
											$value = $row['id'];
											$text = $row['name'];
											echo "<option value=$value>$text</option>";
										}
									?>
								</select>
								<div class="messages"></div>
							</div>
						</td>
						<td>
							<div class="form-group">
								<textarea class="form-control" id="name" name="name" required style="height: calc(1.5em + .75rem + 2px);"></textarea>
								<div class="messages"></div>
							</div>
						</td>
						<td>
							<div class="form-group">
								<textarea class="form-control" id="about" name="about" required style="height: calc(1.5em + .75rem + 2px);"></textarea>
								<div class="messages"></div>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" id="price" name="price" required>
								<div class="messages"></div>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" id="total_sold" name="total_sold" required>
								<div class="messages"></div>
							</div>
						</td>
					</tr>
				  </tbody>
				</table>
				<div class="modal-footer border">
					<button type="submit" class="btn btn-primary btn-form-action btn-submit">Добавить</button>
					<a class="btn btn-secondary" role="button" href="CR.php">Обновить</a>
				</div> 
				</form>
			</div>
		</main>
		<script src="jquery.validate.js"></script>
		<script src="additional-methods.js"></script>
		<script>
		$.validator.setDefaults({
			submitHandler: function(){
				var data = $("#add_form").serialize();
				//console.log(data);
				$.post('add_record.php', data, function(data,status){
					console.log("Data: " + data + "\nStatus: " + status);
					if( data == "1"){
						$(".alert-success").hide();
						$(".alert-danger").fadeIn(800);
					}
					else{
						$(".alert-danger").hide();
						$(".alert-success").fadeIn(800);
						setTimeout(function(){  location.reload(); }, 2000);
					}
				});
			}
		});
		
		$().ready(function() {
			$("#add_form").validate({
				rules : {
					category: "required",
					name: {
						maxlength: 40,
						required: true,
						pattern: "[a-zA-Zа-яА-ЯёЁ0-9+-.\'\" ]+"
					},
					about: {
						maxlength: 90,
						required: true,
						pattern: "[a-zA-Zа-яА-ЯёЁ0-9+-.\'\" ]+"
					},
					price: {
						required: true,
						range: [0.01, 99999999.99],
						number: true,
						//pattern: "(\d{1,8}\.)+(\d{2})"
					},
					total_sold: {
						required: true,
						digits: true,
						min: 0,
						max: 99999999999
					}
				},
				messages : {
					name: "Может содержать только русские и английские буквы, знаки препинания и цифры",
					about: "Может содержать только русские и английские буквы, знаки препинания и цифры",
					price: "Не более 8 цифр в целой и 2 в дробной частях числа",
					total_sold: "Поле обязательно для заполнения, >=0"
				}
			});
		});
		</script>
	</body>
</html>