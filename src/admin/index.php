<?php
session_start();
include '../config/bdd.php';
include '../php/Connexion_test.php';

/* Check Si la personne est connecté */
if(!isset($_SESSION['IsConnected']) || $_SESSION['IsConnected'] != 1){
    header('Location: ../connexion.php');
}

if(isset($_GET['discon']) && $_GET['discon'] == "y"){

    $Connexion = new Connexion_test($bdd);
    $Connexion->GetDisconnected();
    header('Location: ../index.php');
}

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/css/bootstrap-theme.min.css" >
    <title>PORTAIL</title>
</head>
<body>


<div id="content">
    <header>
        <div class='wrapper'> 
            <div id="retour"><a href="../"><img src="../css/img/back.png" alt= "button retour"></a></div>
            <div id="disconnect"><a href="index.php?discon=y"><img src="../css/img/menu.png" alt="button disconnect"></a></div>
            <h1 class="title">PANEL ADMINISTRATEUR</h1>

            <div class='clear'></div> 
        </div>
    </header>
<br/>
    <section id="premiere">
        <div class='container'>
            <div class="row ">
                <div class="col-md-12 table-responsive ">
                    <div class="barre"> </div>
                <h3>Gestion des lignes</h3>
                    <div class="containtable">

                        <a href="insert.php" id="bouton" class="button"><span class="glyphicon glyphicon-plus"></span> Ajouter une ligne</a>
                    <!-- Tableau -->                         
			<table class='table table-condensed table-striped '>
                            <thead>
                            <tr>
                                <th>Nom ligne</th>
                                <th>Numero de ligne</th>
                                <th>Commentaires</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php // Lister les contacts et leurs informations
                            $requete = $bdd->query('SELECT * FROM portail_ligne');
                            while($item = $requete->fetch())// boucle qui extrait tout les contacts
                            {
                                echo '<tr>';
                                echo '<td>'.$item['nomligne'].'</td>';
                                echo '<td>'.$item['numeroligne'].'</td>';
                                echo '<td>'.$item['description'].'</td>';
                                echo '<td width=100>';
                                echo '<a class="btn button" href="update.php?id='.$item['id'].'" ><span class="glyphicon glyphicon-pencil"></a>';
                                echo " ";
                                echo '<a class="btn button" href="delete.php?id='.$item['id'].'" ><span class="glyphicon glyphicon-remove"></a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <br/>
    <section id="deuxieme">

        <div class='container'>
            <div class="row ">
                <div class="col-md-12 table-responsive ">
                    <h1></h1>
                    <div class="barre"> </div>
                    <h3>Gestion des items</h3>
                    <div class="containtable">

                        <a href="items/insert.php" id="btnadd" class="button"><span class="glyphicon glyphicon-plus"></span> Ajouter un items</a>
                        <!-- Tableau -->
                        <table class='table table-condensed table-striped '>
                            <thead>
                            <tr>
                                <th>Nom de l'item</th>
                                <th>ID de l'item</th>
                                <th>Lien http(s)</th>
                                <th>Chemin de l'image</th>
                                <th>Ligne de l'item</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php // Lister les contacts et leurs informations
                            $requete = $bdd->query('SELECT * FROM portail_items');
                            while($item = $requete->fetch())// boucle qui extrait tout les contacts
                            {
                                echo '<tr>';
                                echo '<td>'.$item['nom'].'</td>';
                                echo '<td>'.$item['nomid'].'</td>';
                                echo '<td>'.$item['lienhttp'].'</td>';
                                echo '<td>'.$item['cheminimage'].'</td>';
                                echo '<td>'.$item['numeroligne'].'</td>';
                                echo '<td width=100>';
                                echo '<a class="btn button" href="items/update.php?id='.$item['id'].'" ><span class="glyphicon glyphicon-pencil"></a>';
                                echo " ";
                                echo '<a class="btn button" href="items/delete.php?id='.$item['id'].'" ><span class="glyphicon glyphicon-remove"></a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </section>

</div>

<!-- Add libraries -->
<script type="text/javascript" src="lib/jquery-3.1.1.js" ></script>
<script src="../css/js/bootstrap.min.js"></script>
<script type="text/javascript" src="lib/script.js" ></script>
<script type="text/javascript" src="lib/jquery.color.js" ></script>
<script type="text/javascript" src="lib/sidebar.js" ></script>
</body>
</html>