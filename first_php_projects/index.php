<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Calculator.css">
	<title> Document</title>
</head>

<body>
	<main>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<label for="firstnumber" class="numbers">Firstnumber</label>
			<input class="numbers" id="firstnumber" type="number" name="firstnumber" required><br>
			<label class="Operators" for="Operator">Operator</label>
			<select class="Operators" name="Operator" id="Operator">
				<option value="add">+</option>
				<option value="subtract">-</option>
				<option value="multiply">*</option>
				<option value="divide">/</option>
			</select><br>
			<label class="numbers" for="lastnumber">Lastnumber</label>
			<input class="numbers" id="lastnumber" type="number" name="lastnumber" required><br>
			<button type="submit" id="button">Calculate</button>
		</form>
		<?php
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$num1 = filter_input(INPUT_POST, "firstnumber", FILTER_SANITIZE_NUMBER_FLOAT);
			$num2 = filter_input(INPUT_POST, "lastnumber", FILTER_SANITIZE_NUMBER_FLOAT);
			$operator = htmlspecialchars($_POST["Operator"]);

			$errors = false;
			if (empty($num1) || empty($num1)) {
				echo "<p>Fill the numbers</p>";
				$errors = true;
			}
			if (!is_numeric($num1) || !is_numeric($num2)) {
				echo "<p>Enter only the numeric</p>";
				$errors = true;
			}
			if (!$errors) {
				$value = 0;
				switch ($operator) {
					case "add":
						$value = $num1 + $num2;
						break;
					case "subtract":
						$value = $num1 - $num2;
						break;
					case "multiply":
						$value = $num1 * $num2;
						break;
					case "divide":
						$value = $num1 / $num2;
						break;
					default:
						echo "<p>Something went wrong</p>";
				}
				echo "<p id='result'>Result =" . $value . " </p>";
			}
		}
		?>
	</main>
</body>

</html>