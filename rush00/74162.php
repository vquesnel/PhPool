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
				<caption><p class="conne">Creer une catégorie</p></caption>
				<form method="post" action="create_categorie.php">
				<tr><td>&nbsp</td></tr>
				<tr>
					<td><label for="name">Nom de la catégorie :</label></td>
					<td><input type="text" name="name" /></td>
				</tr>
				<tr>
					<td><label for="description">Description :</label></td>
					<td><textarea name="description" id="description"></textarea></td>
				</tr>
				<tr>
					<td><label for="description">Photo :</label></td>
					<td><input name="photo" id="photo"></input></td>
				</tr>
			</table>
			<br />
			<input style="border-radius: 3px; border-style: solid; background-color: rgb(238,238,238);width: 100px;height: 25px "type="submit" name="submite" value="Create" />
			</form>
		</div>
		<div id="connection">
			<table style="margin: auto">
				<caption><p class="conne">Supprimer une catégorie :</p></caption>
				<form method="post" action="delete_categorie.php">
				<tr><td>&nbsp</td></tr>

				<tr>
					<td><label for="name">Nom de la catégorie :</label></td>
					<td><input type="text" name="name" /></td>
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
				<caption><p class="conne">Modifier une catégorie</p></caption>
				<form method="post" action="modif_categorie.php">
				<tr><td>&nbsp</td></tr>
				<tr>
					<td><label for="name">Nom de la catégorie :</label></td>
					<td><input type="text" name="name" /></td>
				</tr>
				<tr>
					<td><label for="name">Nouveau nom :</label></td>
					<td><input type="text" name="name2" /></td>
				</tr>
				<tr>
					<td><label for="description">Nouvelle description :</label></td>
					<td><textarea name="description" id="description"></textarea></td>
				</tr>
				<tr>
					<td><label for="description">Nouvelle Photo :</label></td>
					<td><input name="photo" id="photo"></input></td>
				</tr>
			</table>
			<br />
			<input style="border-radius: 3px; border-style: solid; background-color: rgb(238,238,238);width: 100px;height: 25px "type="submit" name="submit" value="Modifier" />
			</form>
		</div>
</section>

<?PHP
if ($_SESSION['index'] == 1)
{
	unset($_SESSION['index']);
	echo '<div class="ntm"><p><img src="img/valider.png" alt="Logo attention">Votre catégorie a été creer avec succes</p></div>';
}

if ($_SESSION['index'] == 2)
{
	unset($_SESSION['index']);
	echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Champs vide</p></div>';
}
if ($_SESSION['index'] == 3)
{
	unset($_SESSION['index']);
	echo '<div class="ntm"><p><img src="img/valider.png" alt="Logo attention">Votre catégorie a été supprimer avec succes</p></div>';
}
if ($_SESSION['index'] == 4)
{
	unset($_SESSION['index']);
	echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">La catégorie n\'existe pas !</p></div>';
}
if ($_SESSION['index'] == 5)
{
	unset($_SESSION['index']);
	echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">La catégorie existe deja !</p></div>';
}
if ($_SESSION['index'] == 6)
{
	unset($_SESSION['index']);
	echo '<div class="ntm"><p><img src="img/valider.png" alt="Logo attention">Votre catégorie a été modifier avec succes</p></div>';
}


?>


















</body>
</html>
