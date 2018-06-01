<?PHP
session_start();
include "../models/modif_pwd.php";

$success_modif = NULL;
if ($_SESSION['loggued_on_user'])
{
	if (!isset($_POST['newpwd']) || strlen($_POST['newpwd']) < 3)
	{
		$error_modif = "New password to short. 3 chars minimum.";
	}
	else if ($_SESSION['admin'])
	{
		if (modif_pwd_admin(['oldpwd' => $_POST['oldpwd'], 'newpwd' => $_POST['newpwd']]))
		{
			$success_modif = "Admin password modified";
		}
		else
		{
			$error_modif = "Failed to modificate password";
		}
	}
	else
	{
		if (modif_pwd(['oldpwd' => $_POST['oldpwd'], 'newpwd' => $_POST['newpwd']]))
		{
			$success_modif = "Password modified";
		}
		else
		{
			$error_modif = "Failed to modificate password";
		}
	}
}

print $error_modif;
if ($success_modif)
{
	print($success_modif);
}
print("</br>");
print("<a href='http://localhost:8100/index.php'>Back to main page</a>");

?>
