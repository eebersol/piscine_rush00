<?php
session_start();

function createPanier()
{
	if (!isset($_SESSION['panier'])){
		$_SESSION['panier'] = array();
		$_SESSION['panier']['libelleProduit'] = array();
		$_SESSION['panier']['qteProduit'] = array();
		$_SESSION['panier']['prixProduit'] = array();
	}
	return true;
}

function addArticle($libelleProduit, $qteProduit, $prixProduit)
{
	if (createPanier())
	{
		if (isset($_SESSION['panier']['libelleProduit']))
			$positionProduit = array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);
		if ($positionProduit !== false)
		{
			$_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
		}
		else
		{
			array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
			array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
			array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
		}
		return true;
	}
	else
		echo "Un problème est survenu veuillez contacter l'administrateur du site.";
	return false;
}

function delArticle($libelleProduit)
{
	if (createPanier())
	{

		$tmp = array();
		$tmp['libelleProduit'] = array();
		$tmp['qteProduit'] = array();
		$tmp['prixProduit'] = array();

		for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
		{
			if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
			{
				array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
				array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
				array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
			}

		}
		$_SESSION['panier'] =  $tmp;
		unset($tmp);
	}
	else
		echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function modifyQte($libelleProduit, $action)
{
	if (createPanier())
	{
		for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
		{
			if ($_SESSION['panier']['libelleProduit'][$i] == $libelleProduit)
			{
				if ($action == "less")
					--$_SESSION['panier']['qteProduit'][$i];
				else if ($action == "more")
					++$_SESSION['panier']['qteProduit'][$i];
				if ($_SESSION['panier']['qteProduit'][$i] <= 0)
					delArticle($_SESSION['panier']['libelleProduit'][$i]);
			}
		}
	}
	else
		echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function toto(){
	echo"hello\n";
}

function numberarticle()
{
	if (isset($_SESSION['panier']))
		return count($_SESSION['panier']['libelleProduit']);
	else
		return 0;
}

if ($_POST['quantite'] == 0)
	$_POST['quantite'] = 1;

if ($_GET['action'] == "addArticle")
{
	if (addArticle($_GET['name'], $_POST['quantite'], $_GET['price']))
	{
		echo $_GET['name'] ." added";
		echo "<br/>";
	}
}
else if ($_GET['action'] == "delArticle")
	delArticle($_GET['name']);
else if ($_GET['action'] == "modifyQteLess")
	modifyQte($_GET['name'], "less");
else if ($_GET['action'] == "modifyQteMore")
	modifyQte($_GET['name'], "more");
print("<a href='http://localhost:8100/template/basket.php'>Back to basket</a>");
?>
