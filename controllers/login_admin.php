<?PHP
include "../controllers/redirect.php";
session_start();
function auth($login, $passwd)
{
	$pw_hash = hash("whirlpool", $passwd);
	if (!file_exists("../private/admins"))
		return FALSE;
	$all_accounts = unserialize(file_get_contents("../private/admins"));
	foreach ($all_accounts as $account)
	{
		if ($login == $account['login'] && $pw_hash == $account['password'])
			return TRUE;
	}
	return FALSE;
}

if (isset($_POST['submit']))
{
	if (!isset($_POST['login']))
		echo "N'oubliez pas d'écrire votre login";
	else if (!isset($_POST['passwd']))
		echo "N'oubliez pas d'écrire votre mot de passe";
	else
	{
		$login = $_POST['login'];
		$passwd = $_POST['passwd'];
		if (auth($login, $passwd) == FALSE)
			echo "Mauvais mail ou mauvais mot de passe, réessayez";
		else
		{
			$_SESSION['loggued_on_user'] = $_POST['login'];
			$_SESSION['admin'] = true;
			echo "ADMIN LOGGED IN";
			redirect();
		}
	}
}
else
{
	echo "ERROR\n";
}
?>
