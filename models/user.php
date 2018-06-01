<?php

function get_user($mail) {

	if (!file_exists("../private"))
		mkdir("../private", 0777, true);

	if (!file_exists("../private/users"))
		touch("../private/users", 0777, true);

	$users = file_get_contents('../private/users');
	$users = unserialize($users);
	if ($users != "")
	{	
		foreach ($users as  $user) {
			if ($users['mail'] == $mail) {
				return $user;
			}
		}
	}
	return null;
}

function login($mail, $password) {

	$user = get_user($mail);

	if ($user == null) {
		throw new Exception('LOGIN_FAILED');
		return false;		
	}

	if ($user["password"] != hash('whirlpool', $password)) {
		throw new Exception('LOGIN_FAILED');
		return false;		
	}
	return true;
}

function create_user($user) {
	//check if user exists
	if (get_user($user['mail']) != null) {
		throw new Exception('USER_EXISTS');
		return false;		
	}

	$user["password"] = hash('whirlpool', $user['password']);

	$users = unserialize(file_get_contents('../private/users'));
	$users[] = $user;
	file_put_contents("../private/users", serialize($users));

	return true;
}

function delete_user($user)
{
	$users = file_get_contents("../private/users");
	$users = unserialize($users);
	for ($i = 0; $i < count($users); ++$i)
	{
		if (isset($users[$i]['mail']))
		{
			if ($users[$i]['mail'] == $user)
			{
				$users[$i] = "";
				file_put_contents("../private/users", serialize($users));
				return true;
			}
		}
	}
	return false;
}
?>
