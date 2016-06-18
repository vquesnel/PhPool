<?PHP

session_start();
include ("testpassword.php");

if ($_POST['submite'] == 'Inscription')
{
	if ($_POST['admin'] != NULL && $_POST['new_login'] != NULL && $_POST['new_passwd'] != NULL && $_POST['new_confirm_passwd'] != NULL && $_POST['mail'] != NULL && $_POST['date'] != NULL &&$_POST['submite'] == 'Inscription')
	{
		if (preg_match("#^[\w+]{4,16}$#",$_POST['new_login']))
		{
			if ($_POST['new_passwd'] == $_POST['new_confirm_passwd'])
			{
				if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']))
				{
					$date =date("Y-m-d");
					if ($_POST['date'] < $date)
					{
						if (testpassword($_POST['new_passwd']))
						{
							$i = 0;
							$pasword = hash('whirlpool', $_POST['new_passwd']);
							$tab = array('login' => $_POST['new_login'], 'passwd' => $pasword, 'date' => $_POST['date'], 'mail' => $_POST['mail'], 'admin' => $_POST['admin']);
							$add = './private/passwd';
							file_put_contents($add, "", FILE_APPEND);
							if (file_get_contents($add) != FALSE)
							{
								$r32 = unserialize(file_get_contents($add));
								foreach ($r32 as $elem)
								{
									if ($elem['login'] == $tab['login'])
										$i = 1;
								}
								if ($i == 0)
									$r32 []= $tab;
								else
									$i = 9;
							}
							else
								$r32 = array($tab);
							if ($i != 9)
							{
								$titi = serialize($r32);
								file_put_contents($add, $titi);
								$_SESSION['index'] = 1;
								header('Location:74163.php');
  								exit();
							}
							else
								$_SESSION['index'] = 2;
						}
						else
							$_SESSION['index'] = 3;
					}
					else
						$_SESSION['index'] = 4;
				}
				else
					$_SESSION['index'] = 5;
			}
			else
				$_SESSION['index'] = 6;
		}
		else
			$_SESSION['index'] = 7;
	}
	else
		$_SESSION['index'] = 7;
	header('Location:74163.php');
  	exit();
}


?>
