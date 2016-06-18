<?PHP
session_start();

if ($_POST['submite'] == 'Create')
{
	if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['photo']) )
	{

		$add = './categorie.csv';
		$tab = array('name' => $_POST['name'], 'desc' => $_POST['description'] , 'photo' => $_POST['photo']);
		file_put_contents($add, "", FILE_APPEND);
		if (file_get_contents($add) !== FALSE)
		{
			$r32 = unserialize(file_get_contents($add));
			foreach ($r32 as $elem)
			{
				if ($elem['name'] == $_POST['name'])
					$i = 1;
			}
			if ($i == 0)
				$r32[] = $tab;
			else
			{
				$_SESSION['index'] = 5;
				header('Location:74162.php');
				exit();
			}
		}
		else
			$r32  = array($tab);
		$titi = serialize($r32);
		file_put_contents($add, $titi);
		$_SESSION['index'] = 1;
		header('Location:74162.php');
		exit();
	}
	else
	{
		$_SESSION['index'] = 2;
		header('Location:74162.php');
		exit();
	}
}


?>
