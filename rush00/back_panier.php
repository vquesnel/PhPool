<?php
session_start();
if ($_POST['submit'] == "Reserver")
{
	if (!empty($_POST['passager']) && (is_numeric($_POST['passager']) && ($_POST['passager'] > 0)))
	{
		$date = date("Y-m-d");
		if ($_POST['depart'] >= $date)
		{
			if ($_POST['retour'] > $_POST['depart'])
			{
				if (!empty($_SESSION['login']))
				{
					$tab = array('login' => $_SESSION['login'] , 'ville' => $_SESSION['ville'], 'passager' => $_POST['passager'], 'depart' => $_POST['depart'], 'retour' => $_POST['retour']);
					$add = './commande.csv';
					file_put_contents($add, "", FILE_APPEND);
					if (file_get_contents($add) != FALSE)
					{
						$r32 = unserialize(file_get_contents($add));
						$r32 []= $tab;
					}
					else
						$r32 = array($tab);
					$titi = serialize($r32);
					file_put_contents($add, $titi);
				}
				else
					$_SESSION['panier'][] = array('ville' => $_SESSION['ville'], 'passager' => $_POST['passager'], 'depart' => $_POST['depart'], 'retour' => $_POST['retour']);
				header('Location:panier.php');
  				exit();
			}
			else
				$_SESSION['index'] = 3;
		}
		else
			$_SESSION['index'] = 2;
	}
	else
		$_SESSION['index'] = 1;
	header('Location:pagetest.php');
  	exit();
}
?>
