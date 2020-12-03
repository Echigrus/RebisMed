<?php
	session_start();//начинается магия
	if(!isset($_SESSION['numA']) || !isset($_SESSION['numB']) || !isset($_SESSION['operator'])){
		$_SESSION['prev'] = "";//вывод пред. значения и оператора
		//max длина в 37 символов ([знак], число, [пробелы], [запятая], оператор) 
		$_SESSION['out'] = "0";//вывод только для текущего значения
		//max длина в 23 символа ([знак], число, [пробелы], [запятая])
		$_SESSION['numA'] = 0;
		$_SESSION['numB'] = 0;
		$_SESSION['operator'] = "";
		$_SESSION['comma'] = false;
		//numA - вводимое, numB - введённое
		$_SESSION['initA'] = false;
		$_SESSION['initB'] = false;
	}
	//функция ввода числа
	function fInput($t){
		if($_SESSION['initA'] == false){
			if($_SESSION['initB'] == false) $_SESSION['prev'] = "";
			$_SESSION['initA'] = true;
			$_SESSION['numA'] = 0;
		}
		if($_SESSION['numA'] - floor($_SESSION['numA']) == 0.0 && $_SESSION['comma'] == false){
			$_SESSION['numA'] *= 10;
			if($_SESSION['numA'] >= 0.0) $_SESSION['numA'] += $t;
			else $_SESSION['numA'] -= $t;
			$_SESSION['out'] = (string) $_SESSION['numA'];
		}
		else {
			$power = strlen(explode('.', $_SESSION['out'])[1]);
			if($_SESSION['numA'] >= 0.0) $_SESSION['numA'] += $t /(pow(10, $power+1));
			else $_SESSION['numA'] -= $t/(pow(10, $power+1));
			$_SESSION['out'] = (string) $_SESSION['numA'];
			if($t == 0) $_SESSION['out'] = $_SESSION['out'] . "0"; 
			$_SESSION['comma'] = false;
		} 
	}
	//удалить последний символ
	function fRemove(){
		if($_SESSION['initA'] == false){
			if($_SESSION['initB'] == false) $_SESSION['prev'] = "";
			$_SESSION['initA'] = true;
			$_SESSION['numA'] = 0;
		}
		if($_SESSION['numA'] - floor($_SESSION['numA']) == 0.0){
			if($_SESSION['comma'] == true){ 
				$_SESSION['comma'] = false;
			}
			else {
				$_SESSION['numA'] = ($_SESSION['numA'] - ($_SESSION['numA'] % 10))/10;	
			}
			$_SESSION['out'] = (string) $_SESSION['numA'];
		}
		else {
			$power = strlen(explode('.', $_SESSION['out'])[1]);
			$_SESSION['numA'] = round($_SESSION['numA'], $power-1);
			$_SESSION['out'] = (string) $_SESSION['numA'];
			if(strlen(explode('.', $_SESSION['out'])[1]) == 0) $_SESSION['comma'] = true;
		}
	}
	//вывод операции
	function fOpOutput(){
		switch ($_SESSION['operator']){
			case "%":
				$_SESSION['numB'] = $_SESSION['numA'];
				$_SESSION['numA'] /= 100;
				$_SESSION['prev'] = $_SESSION['numB'] . " / 100";
				$_SESSION['out'] = $_SESSION['numA'];
				$_SESSION['initB'] = false;
				$_SESSION['initA'] = false;
				break;
			case "1/x":
				if($_SESSION['numA'] == 0.0){
					$_SESSION['prev'] = "NaN";
					$_SESSION['initB'] = false;
				}
				else {
					$_SESSION['numB'] = $_SESSION['numA'];
					$_SESSION['numA'] = 1 / $_SESSION['numB'];
					$_SESSION['prev'] = "1 / " . $_SESSION['numB'];
					$_SESSION['out'] = $_SESSION['numA'];
					$_SESSION['initB'] = false;
					$_SESSION['initA'] = false;
				}
				break;
			case "sq":
				$_SESSION['numB'] = $_SESSION['numA'];
				$_SESSION['numA'] = pow($_SESSION['numB'], 2);
				$_SESSION['prev'] = $_SESSION['numB'] . " ^ 2";
				$_SESSION['out'] = $_SESSION['numA'];
				$_SESSION['initB'] = false;
				$_SESSION['initA'] = false;
				break;
			case "sqr":
				$_SESSION['numB'] = $_SESSION['numA'];
				$_SESSION['numA'] = sqrt($_SESSION['numB']);
				$_SESSION['prev'] = "&radic;(" . $_SESSION['numB'] . ")";
				$_SESSION['out'] = $_SESSION['numA'];
				$_SESSION['initB'] = false;
				$_SESSION['initA'] = false;
				break;
			case "/":
				if($_SESSION['initB']==true){
					if($_SESSION['numB'] == 0.0){
						$_SESSION['prev'] = "NaN";
					}
					else {
						$_SESSION['prev'] = $_SESSION['numB']. " " . $_SESSION['operator'] . " " . $_SESSION['numA'] . " =";
						$_SESSION['numA'] = $_SESSION['numB'] / $_SESSION['numA'];
						$_SESSION['out'] = $_SESSION['numA'];
						$_SESSION['initB'] = false;
						$_SESSION['initA'] = false;
					}
				}
				else {
					$_SESSION['initB'] = true;
					$_SESSION['initA'] = false;
					$_SESSION['numB'] = $_SESSION['numA'];
					$_SESSION['prev'] = $_SESSION['numB'] . " " . $_SESSION['operator'];
				}
				if($_SESSION['prev'] == "NaN"){
					$_SESSION['initB'] = false;
					$_SESSION['initA'] = false;
				}
				break;
			case "*":
				if($_SESSION['initB']==true){
					$_SESSION['prev'] = $_SESSION['numB']. " " . $_SESSION['operator'] . " " . $_SESSION['numA'] . " =";
					$_SESSION['numA'] = $_SESSION['numB'] * $_SESSION['numA'];
					$_SESSION['out'] = $_SESSION['numA'];
					$_SESSION['initB'] = false;
					$_SESSION['initA'] = false;
				}
				else {
					$_SESSION['initB'] = true;
					$_SESSION['initA'] = false;
					$_SESSION['numB'] = $_SESSION['numA'];
					$_SESSION['prev'] = $_SESSION['numB'] . " " . $_SESSION['operator'];
				}
				break;
			case "+":
				if($_SESSION['initB']==true){
					$_SESSION['prev'] = $_SESSION['numB']. " " . $_SESSION['operator'] . " " . $_SESSION['numA'] . " =";
					$_SESSION['numA'] += $_SESSION['numB'];
					$_SESSION['out'] = $_SESSION['numA'];
					$_SESSION['initB'] = false;
					$_SESSION['initA'] = false;
				}
				else {
					$_SESSION['initB'] = true;
					$_SESSION['initA'] = false;
					$_SESSION['numB'] = $_SESSION['numA'];
					$_SESSION['prev'] = $_SESSION['numB'] . " " . $_SESSION['operator'];
				}
				break;
			case "-":
				if($_SESSION['initB']==true){
					$_SESSION['prev'] = $_SESSION['numB']. " " . $_SESSION['operator'] . " " . $_SESSION['numA'] . " =";
					$_SESSION['numA'] = $_SESSION['numB'] - $_SESSION['numA'];
					$_SESSION['out'] = $_SESSION['numA'];
					$_SESSION['initB'] = false;
					$_SESSION['initA'] = false;
				}
				else {
					$_SESSION['initB'] = true;
					$_SESSION['initA'] = false;
					$_SESSION['numB'] = $_SESSION['numA'];
					$_SESSION['prev'] = $_SESSION['numB'] . " " . $_SESSION['operator'];
				}
				break;
		}
	}
	
	//обработка ввода
	if(isset($_POST['n0'])){
		fInput(0);
	} elseif(isset($_POST['n1'])){
		fInput(1);
	} elseif(isset($_POST['n2'])){
		fInput(2);
	} elseif(isset($_POST['n3'])){
		fInput(3);
	} elseif(isset($_POST['n4'])){
		fInput(4);
	} elseif(isset($_POST['n5'])){
		fInput(5);
	} elseif(isset($_POST['n6'])){
		fInput(6);
	} elseif(isset($_POST['n7'])){
		fInput(7);
	} elseif(isset($_POST['n8'])){
		fInput(8);
	} elseif(isset($_POST['n9'])){
		fInput(9);
	} 
	//обработка унарных операций
	elseif(isset($_POST['percents'])){
		if($_SESSION['operator'] == "*" || $_SESSION['operator'] == "/" || $_SESSION['operator'] == "+" || $_SESSION['operator'] == "-") fOpOutput();
		$_SESSION['operator'] = "%";
		fOpOutput();
	} elseif(isset($_POST['one_by'])){
		if($_SESSION['operator'] == "*" || $_SESSION['operator'] == "/" || $_SESSION['operator'] == "+" || $_SESSION['operator'] == "-") fOpOutput();
		$_SESSION['operator'] = "1/x";
		fOpOutput();
	} elseif(isset($_POST['square'])){
		if($_SESSION['operator'] == "*" || $_SESSION['operator'] == "/" || $_SESSION['operator'] == "+" || $_SESSION['operator'] == "-") fOpOutput();
		$_SESSION['operator'] = "sq";
		fOpOutput();
	} elseif(isset($_POST['root'])){
		if($_SESSION['operator'] == "*" || $_SESSION['operator'] == "/" || $_SESSION['operator'] == "+" || $_SESSION['operator'] == "-") fOpOutput();
		$_SESSION['operator'] = "sqr";
		fOpOutput();
	}
	//обработка бинарных операций
	elseif(isset($_POST['divide'])){
		if($_SESSION['operator'] == "*" || $_SESSION['operator'] == "+" || $_SESSION['operator'] == "-") fOpOutput();
		$_SESSION['operator'] = "/";
		fOpOutput();
	} elseif(isset($_POST['multiply'])){
		if($_SESSION['operator'] == "/" || $_SESSION['operator'] == "+" || $_SESSION['operator'] == "-") fOpOutput();
		$_SESSION['operator'] = "*";
		fOpOutput();
	} elseif(isset($_POST['plus'])){
		if($_SESSION['operator'] == "*" || $_SESSION['operator'] == "/" || $_SESSION['operator'] == "-") fOpOutput();
		$_SESSION['operator'] = "+";
		fOpOutput();
	} elseif(isset($_POST['minus'])){
		if($_SESSION['operator'] == "*" || $_SESSION['operator'] == "+" || $_SESSION['operator'] == "/") fOpOutput();
		$_SESSION['operator'] = "-";
		fOpOutput();
	}
	//обработка тех. операций
	elseif(isset($_POST['plus_minus'])){
		$_SESSION['numA'] *= -1; $_SESSION['out'] = $_SESSION['numA'];
	} elseif(isset($_POST['comma'])){
		if(strpos($_SESSION['out'], ".") == false){
			$_SESSION['out'] = $_SESSION['out'] . ".";
			$_SESSION['comma'] = true;
		}
	} elseif(isset($_POST['equal'])){
		fOpOutput();
	} elseif(isset($_POST['backspace'])){
		fRemove();
	} elseif(isset($_POST['clear_cur'])){
		$_SESSION['numA'] = 0; $_SESSION['out'] = "0";
	} elseif(isset($_POST['clear_all'])){
		$_SESSION['prev'] = "";
		$_SESSION['out'] = "0";
		$_SESSION['numA'] = 0;
		$_SESSION['numB'] = 0;
		$_SESSION['operator'] = "";
		$_SESSION['comma'] = false;
		//numA - вводимое, numB - введённое
		$_SESSION['initA'] = false;
		$_SESSION['initB'] = false;
	}
