<?PHP
session_start();

if ($_POST['submite'] == 'Supprimer')
{

	if (!empty($_POST['name']))
	{
		$add = './categorie.csv';
		$tab = unserialize(file_get_contents($add));
		$i = 0;
		while ($tab[$i] != NULL)
		{
			if ($tab[$i]['name'] == $_POST['name'])
				break;
			$i++;
		}
		if ($tab[$i] == NULL)
		{
			$_SESSION['index'] = 4;
			header('Location:74162.php');
  			exit();
		}
		unset($tab[$i]);
		$tab = array_values($tab);
		$titi = serialize($tab);
		file_put_contents($add, $titi);

		$_SESSION['index'] = 3;
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
