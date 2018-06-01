<?PHP
session_start()
?>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<title> F.Awesome </title>
	</head>
	<body>
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
				<img id="reload" src="../resources/reload.png" title="reload" alt="Recommencer au début">
			</a>
			<a href="../controllers/logout.php">
				<img id="close" src="../resources/close.gif" title="close" alt="Déconnecter">
			</a>
			<a href="../index.php">
				<img id="skateshit" src="http://i.imgur.com/ly7cFkI.png" title="Skateshit" alt="Skateshit">
			</a>
		</div>
		<div id="left">
				<a href="../template/longboards.php">
					<img id="longboards" src="http://i.imgur.com/AjHcIC0.png" title="Longboards" alt="§Longboards">
				</a>
				<a href="../template/skateboards.php">
					<img id="skateboards" src="http://i.imgur.com/2xFOwm0.png" title="Skateboards" alt="Skateboards">
				</a>
				<a href="../template/trucks.php">
					<img id="trucks" src="http://i.imgur.com/6YwxamH.png" title="Screws & Trucks" alt="Screws & Trucks">
				</a>
		</div>
		<div id="center">
			<h2 class="panier">PANIER</h2>
		<?PHP
			echo $_SESSION['loggued_on_user'];
			if (isset($_SESSION['panier']))
			{
				echo "<h3 class='panier'>TOTAL:</h3>" . $_SESSION['panier']['total'] . "<br/>";
				for($i = 0; $i < count($_SESSION['panier']); $i++)
				{
					$name = $_SESSION['panier']['libelleProduit'][$i];
					if (isset($name))
					{
						echo "<a href='../controllers/fonction-panier.php?name=$name&action=delArticle'>[Supr]</a>";
						echo "Name product : ";
						echo $_SESSION['panier']['libelleProduit'][$i];
						echo " Price product :";
						echo $_SESSION['panier']['prixProduit'][$i];
						echo " Qte product : ";
						echo $_SESSION['panier']['qteProduit'][$i];
						echo"<button onclick=\"window.location.href='../controllers/fonction-panier.php?name=$name&action=modifyQteLess'\">-</button>";
						echo"<button onclick=\"window.location.href='../controllers/fonction-panier.php?name=$name&action=modifyQteMore'\">+</button>";
						echo"<br/>";
					}
				}
				$total = Total();
				echo "<br /> <p style='text-align:center'>Total de votre commande : $total EUR</p><br />";
				echo "<a href='../controllers/create_basket_database.php'>Valider commande</a>";
				echo "<br /><a href='../controllers/delete_basket.php'>Supprimer panier</a>";
			}
			else
				echo "<h2 class='panier'>VIDE</h2>";
			function Total()
			{
				$total = 0;
				for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
				{
					$total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
				}
				return $total;
			}

			function findOldCommand($name)
			{
				$commands = file_get_contents("../data_base/commands.csv");
				$commands = explode("\n", $commands);

				for ($i = 0; $i < count($commands); $i++)
				{
					$line = explode(',', $commands[$i]);

					if ($line[count($line)-1] == $name)
					{
						if ($line[0])
						{
							echo ' [' . $line[1] . '] ';
							echo ' ' . $line[0] . ' ';
							echo " pour " . $line[2];
							echo "<br/>";
						}
					}
				}
			}

			if ($_SESSION["loggued_on_user"])
			{
				findOldCommand($_SESSION["loggued_on_user"]);
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
	</body>
</html>
