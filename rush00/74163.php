<?PHP
session_start();

$add = './private/passwd';
$tab = unserialize(file_get_contents($add));
foreach ($tab as $elem)
{
	if ($elem['login'] == $_SESSION['login'])
	{
		if ($elem['admin'] == 0)
		{
			header('Location:index.php');
			exit();
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
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
					<li><a href="74160.php">Tableau de bord</a></li>
					<li><a href="74161.php">Produits</a></li>
					<li><a href="74162.php">Catégories</a></li>
					<li><a href="74163.php">Utilisateurs</a></li>
					<li><a href="delog.php">Deconnection</a></li>
				</ul>
			</nav>

		</header>
	</div>
	<hr color="black"/>

<section>

		<div id="inscription">
			<table style="margin: auto">
				<caption><p class="conne">Creer un compte</p></caption>
				<form method="post" action="create_account_admin.php">
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
					<td><label for="mail">Acces administateur :</label></td>
					<td><input type="text" name="admin" /></td>
				</tr>
				<tr>
					<td><label for="mail">Date de naissance :</label></td>
					<td><input type="date" name="date"></code></td>
				</tr>
			</table>
			<br />
			<input style="border-radius: 3px; border-style: solid; background-color: rgb(238,238,238);width: 100px;height: 25px "type="submit" name="submite" value="Inscription" />
			</form>
		</div>

		<div id="connection">
			<table style="margin: auto">
				<caption><p class="conne">Supprimer un compte</p></caption>
				<form method="post" action="delete_account_admin.php">
				<tr><td>&nbsp</td></tr>
				<tr><td>&nbsp</td></tr>
				<tr>
					<td><label for="mail">Nom utilisateur :</label></td>
					<td><input type="text" name="login" /></td>
				</tr>

				<tr>
					<td><label for="psw">Votre mot de passe :</label></td>
					<td><input type="password" name="mdp"/></td>
				</tr>

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

	</section>

<section>

		<div id="inscription">
			<table style="margin: auto">
				<caption><p class="conne">Modifier un compte</p></caption>
				<form method="post" action="modify_account_admin.php">
				<tr><td>&nbsp</td></tr>
				<tr>
					<td><label for="pseudo">Login :</label></td>
					<td><input type="text" name="login" /></td>
				</tr>
				<tr>
					<td><label for="pass">Mot de passe :</label></td>
					<td><input type="password" name="passwd" /></td>
				</tr>
				<tr>
					<td><label for="pass">Confimer mot de passe :</label></td>
					<td><input type="password" name="confirm_passwd" /></td>
				</tr>
				<tr>
					<td><label for="mail">Adresse mail :</label></td>
					<td><input type="text" name="mail" /></td>
				</tr>
				<tr>
					<td><label for="mail">Acces administateur :</label></td>
					<td><input type="text" name="admin" /></td>
				</tr>
				<tr>
					<td><label for="mail">Date de naissance :</label></td>
					<td><input type="date" name="date"></code></td>
				</tr>
			</table>
			<br />
			<input style="border-radius: 3px; border-style: solid; background-color: rgb(238,238,238);width: 100px;height: 25px "type="submit" name="submite" value="Modifier" />
			</form>
		</div>
</section>

<?PHP
if ($_SESSION['index'] == 1)
{
echo '<div class="ntm"><p><img src="img/valider.png" alt="Logo attention">Votre compte à été creer avec succes</p></div>';
 unset($_SESSION['index']);
}
if ($_SESSION['index'] == 2)
{
echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Login déjà existant</p></div>';
 unset($_SESSION['index']);
}
if ($_SESSION['index'] == 3)
{
echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Mot de passe trop faible</p></div>';
 unset($_SESSION['index']);
}
if ($_SESSION['index'] == 4)
{
echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Date de naissance invalide</p></div>';
 unset($_SESSION['index']);
}
if ($_SESSION['index'] == 5)
{
echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Adresse mail invalide</p></div>';
 unset($_SESSION['index']);
}
if ($_SESSION['index'] == 6)
{
echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Mots de passe invalide</p></div>';
 unset($_SESSION['index']);
}
if ($_SESSION['index'] == 7)
{
echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Login invalide</p></div>';
unset($_SESSION['index']);
}
if ($_SESSION['index'] == 8)
{
echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Champ non renseigné</p></div>';
 unset($_SESSION['index']);
}
if ($_SESSION['index'] == 9)
{
echo '<div class="ntm"><p><img src="img/valider.png" alt="Logo attention">Le compte à été supprimer avec succes</p></div>';
 unset($_SESSION['index']);
}

if ($_SESSION['index'] == 10)
{
echo '<div class="ntm"><p><img src="img/valider.png" alt="Logo attention">Votre compte à été modifié avec succes</p></div>';
 unset($_SESSION['index']);
}
?>
</body>
</html>







































