<?php

session_start();
if ($_POST['submit'] == 'Modifier')
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
		$new =  array('name' => $_POST['name'], 'desc' =>$tab[$i]['desc'], 'photo' => $tab[$i]['photo']);
		unset($tab[$i]);
		$tab = array_values($tab);
		if (!empty($_POST['name2']))
		{
			$addproduct = './product.csv';
			$tabproduct = unserialize(file_get_contents($addproduct));
			$j = 0;
			while ($tabproduct[$j] != NULL)
			{
				if ($tabproduct[$j]['categorie'] == $_POST['name'])
					$tabproduct[$j]['categorie'] = $_POST['name2'];
				$j++;
			}
			$tab1 = serialize($tabproduct);
			file_put_contents($addproduct, $tab1);
			$new['name'] = $_POST['name2'];
		}
		if (!empty($_POST['description']))
		{
			$new['desc'] = $_POST['description'];
		}
		if (!empty($_POST['photo']))
		{
			$new['photo'] = $_POST['photo'];
		}
		$tab[] = $new;
		$titi = serialize($tab);
		file_put_contents($add, $titi);
		$_SESSION['index'] = 6;
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
