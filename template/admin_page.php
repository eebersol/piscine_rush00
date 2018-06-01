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
{
	echo "<a class='format'> Connected as: " . $_SESSION['loggued_on_user'] . "</a>";
	echo "<br/>";
	echo "<br/>";
	echo "<a class='format' href='../controllers/passwd_modif.php'> Modifier mot de passe</a>";
	echo "<br/>";
	if ($_SESSION['admin'])
	{
		echo "<a class='format' href='../template/admin_page.php'>Admin Page</a>";
	}
}
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
				<h2 class="adpage">ADMIN PAGE</h2>
				<a href="../template/form_admin.php">CREER UN COMPTE ADMINISTRATEUR</a>
				<br/>
				<a href="../template/delete_who.php">EFFACER UN COMPTE</a>
				<br/>
				<br/>
				<a href="../template/form_register.php">AJOUTER UN MEMBRE</a>
				<br/>
				<a href="../template/delete_who.php">SUPPRIMER UN MEMBRE</a>
				<br/>
				<a href="../template/form_admin_modif_user.php">MODIFIER UN MEMBRE</a>			
				<br/>
				<br/>
				<a href="../template/form_add_product.php">AJOUTER UN ARTICLE</a>
				<br/>
				<a href="../template/form_modif_article.php">MODIFIER UN ARTICLE</a>
				<br/>
				<a href="../template/delete_article.php">SUPPRIMER UN ARTICLE</a>
				<br/>
				<br/>
				<a href="../template/form_add_basket.php">AJOUTER UNE COMMANDE</a>
				<br/>
				<a href="../template/form_modif_basket.php">MODIFIER UNE COMMANDE</a>
				<br/>
				<a href="../template/form_delete_basket.php">SUPPRIMER UNE COMMANDE</a>
				<br/>
		</div>
		<div id="right">
			<img id="login" src="http://i.imgur.com/AGYWsSC.png" title="login" alt="login"/>
			<a href="../template/form_register.php">
				<img id="register" src="http://i.imgur.com/vD1q0ZT.png" title="register" alt="register"/>
			</a>
			<img id="basket" src="http://i.imgur.com/QwCafH4.png" title="basket" alt="basket"/>
		</div>
	</body>
</html>
