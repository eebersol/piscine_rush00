<?PHP
include "../models/user.php";
session_start();

if ($_POST['submit'] == "OUI")
{
	if (delete_user($_SESSION['loggued_on_user'], "mail"))
	{
		$_SESSION['loggued_on_user'] = ""; 		// LOGOUT
		echo "USER DELETED";
	}
	else
		echo "USER NOT DELETED";
}
else
	echo "USER NOT DELETED";
echo "<br/>";
print("<a href='http://localhost:8100/index.php'>Back to main page</a>");

?>
