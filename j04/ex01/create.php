<?php
if ($_POST['login'] !== "" && $_POST['passwd'] !== "")
{
	if ($_POST['submit'] == "OK")
	{
		$hashpwd = hash('whirlpool', $_POST['passwd']);
		if (file_exists("../private") === FALSE)
			mkdir("../private", 0777);
		if (file_exists("../private/passwd") === FALSE)
		{
			$array = array(array('login' => $_POST['login'], 'passwd' => $hashpwd));
			$serial = serialize($array);
			file_put_contents("../private/passwd", $serial);
		}
		else
		{
			$base = file_get_contents("../private/passwd");
			$baseunserialized = unserialize($base);
			foreach ($baseunserialized as $elem)
			{
				if ($elem['login'] == $_POST['login'])
				{
					echo "ERROR\n";
					exit (0);
				}
			}
			$test[] = array('login'=>$_POST['login'], 'passwd'=> $pwd);
			$toadd = serialize($test);
			file_put_contents("../private/passwd", $toadd);
		}
		echo "OK\n";
	}
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";
?>
