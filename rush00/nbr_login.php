<?PHP
session_start();
function nbr_login()
{
	$add = './private/passwd';
	file_put_contents($add, "", FILE_APPEND);
	if (file_get_contents($add) != FALSE)
	{
		$r32 = unserialize(file_get_contents($add));
		$i = 0;
		while ($r32[$i] != NULL)
			$i++;
		return $i;
	}
	else
		return ('0');
}
?>
