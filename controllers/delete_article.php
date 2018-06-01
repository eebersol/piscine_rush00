<?php

	function delete_produc($product_name)
	{
		$str_products = file_get_contents("../data_base/product.csv");
		if (isset($product_name) && strpos($str_products, $product_name) !== FALSE)
		{
			$array_product = explode("\n", $str_products);
			for ($i = 0; $i < count($array_product); $i++)
			{
				$line = explode(",", $array_product[$i]);
				if ($line[0] == $product_name)
					unset($array_product[$i]);
			}
			$array_product = implode("\n", $array_product);
			$str_products 	= file_put_contents("../data_base/product.csv", $array_product);
			
			echo "success deleted $product_name</br>";
			print("<a href='http://localhost:8100/index.php'>Back to main page</a>");
		}
		else
		{
			echo "echec to delete, empty product name or invalid.\n";
			print("<a href='http://localhost:8100/template/form_modif_article.php'>Back to delete article page</a>");
		}
	}

	if ($_POST['submit'] == 'OK')
		delete_produc($_POST['article_name']);
?>