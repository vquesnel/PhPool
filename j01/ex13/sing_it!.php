#!/usr/bin/php
<?PHP
$choice = array("Nan c'est parce que c'est le premier avril", "Oui il a vraiment des enfants");
if ($argv[1] == "mais pourquoi cette demo ?")
	echo "Tout simplement pour qu'en feuilletant le sujet
on ne s'apercoive pas de la nature de l'exo\n";
if ($argv[1] == "mais pourquoi cette chanson ?")
	echo "Parce que Kwame a des enfants\n";
if ($argv[1] == "vraiment ?")
{
	echo $choice[array_rand($choice, 1)]."\n";
}
?>
