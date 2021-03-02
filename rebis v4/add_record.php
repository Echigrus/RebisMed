<?php 
	require_once('connect.php');

	$category_id = htmlspecialchars(trim($_POST['category']));
	$name = htmlspecialchars(trim($_POST['name']));
	$about = htmlspecialchars(trim($_POST['about']));
	$price = htmlspecialchars(trim($_POST['price']));
	$total_sold = htmlspecialchars(trim($_POST['total_sold']));

	$sql = "INSERT INTO goods (category_id, name, about, price, total_sold) VALUES (:category_id, :name, :about, :price, :total_sold)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(':category_id', $category_id);
	$stmt->bindValue(':name', $name);
	$stmt->bindValue(':about', $about);
	$stmt->bindValue(':price', $price);
	$stmt->bindValue(':total_sold', $total_sold);
	$result = $stmt->execute();
	if($result)
		echo "1";
	else 
		echo "0";
?>

