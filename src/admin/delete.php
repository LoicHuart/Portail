<?php

include '../config/bdd.php';

if(!empty($_GET['id'])) // Recuperation de l'id via la methode GET
{
    $id = htmlentities($_GET['id']);
}

if(!empty($_POST)) //Si la SUPERGLOBALE POST n'est pas vide
{
    $id = $_POST['id']; // Recuperation de l'id via la methode POST

    $sqelse = "DELETE FROM portail_ligne WHERE id = $id"; // Commande SQL pour suprimmer une entrée d'une table
    $bdd->query($sqelse); // Execution de la commande precedente
    header('Location: index.php'); // redirecton vers les contact
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>PORTAIL - DELETE</title>
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
        <!-- Entete -->
        <div class="row">
            <div class="barre"> </div>
            <h3>Suppression d'un message</h3>
        </div>

        <!-- bloc de confirmation de suppression -->
        <div class="row">
            <div id='formulaire' class="col-md-12 " >
                <form method="POST" role="form" action="delete.php" class="form">

                    <p class="alert alert-warning">Êtes-vous sûr de vouloir supprimer ?</p>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <!-- btn -->
                    <div id="blocksubb" class="col-md-12 form-group">
                        <button type="button" class="btn btn-primary active " onclick="location.href='index.php';" ><span class="glyphicon glyphicon-arrow-left"></span> Retour </button>
                        <button type="submit" class="btn btn-success active" ><span class="glyphicon glyphicon-ok "></span> Oui </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript" src="lib/jquery-3.1.1.js" ></script>
<script type="text/javascript" src="../css/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../script.js" ></script>
</body>
</html>