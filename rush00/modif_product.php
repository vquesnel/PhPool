<?php
session_start();

if ($_POST['submite'] == 'Modifier')
{
	if (!empty($_POST['name']))
	{
		$add = './product.csv';
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
			$_SESSION['index'] = 6;
			header('Location:74161.php');
  			exit();

		}
		$new = array('name' => $_POST['name'], 'categorie' => $tab[$i]['categorie'],'prix' => $tab[$i]['prix'], 'descc' => $tab[$i]['descc'], 'descl' => $tab[$i]['descl'], 'photo' => $tab[$i]['photo'], 'promo' => $tab[$i]['promo'], 'minute' => $tab[$i]['minute']);
		unset($tab[$i]);
		$tab = array_values($tab);
		if (!empty($_POST['new_name']))
		{
			$new['name'] = $_POST['new_name'];
		}
		if (!empty($_POST['new_cat']))
		{
			$new['categorie'] = $_POST['new_cat'];
		}
		if (!empty($_POST['new_prix']))
		{
			$new['prix'] = $_POST['new_prix'];
		}
		if (!empty($_POST['Promo']))
		{
			$new['promo'] = $_POST['Promo'];
		}
		if (!empty($_POST['minute']))
		{
			$new['minute'] = $_POST['minute'];
		}
		if (!empty($_POST['new_descc']))
		{
			$new['descc'] = $_POST['new_descc'];
		}
		if (!empty($_POST['new_descl']))
		{
			$new['descl'] = $_POST['new_descl'];
		}
		if (!empty($_POST['new_photo']))
		{
			$new['photo'] = $_POST['new_photo'];
		}
		$tab[] = $new;
		$titi = serialize($tab);
		file_put_contents($add, $titi);
		$_SESSION['index'] = 8;
		header('Location:74161.php');
  		exit();

	}
	else
	{
		$_SESSION['index'] = 7;
		header('Location:74161.php');
  		exit();
	}
}








?>
