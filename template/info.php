<?php
session_start();
function get_user_info($login)
{
	$array = file_get_contents("../private/users");
	$test = unserialize($array);
	$user = [];
	for ($i = 0; $i < count($test); $i++)
	{
		if(isset($test[$i]['mail']))
		{
			if ($login == $test[$i]['mail'])
			{

				$user[0] = $login;
				$user[1] = $test[$i]['firstname'];
				$user[2] = $test[$i]['lastname'];
				$user[3] = $test[$i]['postal_code'];
				$user[4] = $test[$i]['city'];
				$user[5] = $test[$i]['phone'];
				echo "
					<div class=\"form\">
							<h3>Mes informations : </h3>
							<div class=\"labele\">
							<label for=\"email\">E-mail  			: </label><b>$user[0]</b><br>
							<label for=\"fname\">Prénom 			: </label><b>$user[1]</b><br>
							<label for=\"lname\">Nom 				: </label><b>$user[2]</b><br>
							<label for=\"postal_code\">Code postal 	: </label><b>$user[3]</b><br>
							<label for=\"city\">Ville 				: </label><b>$user[4]</b><br>
							<label for=\"phone\">Telephone 			: </label><b>$user[5]</b><br>
							<br/>
							<a href='http://localhost:8100/index.php'>Back to main page</a>
							</div>
					</div>";
				return ($user);
			}
		}
	}
	return (NULL);
}

$tab = get_user_info($_SESSION['loggued_on_user']);

?>
