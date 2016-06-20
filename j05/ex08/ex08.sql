SELECT nom, prenom, DATE_FORMAT(date_naissance, '%Y-%m-%d') AS 'date_de_naissance' FROM fiche_personne WHERE YEAR(date_naissance) = 1989 ORDER BY nom;
