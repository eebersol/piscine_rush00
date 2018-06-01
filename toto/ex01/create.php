<?PHP
$ok = false;
if ($_POST['submit'] == 'OK' && $_POST['login'] && $_POST['passwd'])
{
	$ok = true;
	if (!file_exists("../private"))
	{
		mkdir("../private", 0777);
	}
	else
	{
		if (file_exists("../private/passwd"))
		{
			$all_accounts = unserialize(file_get_contents("../private/passwd"));
			foreach ($all_accounts as $account)
			{
				if ($account['login'] == $_POST['login'])
				{
					$ok = false;
					break;
				}
			}
		}
	}
	if ($ok)
	{
		$all_accounts[] = array('login' => $_POST['login'], 'passwd' => hash("whirlpool", $_POST['passwd']));
		$serdb = serialize($all_accounts);
		file_put_contents("../private/passwd", $serdb);
	}
}
echo ($ok == true) ? "OK\n" : "ERROR\n";
?>