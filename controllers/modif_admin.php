<?php
include "../models/admin.php";
session_start();

$success_register = NULL;
if (!isset($_POST['mail']) || !preg_match("/^.+@.+\..+$/", $_POST['mail']))
{
	$error_register = "Invalid mail format.";
}
if (!isset($_POST['lname']) || strlen($_POST['lname']) < 3)
{
	$error_register = "Last name to short. 3 chars minimum.";
}
else if (!isset($_POST['fname']) || strlen($_POST['fname']) < 3)
{
	$error_register = "First name to short. 3 chars minimum.";
}
else if (!isset($_POST['passwd']) || strlen($_POST['passwd']) < 3)
{
	$error_register = "Password to short. 3 chars minimum.";
}
else if (!isset($_POST['postal_code']) || strlen($_POST['postal_code']) < 5 || !is_numeric($_POST['postal_code']))
{
	$error_register = "Invalid postal code.";
}
else if (!isset($_POST['phone']) || strlen($_POST['phone']) < 5 || !is_numeric($_POST['phone']))
{
	$error_register = "Invalid phone.";
}
else
{
	if ($_SESSION['loggued_on_user'] != "admin")
	{
		delete_admin($_SESSION['loggued_on_user']);
		try
		{
			create_admin([
				'login' => $_SESSION['loggued_on_user'],
				'mail' => $_POST['mail'],
				'password' => $_POST['passwd'],
				'firstname' => $_POST['fname'],
				'lastname' => $_POST['lname'],
				'postal_code' => $_POST['postal_code'],
				'phone' => $_POST['phone'],
				]);
			$success_register = "Admin modified";
		}
		catch (Exception $error)
		{
			$error_register = "Failed to modify Admin infos.";
		}
	}
}

print $error_register;
if ($success_register)
{
	print($success_register);
	print("<br/>");
}
print("<a href='http://localhost:8100/index.php'>Back to main page</a>");
