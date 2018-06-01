<?php
session_start();

if (!file_exists("../data_base/product.csv"))
	touch("product.csv", 0777);

$separator = ",";
$category = "\"," . $_POST['category'] . "\"";
file_put_contents("../data_base/product.csv", $_POST['name'], FILE_APPEND);
file_put_contents("../data_base/product.csv", $separator, FILE_APPEND);
file_put_contents("../data_base/product.csv", $_POST['price'] . "EUR", FILE_APPEND);
file_put_contents("../data_base/product.csv", $separator, FILE_APPEND);
file_put_contents("../data_base/product.csv", $category, FILE_APPEND);
file_put_contents("../data_base/product.csv", $separator, FILE_APPEND);
file_put_contents("../data_base/product.csv", $_POST['img'], FILE_APPEND);
file_put_contents("../data_base/product.csv", "\n", FILE_APPEND);

print("<a href='http://localhost:8100/index.php'>Back to main page</a>");
?>
