<?PHP
session_start();

function modif_pwd($modif)
{
	$users = unserialize(file_get_contents('../private/users'));
	for ($i = 0; $i < count($users); ++$i)
	{
		if (isset($users[$i]['mail']))
		{
			if ($users[$i]['mail'] == $_SESSION['loggued_on_user'])
			{
				if ($users[$i]['password'] == hash('whirlpool', $modif['oldpwd']))
				{
					$users[$i]['password'] = hash('whirlpool', $modif['newpwd']);
					file_put_contents("../private/users", serialize($users));
					return TRUE;
				}
				return FALSE;
			}
		}
	}
	return FALSE;
}

function modif_pwd_admin($modif)
{
	$admins = unserialize(file_get_contents('../private/admins'));
	for ($i = 0; $i < count($admins); ++$i)
	{
		if (isset($admins[$i]['login']))
		{
			if ($admins[$i]['login'] == $_SESSION['loggued_on_user'])
			{
				if ($admins[$i]['password'] == hash('whirlpool', $modif['oldpwd']))
				{
					$admins[$i]['password'] = hash('whirlpool', $modif['newpwd']);
					file_put_contents("../private/admins", serialize($admins));
					return TRUE;
				}
				return FALSE;
			}
		}
	}
	return FALSE;
}

?>