?>
<!DOCTYPE html>
<html>
	<header>
		<meta charset="utf-8">
		<title>Калькулятор</title>
		<link rel="stylesheet" href="../styles.css">
		<!-- Bootstrap core CSS -->
		<link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon -->
		<link rel="icon" href="../img/rebis_icon.svg">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>	
		<script src="https://getbootstrap.com/docs/4.5/dist/js/bootstrap.bundle.min.js"></script>
	</header>
	<body>
		<div class="container">
			<form class="form-calc" method="post">
				<table style="max-width: 350px;" class="table table-bordered">
					<tbody>
						<tr>
							<td colspan="4">
								<input type="text" readonly class="form-control-plaintext form-control-sm text-right" id="prev_output" value="<? echo $_SESSION['prev']; ?>">
								<input type="text" readonly class="form-control-plaintext text-right" id="output" value="<? echo $_SESSION['out']; ?>" />
							</td>
						</tr>
						<tr>
							<td><button type="submit" class="btn btn-danger btn-block" name="percents">%</button></td>
							<td><button type="submit" class="btn btn-danger btn-block" name="clear_cur">CE</button></td>
							<td><button type="submit" class="btn btn-danger btn-block" name="clear_all">C</button></td>
							<td><button type="submit" class="btn btn-danger btn-block" name="backspace"><-</button></td>
						</tr>
						<tr>
							<td><button type="submit" class="btn btn-primary btn-block" name="one_by">1/X</button></td>
							<td><button type="submit" class="btn btn-primary btn-block" name="square">X<sup>2</sup></button></td>
							<td><button type="submit" class="btn btn-primary btn-block" name="root">&radic;X</button></td>
							<td><button type="submit" class="btn btn-primary btn-block" name="divide">/</button></td>
						</tr>
						<tr>
							<td><button type="submit" class="btn btn-light btn-block" name="n7">7</button></td>
							<td><button type="submit" class="btn btn-light btn-block" name="n8">8</button></td>
							<td><button type="submit" class="btn btn-light btn-block" name="n9">9</button></td>
							<td><button type="submit" class="btn btn-primary btn-block" name="multiply">*</button></td>
						</tr>
						<tr>
							<td><button type="submit" class="btn btn-light btn-block" name="n4">4</button></td>
							<td><button type="submit" class="btn btn-light btn-block" name="n5">5</button></td>
							<td><button type="submit" class="btn btn-light btn-block" name="n6">6</button></td>
							<td><button type="submit" class="btn btn-primary btn-block" name="minus">-</button></td>
						</tr>
						<tr>
							<td><button type="submit" class="btn btn-light btn-block" name="n1">1</button></td>
							<td><button type="submit" class="btn btn-light btn-block" name="n2">2</button></td>
							<td><button type="submit" class="btn btn-light btn-block" name="n3">3</button></td>
							<td><button type="submit" class="btn btn-primary btn-block" name="plus">+</button></td>
						</tr>
						<tr>
							<td><button type="submit" class="btn btn-light btn-block" name="plus_minus">+/-</button></td>
							<td><button type="submit" class="btn btn-light btn-block" name="n0">0</button></td>
							<td><button type="submit" class="btn btn-light btn-block" name="comma">,</button></td>
							<td><button type="submit" class="btn btn-primary btn-block" name="equal">=</button></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</body>
</html>