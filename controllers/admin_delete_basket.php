<?php

	function delete_command($email, $product_name)
	{
		if (isset($email) && isset($product_name))
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
			}
			file_put_contents("../data_base/commands.csv", $final_array);
			echo "Success deleted\n";
			print("<a href='http://localhost:8100/index.php'>Back to home page</a>");
		}
		else
		{
			echo "Invalid email or product name or price\n";
			print("<a href='http://localhost:8100/template/form_delete_basket.php'>Back to delete command page</a>");
		}
	}

	if ($_POST['submit'] == 'OK')
		delete_command($_POST['email'], $_POST['product_name']);
	else
	{
		echo "Invalid email or product name or price\n";
		print("<a href='http://localhost:8100/template/form_delete_basket.php'>Back to delete command page</a>");
	}
?>