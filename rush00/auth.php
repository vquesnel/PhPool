<?PHP
session_start();
/*
	La fonction auth recoit un login et un mdp hasher
	elle check si le fichier contenant les password existe
	si il existe pas return false
	si il existe elle recupere le fichier
	elle check les identifiant e retourne false ou true
	en fonction de la concordance des identifiant recu en parametre\
	et de ce dans le fichier
*/
function auth($login, $passwd)
{
	//echo "auth.php".$login.$passwd."\n";
	$add = './private/passwd';
	$i = 0;
	if (!is_file($add))
		return FALSE;
	$tab = unserialize(file_get_contents($add));
	foreach ($tab as $elem)
	{
		if ($elem['login'] == $login)
		{
			if ($elem['passwd'] == $passwd)
				$i = 1;
		}
	}
	if ($i == 1)
		return TRUE;
	return FALSE;
}
?>
