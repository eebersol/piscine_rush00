<?php
	function add_command($email, $product_name, $nbr, $price)
	{
		$array = file_get_contents("../data_base/commands.csv");
		if (!isset($nbr))
			$nbr = 1;
		if (isset($email) && isset($product_name) && isset($price) && ctype_digit($price))
		{
			$price = $price * $nbr;
			$new_command = $product_name . "," . $nbr . "," . $price . "EUR," . $email;
			$final_csv = $array . $new_command . "\n";
			$array = file_put_contents("../data_base/commands.csv", $final_csv);
			echo "Succes add command for $email.\n";
			print("<a href='http://localhost:8100/index.php'>Back to home page</a>");
		}
		else
		{
			echo "Invalid email or product name or price\n";
			print("<a href='http://localhost:8100/template/form_add_basket.php'>Back to add command page</a>");
		}
	}

	if ($_POST['submit'] == 'OK')
		add_command($_POST['email'], $_POST['product_name'], $_POST['nbr'], $_POST['price']);
	else
	{
		echo "Invalid email or product name or price\n";
		print("<a href='http://localhost:8100/template/form_add_basket.php'>Back to add command page</a>");
	}

?>