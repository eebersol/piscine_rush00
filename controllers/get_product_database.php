<?PHP

function get_product_database()
{
	if (($handle = fopen("../data_base/product.csv", "r")) == false)
	{
		echo "data_base product ERROR\n";
		return ;
	}

	$product_database = array();

	while (($data = fgetcsv($handle, 0, ",")) != false) {
		$product_database[$data[0]]['name_product'] = $data[0];
		$product_database[$data[0]]['price'] = $data[1];
		$product_database[$data[0]]['categorie'] = explode(",", $data[2]);
		$product_database[$data[0]]['image_url'] = $data[3];
	}
	fclose($handle);
	return $product_database;
}
?>
