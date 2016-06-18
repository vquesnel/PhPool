<?PHP
if ($_SERVER['PHP_AUTH_USER'] === "zaz"  && $_SERVER['PHP_AUTH_PW'] === "jaimelespetitsponeys")
{
	$auth = $_SERVER['PHP_AUTH_USER'];
	$pw = $_SERVER['PHP_AUTH_PW'];
	$img = file_get_contents("../img/42.png");
	$file = base64_encode($img);
	echo "<html><body>\nBonjour Zaz<br />\n<img src='data:image/png;base64,$file'>\n</body></html>\n";
}
else
{
	header("HTTP/1.0 401 Unauthorized");
	header("WWW-Authenticate: Basic realm=''Espace membres''");
	header("Connection: close");
	echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
}
?>
