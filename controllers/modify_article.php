<?php

function modify_product($product_name, $new_name, $new_category, $new_price, $new_url)
{
	$array = file_get_contents("../data_base/product.csv");
	if (isset($product_name) && strpos($array, $product_name))
	{
		$index_begin = strpos($array, $product_name);
		$i = strpos($array, "\n", $index_begin);
		$len = $i - $index_begin;
		$to_delete = substr($array, $index_begin, $len);
		$first_part = substr($array, 0, $index_begin - 1);
		$second_part = substr($array, ($index_begin+$len) + 1, strlen($array) - $index_begin+$len);
		$modify_product = explode(",", $to_delete);
		if (isset($new_name))
			$modify_product[0] = $new_name . ",";
		if (isset($new_price))
			$modify_product[1] = $new_price . "EUR,";
		if (isset($new_category))
			$modify_product[2] = "\"," . $new_category . "\",";
		if (isset($new_url))
			$modify_product[3] = $new_url . "\n";
		$modify_product = implode($modify_product);
		$final_csv = $first_part . "\n" . $modify_product . $second_part;
		$array = file_put_contents("../data_base/product.csv", $final_csv);
		echo "Success modify $product_name\n";
		print("<a href='http://localhost:8100/index.php'>Back to main page</a>");
	}
	else
	{
		echo "Wrong name or empty string.\n";
		print("<a href='http://localhost:8100/template/delete_article.php'>Back to modify article page</a>");
	}
}

if ($_POST['submit'] == 'OK')
	modify_product($_POST['name'], $_POST['newname'], $_POST['newcategory'], $_POST['newprice'], $_POST['newurl']);
else
{
			echo "Wrong name or empty string.\n";
			echo $_POST['submit'];
}

?>