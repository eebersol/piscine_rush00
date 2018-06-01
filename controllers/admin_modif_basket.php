<?php
	function modify_command($email, $product_name, $new_name, $nbr, $price)
	{
		$array = file_get_contents("../data_base/commands.csv");
		if (!isset($nbr))
			$nbr = 1;
		if (isset($email) && isset($product_name) && isset($price) && isset($new_name) && strpos($array, $email))
		{
			$array = file_get_contents("../data_base/commands.csv");
			$array = explode("\n", $array);
			$index = 0;
			$i = 0;
			$j= 0;
			for($k = 0; $k < count($array); $k++)
			{
				$i = strpos($array[$k], $email);
				$j = strpos($array[$k], $product_name);
				if ($i === FALSE || $j === FALSE && $array[$k] != "")
				{
					if ($k == count($array))
					{
						$final_array[$index] = $array[$k];
					}
					else
				 		$final_array[$index] = $array[$k] . "\n";
					$index++;
				}
				else
				{
					$new_command = explode(",", $array[$k]);
					$new_command[0] = $new_name . ",";
					$new_command[1] = $nbr . ",";
					$new_command[2] = $price . "EUR,";
					$new_command[3] = $email . "\n";
					$new_command = implode($new_command);
					$final_array[$index] = $new_command;
					$index++;
				}
			}
			file_put_contents("../data_base/commands.csv", $final_array);
			echo "Success modified $product_name by $new_namew\n";
			print("<a href='http://localhost:8100/index.php'>Back home page</a>");
		}
		else
		{
			echo "Invalid email or product name or price\n";
			print("<a href='http://localhost:8100/template/form_modif_basket.php'>Back to modify command page</a>");
		}
	}

	if ($_POST['submit'] == 'OK')
		modify_command($_POST['email'], $_POST['product_name'], $_POST['new_name'], $_POST['nbr'], $_POST['price']);
	else
	{
		echo "Invalid email or product name or price\n";
		print("<a href='http://localhost:8100/template/form_modif_basket.php'>Back to modify command page</a>");
	}

?>