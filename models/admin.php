<?php

function get_admin($login) {

	if (!file_exists("../private"))
		mkdir("../private", 0777, true);

	if (!file_exists("../private/admins"))
		touch("../private/admins", 0777, true);

	$admins = array(unserialize(file_get_contents('../private/admins')));
	if ($admins != "")
	{	
		foreach ($admins as  $admin) {
			if ($admin['login'] == $login) {
				return $admin;
			}
		}
	}
	return null;
}

function login_admin($login, $password) {

	$admin = get_admin($login);

	if ($admin == null) {
		throw new Exception('LOGIN_FAILED');
		return false;		
	}

	if ($admin["password"] != hash('whirlpool', $password)) {
		throw new Exception('LOGIN_FAILED');
		return false;		
	}
	return true;
}

function create_admin($admin) {
	//check if admin exists
	if (get_admin($admin['login']) != null) {
		throw new Exception('admin_EXISTS');
		return false;		
	}

	$admin["password"] = hash('whirlpool', $admin['password']);

	$admins = unserialize(file_get_contents('../private/admins'));
	$admins[] = $admin;
	file_put_contents("../private/admins", serialize($admins));

	return true;
}

function delete_admin($admin)
{
	if ($admin != "admin")
	{
		$admins = file_get_contents("../private/admins");
		$admins = unserialize($admins);
		for ($i = 0; $i < count($admins); ++$i)
		{
			if (isset($admins[$i]['login']))
			{
				if ($admins[$i]['login'] == $admin)
				{
					$admins[$i] = "";
					file_put_contents("../private/admins", serialize($admins));
					return true;
				}
			}
		}
	}
	return false;
}
?>
