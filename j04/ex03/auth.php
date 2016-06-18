<?php
function auth($login, $passwd)
{
	$data = unserialize(file_get_contents("../private/passwd"));
	$hashpw = hash("whirlpool", $passwd);
	$check = FALSE;
	foreach ($data as $elem)
	{
		if ($elem['login'] == $login && $hashpw == $elem['passwd'])
			$check = TRUE;
	}
	if ($check == TRUE)
		return (TRUE);
	else
		return (FALSE);
}
?>
