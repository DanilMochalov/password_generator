<!DOCTYPE html>
<html>
<head>
	<title>Генератор паролей</title>
</head>
<body>
	<h1>Генератор паролей</h1>
	<form method="post" action="">
		<label for="length">Длина пароля:</label>
		<input type="number" id="length" name="length" min="6" max="30" value="12" required><br><br>
		<input type="checkbox" id="include_numbers" name="include_numbers" checked>
		<label for="include_numbers">Включить цифры</label><br>
		<input type="checkbox" id="include_symbols" name="include_symbols" checked>
		<label for="include_symbols">Включить символы</label><br><br>
		<input type="submit" value="Сгенерировать пароль">
	</form>

	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$length = $_POST['length'];
		$include_numbers = isset($_POST['include_numbers']) ? true : false;
		$include_symbols = isset($_POST['include_symbols']) ? true : false;

		$numbers = '0123456789';
		$symbols = '!@#$%^&*()_+-={}[]|:;<>,.?/~';

		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		if($include_numbers) {
			$chars .= $numbers;
		}
		if($include_symbols) {
			$chars .= $symbols;
		}

		$password = '';
		for($i = 0; $i < $length; $i++) {
			$password .= $chars[rand(0, strlen($chars) - 1)];
		}

		echo "<p>Ваш новый пароль: $password</p>";
	}
	?>
</body>
</html>
