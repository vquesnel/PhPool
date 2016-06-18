<?php

session_start();
if ($_POST['submite'] == 'Supprimer')
{

	if (!empty($_POST['name']))
	{
		$add = './product.csv';
		$tab = unserialize(file_get_contents($add));
		$i = 0;
		while ($tab[$i] !== NULL)
		{
			if ($tab[$i]['name'] == $_POST['name'])
				break;
			$i++;
		}
		if ($tab[$i] == NULL)
		{
			$_SESSION['index'] = 6;
			header('Location:74161.php');
  			exit();
		}
		unset($tab[$i]);
		$tab = array_values($tab);
		$titi = serialize($tab);
		file_put_contents($add, $titi);

		$_SESSION['index'] = 5;
		header('Location:74161.php');
		exit();
	}
	else
	{
		$_SESSION['index'] = 1;
		header('Location:74161.php');
		exit();
	}
}



?>
