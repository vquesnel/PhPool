<?PHP
session_start();

include ("login.php");
include ("testpassword.php");

require('captcha.php');
/*
	Attention : gerer les droits quand on fait un file_put_contents
	Ce fichier va verifier si le login existe ou pas et si le fichier
	existe ou pas puis va crer un nouvelle utilisateur

	Probleme a regler : Affichage des div pour la gestion d'erreur
	trouver un moyen de faire plus propre ou de placer les div avec du css

	Type de login accepter = [a-z] [A-Z] [ _ ] -> minimum 4 caractere et maxi 16
	Type de mots de passe = au minimum [a-z][A-Z][0-9] ->minimum 6 caractere maxi 32
 */
?>
<!DOCTYPE html>
<html>
<head>
	<title>Connection</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="bloc_page">
		<header>
		<a href="index.php" style="color: #000000; text-decoration:none;">
				<div id="titre">
					<div id="logo">
						<img src="img/logo.png" alt="Logo de Voyageons">
						<h1>Voyageons</h1>
					</div>
					<h2 id="toyo">SITE DE VOYAGE</h2>
				</div>
			</a>

					<nav>
				<ul>
					<li><a href="index.php">Accueil</a></li>
					<li><a href="derniereminute.php">Dernière minute</a></li>
					<li><a href="sejour.php">Séjour</a></li>
					<li><a href="promo.php">Promo</a></li>
				</ul>
			</nav>
		</header>
	</div>
	<hr color="black"/>
	<section>
		<div id="connection">
			<table style="margin: auto">
				<caption><p class="conne">Connection</p></caption>
				<form method="post" action="login.php">
				<tr><td>&nbsp</td></tr>
				<tr><td>&nbsp</td></tr>
				<tr>
					<td><label for="pseudo">Votre pseudo :</label></td>
					<td><input type="text" name="conection_login"/></td>
				</tr>
				<tr><td>&nbsp</td></tr>
				<tr>
					<td><label for="pass">Votre mot de passe :</label></td>
					<td><input type="password" name="conection_passwd"/></td>
				</tr>
				<tr><td>&nbsp</td></tr>
			</table>
			<br />
			<input style="border-radius: 3px; border-style: solid; background-color: rgb(238,238,238);width: 100px;height: 25px " type="submit" name="submit" value="Enter" />
			</form>
		</div>
		<div id="inscription">
			<table style="margin: auto">
				<caption><p class="conne">Inscription</p></caption>
				<form method="post" action="create_account.php">
				<tr><td>&nbsp</td></tr>
				<tr>
					<td><label for="pseudo">Votre pseudo :</label></td>
					<td><input type="text" name="new_login" /></td>
				</tr>
				<tr>
					<td><label for="pass">Mot de passe :</label></td>
					<td><input type="password" name="new_passwd" /></td>
				</tr>
				<tr>
					<td><label for="pass">Confimer mot de passe :</label></td>
					<td><input type="password" name="new_confirm_passwd" /></td>
				</tr>
				<tr>
					<td><label for="mail">Adresse mail :</label></td>
					<td><input type="text" name="mail" /></td>
				</tr>
				<tr>
					<td><label for="mail">Date de naissance :</label></td>
					<td><input type="date" name="date"></code></td>
				</tr>
				<tr>
					<td><label for="captcha">Recopiez le mot : "<?PHP echo captcha(); ?>"</label></td>
					<input type="hidden" name="base_captcha" value=<?PHP echo '"'.$_SESSION['captcha'].'"' ?> />
					<td><input type="text" name="captcha" id="captcha" /></td>
				</tr>
			</table>
			<br />
			<input style="border-radius: 3px; border-style: solid; background-color: rgb(238,238,238);width: 100px;height: 25px "type="submit" name="submite" value="Inscription" />
			</form>
		</div>
	</section>
<?PHP
if ($_POST['submite'] == 'Inscription')
{
	if ($_POST['captcha'] != NULL && $_POST['new_login'] != NULL && $_POST['new_passwd'] != NULL && $_POST['new_confirm_passwd'] != NULL && $_POST['mail'] != NULL && $_POST['date'] != NULL &&$_POST['submite'] == 'Inscription')
	{
		if (isset($_POST['base_captcha']) && !empty($_POST['base_captcha']) && $_POST['captcha'] == $_POST['base_captcha'])
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
								$tab = array('login' => $_POST['new_login'], 'passwd' => $pasword, 'date' => $_POST['date'], 'mail' => $_POST['mail'], 'admin' => 0);
								if (file_exists("./private") === FALSE)
									mkdir("./private");
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
									echo '<div class="ntm"><p><img src="img/valider.png" alt="Logo attention">Votre compte à été creer avec succes</p></div>';
								}
								else
									echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Login déjà existant</p></div>';
															}
							else
								echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Mot de passe trop faible</p></div>';
						}
						else
							echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Date de naissance invalide</p></div>';
					}
					else
						echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Adresse mail invalide</p></div>';
				}
				else
					echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Mots de passe invalide</p></div>';
			}
			else
				echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Login invalide</p></div>';
		}
		else
			echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Captcha invalide</p></div>';
	}
	else
		echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Champ non renseigné</p></div>';
}
if ($_SESSION['test'] == 3)
{
	echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Les champs sont vide</p></div>';
	unset($_SESSION['test']);
}
if ($_SESSION['test'] == 4)
{
	echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Votre compte n\'existe pas ou votre mot de passe est erroné</p></div>';
	unset($_SESSION['test']);
}
?>
</body>
</html>
