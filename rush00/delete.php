<?PHP
session_start();

if ($_POST['submite'] == "Supprimer")
{
	if (!empty($_POST['mdp']) && !empty($_POST['mdp2']) && $_POST['submite'] == 'Supprimer')
	{

		if ($_POST['mdp'] == $_POST['mdp2'])
		{
			$mdp = hash('whirlpool', $_POST['mdp']);
			$new = array('login' => $_SESSION['login'], 'mdp' => $mdp);
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
				$_SESSION['index'] = 3;
				header('Location:compte.php');
  				exit();

			}
			else
			{
				unset($tab[$i]);
				$tab = array_values($tab);
				$titi = serialize($tab);
				file_put_contents($add, $titi);
				header('Location:delog.php');
  				exit();
  			}
		}
		else
		{
			$_SESSION['index'] = 1;
			header('Location:compte.php');
  			exit();
		}
	}
	else
	{
		$_SESSION['index'] = 2;
		header('Location:compte.php');
  		exit();
	}
}

?>
