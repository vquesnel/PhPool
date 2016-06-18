<?PHP
session_start();

if ($_POST['submite'] == "Supprimer")
{
	if (!empty($_POST['login']) && !empty($_POST['mdp']) && !empty($_POST['mdp2']) && $_POST['submite'] == 'Supprimer')
	{

		if ($_POST['mdp'] == $_POST['mdp2'])
		{
			$mdp = hash('whirlpool', $_POST['mdp']);
			$new = array('login' => $_POST['login'], 'mdp' => $mdp);
			$add = './private/passwd';
			$tab = unserialize(file_get_contents($add));
			$i = 0;
			while ($tab[$i] != NULL)
			{
				if ($tab[$i]['login'] == $new['login'])
					break;
				$i++;
			}
			if ($tab[$i] == NULL)
			{
				$_SESSION['index'] = 7;
				header('Location:74163.php');
  				exit();

			}
			else
			{
				unset($tab[$i]);
				$tab = array_values($tab);
				$titi = serialize($tab);
				file_put_contents($add, $titi);
				$_SESSION['index'] = 9;
				header('Location:74163.php');
  				exit();
  			}
		}
		else
		{
			$_SESSION['index'] = 6;
			header('Location:74163.php');
  			exit();
		}
	}
	else
	{
		$_SESSION['index'] = 8;
		header('Location:74163.php');
  		exit();
	}
}

?>
