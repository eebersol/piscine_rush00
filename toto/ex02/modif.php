<?php
if ($_POST['submit'] == 'OK' && $_POST["newpw"] !== "" && file_exists("../private/passwd"))
{
	$login = $_POST["login"];
	$oldpw = hash('whirlpool', $_POST['oldpw']);
	$newpw = hash('whirlpool', $_POST['newpw']);
	$array = file_get_contents("../private/passwd");
	$db_content = unserialize($array);
	for($i = 0; $i < count($db_content); $i++)
	{
		if (($itok = array_search($login, $db_content[$i])) !== FALSE)
		{
			if ($oldpw == $db_content[$i]['passwd'])
			{
				$db_content[$i]['passwd'] = $newpw;
				$OK = TRUE;
			}
		}
	}
	if ($OK == TRUE)
	{
		$serialized = serialize($db_content);
		file_put_contents("../private/passwd", $serialized);
		echo "OK\n";
	}
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";
?>