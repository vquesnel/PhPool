<?PHP
session_start();
include ("auth.php");
/*
Recupere les variable post login et password
Hash le mots de passe
Test a l'aide de auth.php si le login et le mdp existe et sont juste
Si tout est ok index.php passe en mode conection
Sinon index.php affichera un message d'erreur
*/
//function login($login, $password)
//{
//echo "login.php".$login.$password."\n";

if ($_POST['submit'] == 'Enter')
{
	if ($_POST['conection_login'] != NULL && $_POST['conection_passwd'] != NULL)    //    $_POST['conection_passwd']
	{
		$pasword = hash('whirlpool', $_POST['conection_passwd']);
		$login = $_POST['conection_login'];
		if (auth($login, $pasword) == TRUE)
		{
			setcookie("id", $login, time() + 3600);
			setcookie("pass", $pasword, time() + 3600);
			$_SESSION['login'] = $login;
			$_SESSION['log'] = "YES";
			$add = './private/passwd';
			$tab = unserialize(file_get_contents($add));
			foreach ($tab as $elem)
			{
				if ($elem['login'] == $_SESSION['login'])
				{
					$_SESSION['admin'] = $elem['admin'];
					break;
				}
			}
			header('Location:index.php');
			exit();
		}
		else
		{
			$_SESSION['test'] = 4;
			header('Location:create_account.php');
			exit();
		}
	}
	else
	{
		$_SESSION['test'] = 3;
		header('Location:create_account.php');
		exit();
	}
}
?>
