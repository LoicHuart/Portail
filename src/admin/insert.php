<?php
session_start();
include '../config/bdd.php';

/* Check Si la personne est connecté */
if(!isset($_SESSION['IsConnected']) || $_SESSION['IsConnected'] != 1){
    header('Location: ../connexion.php');
}

$name = $nameError = $nameError2 = $compl = $complError = $complError2 = $sql = $com = $comError = $comError2 = "";

if(!empty($_POST)){ // Si la methode POST est utilisé

    $name = htmlspecialchars($_POST['nomligne'], ENT_QUOTES); // Recuperation du nom de la ligne
    $compl = htmlspecialchars($_POST['numeroligne'], ENT_QUOTES); // Recuperation du numero de la ligne
    $com = htmlspecialchars($_POST['commentaire'], ENT_QUOTES); // Recuperation du commmentaire
    $isSuccess = true; // variable de verification de variable

    if(empty($name)) // si le champs nom est vide
    {
        $nameError = "Ce champ ne doit pas être vide";
        $nameError2 = "has-error";
        $isSuccess = false;
    }

    if(empty($compl)) // si le champs num est vide
    {
        $complError = "Ce champ ne doit pas être vide";
        $complError2 = "has-error";
        $isSuccess = false;
    }

    if($isSuccess) // si aucune erreur n'a ete detecté
    {
        $sql = "INSERT INTO portail_ligne (nomligne, numeroligne, description) VALUES('$name', $compl, '$com')"; // Insertion dans la table de la nouvelle ligne
        $bdd->query($sql);
        header('Location: index.php'); // Redirection vers l'acceuil du panel admin

    }

}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>PORTAIL - INSERT</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/css/bootstrap-theme.min.css" >
</head>
<header>
        <div class='wrapper'> 
             <h1 class="title">PANEL ADMINISTRATEUR</h1>
             <div class='clear'></div> 
        </div>
</header>
</br>
<body>
<div class="bg">
    <div class='container' id="cont1" >
        <!-- bloc ajout d'une ligne -->
        <div class="row">
            <div id='formulaire' class="col-md-12 " >
                <h3>Ajout d'une ligne</h3>
                <form method="POST" role="form" action="insert.php" class="form">

                    <!-- champ nom -->
                    <div class="form-group <?php echo $nameError2; ?> ">

                        <label for="name">Nom de la ligne </label>
                        <input type="text" class="form-control" id="nomligne" name="nomligne" maxlength="20" ><!-- Affecte une classe au input afin de le rendre rouge en cas d'erreur -->
                        <span class="help-inline"><?php echo $nameError; ?> </span>
                        <span id="helpBlock" class="help-block">Nom de la ligne, pas d'espace ni de caractères spéciaux, max. 20 caractères. </span>
                    </div>
                    <!-- champ nom complet -->
                    <div class="form-group <?php echo $complError2; ?>">
                        <label for="compl">Numero de ligne</label>
                        <input type="text" class="form-control" id="numeroligne" name="numeroligne" maxlength="20" ><!-- Affecte une classe au input afin de le rendre rouge en cas d'erreur -->
                        <span class="help-inline"><?php echo $complError; ?> </span>
                        <span id="helpBlock" class="help-block">Numero de la ligne, pas d'espace ni de caractères spéciaux, max. 20 caractères. </span>
                    </div>

                    <!-- champ commentaires -->
                    <div class="form-group <?php echo $comError2; ?>">
                        <label for="com">Commentaires</label>
                        <input type="text" class="form-control" id="commentaire" name="commentaire" maxlength="20" >
                        <span class="help-inline"><?php echo $comError; ?> </span>
                        <span id="helpBlock" class="help-block">Commentaire utile a la gestion des lignes,  max. 20 caractères. </span>
                    </div>

                    <button type="button" class="button" onclick="location.href='index.php';" ><span class="glyphicon glyphicon-arrow-left"></span> Retour </button>
                    <button type="submit" class="button2" ><span class="glyphicon glyphicon-ok "></span> Ajouter </button>

                </form>
            </div>
        </div>

    </div>
</div>


<script type="text/javascript" src="lib/jquery-3.1.1.js" ></script>
<script type="text/javascript" src="../css/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../script.js" ></script>
</body>
</html>
