<?PHP
session_start();
include ('delete.php');
include ("testpassword.php");
/*
	Acces a son compte client
	Gestion des identifiants
	changement de mdp
	deconection
	suppression de son compte
 */
if (empty($_SESSION['login']))
{
	header('Location:index.php');
	exit();
}
if ($_SESSION['admin'] && $_SESSION['admin'] == 1)
{
	header('Location:74160.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mon compte</title>
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
					<li><a href="allproducts.php">Tout</a></li>
					<li><a href="derniereminute.php">Dernière minute</a></li>
					<li><a href="promo.php">Promo</a></li>
					<li><a href="panier.php">Panier</a></li>
					<li><a href="sejour.php">Séjour</a></li>
					<li><a href="delog.php">Deconnection</a></li>
				</ul>
			</nav>

		</header>
	</div>
	<hr color="black"/>

<section>

	<div id="connection">
			<table style="margin: auto">
				<caption><p class="conne">Supprimer votre compte</p></caption>
				<form method="post" action="delete.php">
				<tr><td>&nbsp</td></tr>

				<tr>
					<td><label for="psw">Votre mot de passe :</label></td>
					<td><input type="password" name="mdp"/></td>
				</tr>
				<tr><td>&nbsp</td></tr>
				<tr>
					<td><label for="pass">Confirmer votre mot de passe :</label></td>
					<td><input type="password" name="mdp2"/></td>
				</tr>
				<tr><td>&nbsp</td></tr>
				<tr><td>&nbsp</td></tr>
			</table>

			<input style="border-radius: 3px; border-style: solid; background-color: rgb(238,238,238);width: 100px;height: 25px " type="submit" name="submite" value="Supprimer" />
			</form>
	</div>

<div id="inscription">
			<table style="margin: auto">
				<caption><p class="conne">Changer votre mot de passe</p></caption>
				<form method="post" action="compte.php">
				<tr><td>&nbsp</td></tr>
				<tr>
					<td><label for="pseudo">Votre pseudo :</label></td>
					<td><input type="text" name="login" /></td>
				</tr>
				<tr>
					<td><label for="pass">Mot de passe :</label></td>
					<td><input type="password" name="oldpw" /></td>
				</tr>
				<tr>
					<td><label for="pass">Nouveau mot de passe :</label></td>
					<td><input type="password" name="newpw" /></td>
				</tr>
				<tr>
					<td><label for="pass">Confirmer nouveau mot de passe :</label></td>
					<td><input type="password" name="confirm_newpw" /></td>
				</tr>
			</table>
			<br />
			<input style="border-radius: 3px; border-style: solid; background-color: rgb(238,238,238);width: 100px;height: 25px "type="submit" name="submite" value="Changer" />
			</form>
		</div>





</section>


<?PHP
if ($_POST['submite'] == 'Changer')
{
	if ($_POST['login'] != NULL && $_POST['oldpw'] != NULL && $_POST['newpw'] != NULL && $_POST['confirm_newpw'] != NULL && $_POST['submite'] == 'Changer')
	{
		if ($_POST['newpw'] == $_POST['confirm_newpw'] && testpassword($_POST['newpw']))
		{
			$mdp = hash('whirlpool', $_POST['oldpw']);
			$newpw = hash('whirlpool', $_POST['newpw']);
			$new = array('login' => $_POST['login'], 'oldpw' => $mdp, 'newpw'=> $newpw);
			$add = './private/passwd';
			$tab = unserialize(file_get_contents($add));
			$i = 0;
			while ($tab[$i] != NULL)
			{
				if ($tab[$i]['login'] == $new['login'])
					break;
				$i++;
			}
			if ($tab[$i] != NULL)
			{
				if ($tab[$i]['passwd'] == $new['oldpw'] && testpassword($_POST['newpw']))
				{
					$tab[$i]['passwd'] = $new['newpw'];
					$titi = serialize($tab);
					file_put_contents($add, $titi);
					echo '<div class="ntm"><p><img src="img/valider.png" alt="Logo attention">Votre mot de passe été changé avec succes</p></div>';
				}
				else
					echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Mot de passe erroné</p></div>';
			}
			else
				echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Login erroné</p></div>';
		}
		else
			echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Les mots de passe ne sont pas identique</p></div>';
	}
	else
		echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Champs vide</p></div>';
}
//echo "ta soeur2 = ".$_SESSION['index'];
if ($_SESSION['index'] == 1)
{
	unset($_SESSION['index']);
	echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Les mots de passe ne sont pas identique</p></div>';
}

if ($_SESSION['index'] == 2)
{
	unset($_SESSION['index']);
	echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Champs vide</p></div>';
}

if ($_SESSION['index'] == 3)
{
	unset($_SESSION['index']);
	echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Mauvais mot de passe</p></div>';
}

?>


</body>
</html>
