<?PHP
include "../controllers/redirect.php";
session_start();
function auth($login, $passwd)
{
	$pw_hash = hash("whirlpool", $passwd);
	$all_accounts = unserialize(file_get_contents("../private/users"));
	foreach ($all_accounts as $account)
	{
		if ($login == $account['mail'] && $pw_hash == $account['password'])
			return TRUE;
	}
	return FALSE;
}

if (isset($_POST['submit']))
{
	if (!isset($_POST['mail']))
		echo "N'oubliez pas d'écrire votre adresse mail";
	else if (!isset($_POST['passwd']))
		echo "N'oubliez pas d'écrire votre mot de passe";
	else
	{
		$login = $_POST['mail'];
		$passwd = $_POST['passwd'];
		if (auth($login, $passwd) == FALSE)
		{
			echo "Mauvais mail ou mauvais mot de passe, réessayez";
		}
		else
		{
			$_SESSION['loggued_on_user'] = $_POST['mail'];
			$_SESSION['admin'] = false;
			echo "USER LOGGED IN";
			redirect();
		}
	}
}
else
{
	echo "ERROR\n";
}
?>
