<?PHP
session_start();
/*

Mettre une securriter si on essaye de crer modifier supprimer et aue le fichier n'existe pas !!!!!!!



*/
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
				<caption><p class="conne">Creer un produit</p></caption>
				<form method="post" action="create_product.php">
				<tr><td>&nbsp</td></tr>
				<tr>
					<td><label for="name">Nom de la categorie :</label></td>
					<td><input type="text" name="categorie" /></td>
				</tr>
				<tr>
					<td><label for="name">Nom du produit :</label></td>
					<td><input type="text" name="name" /></td>
				</tr>
				<tr>
					<td><label for="name">Prix :</label></td>
					<td><input type="text" name="prix" /></td>
				</tr>
				<tr>
					<td><label for="description">Photos:</label></td>
					<td><input type="text" name="photo" /></td>
				</tr>
				<tr>
					<td><label for="description">Derniere minute:</label></td>
					<td><input type="text" name="minute" /></td>
				</tr>
				<tr>
					<td><label for="description">Promo:</label></td>
					<td><input type="text" name="Promo" /></td>
				</tr>
				<tr>
					<td><label for="description">Description courte:</label></td>
					<td><textarea name="descc" id="description"></textarea></td>
				</tr>
				<tr>
					<td><label for="description">Description longue:</label></td>
					<td><textarea name="descl" id="description"></textarea></td>
				</tr>
			</table>
			<br />
			<input style="border-radius: 3px; border-style: solid; background-color: rgb(238,238,238);width: 100px;height: 25px "type="submit" name="submite" value="Create" />
			</form>
		</div>
		<div id="connection">
			<table style="margin: auto">
				<caption><p class="conne">Supprimer un produit :</p></caption>
				<form method="post" action="delete_product.php">
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
				<caption><p class="conne">Modifier un produit</p></caption>
				<form method="post" action="modif_product.php">
				<tr><td>&nbsp</td></tr>
				<tr>
					<td><label for="name">Nom du produit :</label></td>
					<td><input type="text" name="name" /></td>
				</tr>
				<tr>
					<td><label for="name">Chnger le nom du produit :</label></td>
					<td><input type="text" name="new_name" /></td>
				</tr>
				<tr>
					<td><label for="name">Changer la categorie :</label></td>
					<td><input type="text" name="new_cat" /></td>
				</tr>

				<tr>
					<td><label for="name">changer le Prix :</label></td>
					<td><input type="text" name="new_prix" /></td>
				</tr>
				<tr>
					<td><label for="description"> Nouvelle Photos:</label></td>
					<td><input type="text" name="new_photo" /></td>
				</tr>
				<tr>
					<td><label for="description">Derniere minute:</label></td>
					<td><input type="text" name="minute" /></td>
				</tr>
				<tr>
					<td><label for="description">Promo:</label></td>
					<td><input type="text" name="Promo" /></td>
				</tr>
				<tr>
					<td><label for="description"> Nouvelle Description courte:</label></td>
					<td><textarea name="new_descc" id="new_descc"></textarea></td>
				</tr>
				<tr>
					<td><label for="description"> Nouvelle Description longue:</label></td>
					<td><textarea name="new_descl" id="new_descl"></textarea></td>
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
	unset($_SESSION['index']);
	echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Champs vide</p></div>';
}
if ($_SESSION['index'] == 2)
{
	unset($_SESSION['index']);
	echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">La catégorie n\'existe pas !</p></div>';
}
if ($_SESSION['index'] == 3)
{
	unset($_SESSION['index']);
	echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Le produit existe deja !</p></div>';
}
if ($_SESSION['index'] == 4)
{
	unset($_SESSION['index']);
	echo '<div class="ntm"><p><img src="img/valider.png" alt="Logo attention">Votre produit a été creer avec succes</p></div>';
}
if ($_SESSION['index'] == 5)
{
	unset($_SESSION['index']);
	echo '<div class="ntm"><p><img src="img/valider.png" alt="Logo attention">Votre produit a été supprimer avec succes</p></div>';
}
if ($_SESSION['index'] == 6)
{
	unset($_SESSION['index']);
	echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Le produit n\'existe pas !</p></div>';
}
if ($_SESSION['index'] == 7)
{
	unset($_SESSION['index']);
	echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Entrer le nom du produit!</p></div>';
}
if ($_SESSION['index'] == 8)
{
	unset($_SESSION['index']);
	echo '<div class="ntm"><p><img src="img/valider.png" alt="Logo attention">Votre produit a été modifier avec succes</p></div>';
}
?>

</body>
</html>
