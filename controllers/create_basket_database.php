<?php
session_start();
if ($_SESSION['loggued_on_user'])
{
	if ($_SESSION['panier']['libelleProduit'])
	{
		if (!file_exists("../data_base/commands.csv"))
			touch("commmands.csv", 0777);
		for ($i = 0; $i < count($_SESSION['panier']) - 1; $i++)
		{
			$separator = ",";
			file_put_contents("../data_base/commands.csv", $_SESSION['panier']['libelleProduit'][$i], FILE_APPEND);
			file_put_contents("../data_base/commands.csv", $separator, FILE_APPEND);
			file_put_contents("../data_base/commands.csv", $_SESSION['panier']['qteProduit'][$i], FILE_APPEND);
			file_put_contents("../data_base/commands.csv", $separator, FILE_APPEND);
			file_put_contents("../data_base/commands.csv", $_SESSION['panier']['prixProduit'][$i], FILE_APPEND);
			file_put_contents("../data_base/commands.csv", $separator, FILE_APPEND);
			file_put_contents("../data_base/commands.csv", $_SESSION['loggued_on_user'], FILE_APPEND);
			file_put_contents("../data_base/commands.csv", "\n", FILE_APPEND);
		}
		$_SESSION['panier'] = NULL;
		echo "Commande valide";
	}
	else
		echo "Le panier est vide";
}
else
	echo "Please login before purchase";
echo "<br/>";
print("<a href='http://localhost:8100/index.php'>Back to main page</a>");
?>
