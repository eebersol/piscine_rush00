<?php
include "../models/user.php";

$success_register = NULL;
if (!isset($_POST['passwd']) || strlen($_POST['passwd']) < 3)
{
	$error_register = "Password to short. 3 chars minimum.";
}
else
{
	$users = file_get_contents("../private/users");
	$users = unserialize($users);
	for ($i = 0; $i < count($users); ++$i)
	{
		if (isset($users[$i]['mail']))
		{
			if ($users[$i]['mail'] == $_POST['oldmail'])
			{
				$users[$i] = "";
				file_put_contents("../private/users", serialize($users));
			}
		}
	}
		try
		{
			create_user([
				'mail' => $_POST['newmail'],
				'password' => $_POST['passwd'],
				'firstname' => $_POST['fname'],
				'lastname' => $_POST['lname'],
				'postal_code' => $_POST['postal_code'],
				'phone' => $_POST['phone'],
			]);
			$success_register = "User modified";
			print($success_register);
			print("<br/>");
		}
		catch (Exception $error)
		{
			$error_register = "Failed to modify.";
				print $error_register;
		}
}

	print("<a href='http://localhost:8100/index.php'>Back to main page</a>");
?>