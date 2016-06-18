<?PHP 

/* 
	Faire un captcha plus attrayant
	Soit avec des images soit avec un dictionnaire de mots
*/
function liste()
{
	$liste = array('internet','merde', 'fuck', 'salade', 'tomate', 'apple', '951753', 'capcap');
	return $liste[array_rand($liste)];
}

function captcha()
{
	$mot = liste();
	$_SESSION['captcha'] = $mot;
	return $mot;
}

?>