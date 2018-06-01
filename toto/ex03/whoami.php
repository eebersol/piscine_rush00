<?php
session_start();

if (isset($_SESSION['loggued_on_user']))
{
	$array = $_SESSION['loggued_on_user'];

	if (isset($array['login']))
	{
		echo $array['login'];
		echo "\n";
	}
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";
?>