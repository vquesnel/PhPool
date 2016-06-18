<?PHP
session_start();
include ('check_cat.php');

if ($_POST['submite'] == 'Create')
{
	if (!empty($_POST['categorie']) && !empty($_POST['name']) && !empty($_POST['prix']) && !empty($_POST['descc']) && !empty($_POST['descl']) && !empty($_POST['photo'])  && !empty($_POST['minute'])  && !empty($_POST['Promo']))
	{
		if (check_cat($_POST['categorie']) == 1)
		{
			$add = './product.csv';
			$tab = array('name' => $_POST['name'], 'categorie' => $_POST['categorie'],'prix' => $_POST['prix'], 'descc' => $_POST['descc'], 'descl' => $_POST['descl'], 'photo' => $_POST['photo'], 'minute' =>$_POST['minute'], 'promo' => $_POST['Promo']);
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
					$_SESSION['index'] = 3;
					header('Location:74161.php');
					exit();
				}
			}
			else
				$r32  = array($tab);
			$titi = serialize($r32);
			file_put_contents($add, $titi);
			$_SESSION['index'] = 4;
			header('Location:74161.php');
			exit();
		}
		else
		{
			$_SESSION['index'] = 2;
			header('Location:74161.php');
			exit();
		}
	}
	else
	{
		$_SESSION['index'] = 1;
		header('Location:74161.php');
		exit();
	}
}


?>
