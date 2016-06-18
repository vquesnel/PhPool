<?php
 
function testpassword($mdp)	
{
 
$longueur = strlen($mdp);
if ($longueur <= 5)
	return FALSE;
for($i = 0; $i < $longueur; $i++) 	{
	$lettre = $mdp[$i];
	if ($lettre>='a' && $lettre<='z'){
	
		$point = $point + 1;
		$point_min = 1;
	}
	else if ($lettre>='A' && $lettre <='Z'){
		$point = $point + 2;
		$point_maj = 2;
	}
	else if ($lettre>='0' && $lettre<='9'){
		$point = $point + 3;
		$point_chiffre = 3;
	}
	else {
		$point = $point + 5;
		$point_caracteres = 5;
	}
}
$etape1 = $point / $longueur;
$etape2 = $point_min + $point_maj + $point_chiffre + $point_caracteres;
$resultat = $etape1 * $etape2;
$final = $resultat * $longueur;
if ($final >= 50)
	return TRUE;
else
	return FALSE;
}