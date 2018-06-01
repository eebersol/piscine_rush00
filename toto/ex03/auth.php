<?php
function auth($login, $passwd)
{
	$passwd = hash('whirlpool', $passwd);
	if (!file_exists("../private/passwd"))
		return FALSE;
	$array = file_get_contents("../private/passwd");
	$test = unserialize($array);
	for($i = 0; $i < count($test); $i++)
	{
		if (($itsok = array_search($login, $test[$i])) !== FALSE)
		{
			if ($passwd == $test[$i]['passwd'])
				return TRUE;
		}
	}
	return FALSE;
}
?>