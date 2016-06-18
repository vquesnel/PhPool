<?PHP
session_start();
if (isset($_GET['submit']) && $_GET['submit'] === "OK")
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
?>
<html><body>
<form method="get" action="index.php">
	Identifiant: <input type="text" name="login" value ="<?PHP
	if (isset($_SESSION['login']))
	echo $_SESSION['login'];
	else
	echo "";?>" />
	<br />
	Mot de passe: <input type="password" name="passwd" value="<?PHP
	if (isset($_SESSION['passwd']))
		echo $_SESSION['passwd'];
	else
		echo "";?>" />
		<input type="submit" name="submit" value="OK">
</form>
</body></html>

