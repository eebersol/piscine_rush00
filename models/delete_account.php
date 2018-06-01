<?PHP
include "user.php";
include "admin.php";

if ($_POST['submit'] == "NO")
{
	if (delete_user($_POST['user']))
		echo $_POST['user'] . " DELETED";
	else
		echo "Failed to delete " .  $_POST['user'];
}
else if ($_POST['submit'] == "YES" && $_POST['user'] != "admin")
{
	if (delete_admin($_POST['user']))
		echo $_POST['user'] . " DELETED";
	else
		echo "Failed to delete " .  $_POST['user'];
}
else
	echo "Failed to delete " .  $_POST['user'];
echo "<br/>";
print("<a href='http://localhost:8100/index.php'>Back to main page</a>");

?>
