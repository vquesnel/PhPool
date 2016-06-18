<?PHP
if ($_POST['submit'] == "OK")
{
	if ($_POST['newpw'] == "")
		echo "ERROR\n";
	else
	{
		$hasholdpw = hash("whirlpool", $_POST['oldpw']);
		$hashnewpw = hash("whirlpool", $_POST['newpw']);
		$data = unserialize(file_get_contents("../private/passwd"));
		$check = FALSE;
		$i = 0;
		foreach ($data as $elem)
		{
			if ($elem['login'] == $_POST['login'] && $hasholdpw == $elem['passwd'])
			{
				$data[$i]['passwd'] = $hashnewpw;
				$check = TRUE;
			}
			$i++;
		}
		if ($check == TRUE)
		{
			$serial = serialize($data);
			file_put_contents("../private/passwd", $serial);
			echo "OK\n";
		}
		else
			echo "ERROR\n";
	}
}
else
	echo "ERROR\n";
?>
