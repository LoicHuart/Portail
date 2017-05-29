<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="style.css" />
		<title>Formulaire de premier contact</title>
	</head>
<body>
	<h1>Votre Fiche est OK</h1>

<?php

		$cnx = mysql_connect( "localhost", "root", "");

		$db = mysql_select_db( "fiche");

	mysql_query("SET NAMES 'utf8'"); 

		$BQ = $_POST['BQ'] ;
		$CG = $_POST['CG'] ;
		$NRC = $_POST['NRC'] ;
		$SIO = $_POST['SIO'] ;
		$nom = $_POST['nom'] ;
		$prenom = $_POST['prenom'] ;
		$adresse = $_POST['adresse'] ;
		$codepostal = $_POST['codepostal'] ;
		$ville = $_POST['ville'] ;
		$telport = $_POST['telport'] ;
		$mail = $_POST['mail'] ;
		$datenais = $_POST['datenais'] ;
		$annee = $_POST['annee'] ;
		$etabli = $_POST['etabli'] ;
		$Formation = $_POST['Formation'] ;
		$Spe = $_POST['Spe'] ;
		$spec = $_POST['spec'] ;
		$etabliss = $_POST['etabliss'] ;
		$anneobt = $_POST['anneobt'] ;
		$FAE = $_POST['FAE'] ;
		$POLM = $_POST['POLM'] ;
		$autres = $_POST['autres'] ;

		$sql = "INSERT INTO Fiche_pc (Banque, Comptabilité_et_Gestion, Négociation_et_Relation_Client, Services_Informatiques_aux_Organisations, nom, prenom, adresse, code_postal, ville, tel_por, mail, datenais, annee_en_cours, etablissement, Formation, specialite, spec, etablissement_titu, anneeobt, Forum, porte_ouverte, autres) VALUES ( '$BQ', '$CG', '$NRC', '$SIO', '$nom', '$prenom', '$adresse', '$codepostal', '$ville', '$telport', '$mail', '$datenais', '$annee', '$etabli', '$Formation', '$Spe', '$spec', '$etabliss', '$anneobt', '$FAE', '$POLM', '$autres')";

		$requete = mysql_query($sql, $cnx) or die ( mysql_error() ) ;

	if($requete)
		{
			echo ("L'insertion a été correctement effectuée") ;
		}
	else
		{
			echo("L'insertion à echouée") ;
		}
?>

<form name="formulaire" method="post" action="index.html" enctype="multipart/form-data">
<input type="submit" value="Retour" text-align="center"/>
</form>

