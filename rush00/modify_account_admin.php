<?PHP
session_start();
include ("testpassword.php");
if ($_POST['submite'] == "Modifier")
{
	if (!empty($_POST['login']))
	{
		$add = './private/passwd';
		$tab = unserialize(file_get_contents($add));
		$i = 0;
		while ($tab[$i] != NULL)
		{
			if ($tab[$i]['login'] == $_POST['login'])
				break;
			$i++;
		}
		if ($tab[$i] == NULL)
		{
			$_SESSION['index'] = 7;
			header('Location:74163.php');
  			exit();

		}
		$new =  array('login' => $_POST['login'], 'passwd' =>$tab[$i]['passwd'] ,'date' => $tab[$i]['date'], 'mail' => $tab[$i]['mail'], 'admin' => $tab[$i]['admin']);
		unset($tab[$i]);
		$tab = array_values($tab);
		if (!empty($_POST['date']))
		{
			$date =date("Y-m-d");
			if ($_POST['date'] < $date)
				$new['date'] = $_POST['date'];
			else
			{
				$_SESSION['index'] = 4;
				header('Location:74163.php');
  				exit();
			}
		}
		if (!empty($_POST['passwd']) && !empty($_POST['confirm_passwd']) && $_POST['passwd'] == $_POST['confirm_passwd'])
		{
			if (testpassword($_POST['new_passwd']))
			{
				$mdp = hash('whirlpool', $_POST['passwd']);
				$new['passwd'] = $mdp;
			}
			else
			{
				$_SESSION['index'] = 3;
				header('Location:74163.php');
  				exit();
			}
		}
		else if (!empty($_POST['passwd']) || !empty($_POST['confirm_passwd']))
		{
			$_SESSION['index'] = 6;
			header('Location:74163.php');
  			exit();
		}
		if (!empty($_POST['mail']) && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']))
		{
			$new['mail'] = $_POST['mail'];
		}
		else if (!empty($_POST['mail']))
		{
			$_SESSION['index'] = 5;
			header('Location:74163.php');
  			exit();
		}
		if (!empty($_POST['admin']))
		{
			$new['admin'] = $_POST['admin'];
		}
		$tab[] = $new;
		$titi = serialize($tab);
		file_put_contents($add, $titi);
		$_SESSION['index'] = 10;
		header('Location:74163.php');
  		exit();
	}
	else
	{
		//echo "10".$tab[$i]['date'];
		$_SESSION['index'] = 7;
		header('Location:74163.php');
  		exit();
	}
}

?>
