<?PHP
session_start();
include '../controllers/get_product_database.php';
?>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<title> F.Awesome </title>
	</head>
	<body>
	<?PHP
	if ($_SESSION['admin'])
	{
		echo "<a id='form' href='../template/admin_page.php'>Admin Page</a>";
	}
	?>
<?PHP
if (!$_SESSION['loggued_on_user'])
{
	echo "<form class='format' action='../controllers/login.php' method='post'>
		Identifiant: <input type='text' name='mail' id='input'>
		<br/>
		Mot de passe: <input type='password' name='passwd' id='input'>
		<input id='submit' type='submit' name='submit' value='OK'>
		</form>";
}
else
	echo "<a class='format'> Connected as: " . $_SESSION['loggued_on_user'] . "</a><br/>";
?>
		<div id="header">
			<img id="logo" src="http://i.imgur.com/XXTjGRp.png" title="logo" alt="logo">
			<a href="">
				<img id="reload" src="../resources/reload.png" title="Reload" alt="Recommencer au début">
			</a>
			<a href="../controllers/logout.php">
				<img id="close" src="../resources/close.gif" title="Logout" alt="Déconnecter">
			</a>
			<a href="../index.php">
				<img id="skateshit" src="http://i.imgur.com/ly7cFkI.png" title="Skateshit" alt="Skateshit">
			</a>
		</div>
		<div id="left">
				<a href="../template/longboards.php">
					<img id="longboards" src="http://i.imgur.com/AjHcIC0.png" title="Longboards" alt="Longboards">
				</a>
				<a href="../template/skateboards.php">
					<img id="skateboards" src="http://i.imgur.com/2xFOwm0.png" title="Skateboards" alt="Skateboards">
				</a>
				<a href="../template/trucks.php">
					<img id="trucks" src="http://i.imgur.com/6YwxamH.png" title="Screws & Trucks" alt="Screws & Trucks">
				</a>
		</div>
		<div id="center">	
<?php
$product_database = get_product_database();
if (isset($product_database))
{
	foreach($product_database as $product)
	{
		$img = $product['image_url'];
		$name = $product['name_product'];
		$price = $product['price'];
		$qte = 1;

		if (array_search("longboard", $product['categorie']))
		{
			echo "<br/>
				<div style='background-color: rgb(144, 144, 144);'>
				<img src='$img'/>
				<p>$name : $price</p>
				<form class='quantite' action='../controllers/fonction-panier.php?name=$name&price=$price&qte=$qte&action=addArticle' method='post'>
				Quantite : <input type='text' name='quantite' id='input'>
				<input id='submit' type='submit' name='submit' value='Ajouter au panier'>
				</form></div>";
		}
	}
}
?>
		</div>
		<div id="right">
			<img id="login" src="http://i.imgur.com/AGYWsSC.png" title="login" alt="login"/>
			<a href="form_register.php">
				<img id="register" src="http://i.imgur.com/vD1q0ZT.png" title="register" alt="register"/>
			</a>
			<a href="../template/basket.php">
				<img id="basket" src="http://i.imgur.com/QwCafH4.png" title="basket" alt="basket"/>
			</a>
		</div>
<?PHP

function Total()
{
	$total = 0;
	for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
	{
		$total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
	}
	return $total;
}

if ($_SESSION['loggued_on_user'])
{
	echo "<div class=\"basketView\">";
	if (isset($_SESSION['panier']))
	{
		echo "<h3  class=\"basketTitle\">PANIER:</h3>" . $_SESSION['panier']['total'] . "<br/>";
		for($i = 0; $i < count($_SESSION['panier']); $i++)
		{
			$name = $_SESSION['panier']['libelleProduit'][$i];
			if (isset($name))
			{
				echo "<a class=\"basketDelete\" href='../controllers/fonction-panier.php?name=$name&action=delArticle'>x</a>";
				echo "[";
				echo $_SESSION['panier']['qteProduit'][$i];
				echo "] ";
				if (strlen($_SESSION['panier']['libelleProduit'][$i]) > 4)
				{
					echo substr($_SESSION['panier']['libelleProduit'][$i], 0, 10);
					echo " ...   ";
				}
				echo $_SESSION['panier']['prixProduit'][$i];
				echo "<a href='../controllers/fonction-panier.php?name=$name&action=modifyQteLess'>[-]</a>";
				echo "<a href='../controllers/fonction-panier.php?name=$name&action=modifyQteMore'>[+]</a>";
				echo "<br/>";
			}	
		}
		$total = Total();
		echo "<div class=\"basketResume\" ><br /> <p class=\"basketTotal\">Total de votre commande : $total EUR</p><br />";
		echo "<a class=\"basketLink\"href='../controllers/create_basket_database.php'>Valider commande</a>";
		echo "<br /><a class=\"basketLink\" href='../controllers/delete_basket.php'>Supprimer panier</a></div>";
	}
	else
		echo "<h2 class='panier'>VIDE</h2>";
	echo "</div>";

}
?>
	</body>
</html>
