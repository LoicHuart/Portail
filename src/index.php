<?php

include 'config/bdd.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width" />
    <link href="https://fonts.googleapis.com/css?family=Antic|Julius+Sans+One|" rel="stylesheet">
    <title>PORTAIL</title>
</head>
<body>


<div id="content">

    <header>
        <div class="wrapper">
            <a href="index.php"><h1 class='MainTitle'>PORTAIL</h1></a>
            <div class='clear'></div>
        </div>
    </header>
    <body>
    <?php
        $reponselignes = $bdd->query('SELECT id FROM portail_ligne'); //Récupère les id des lignes dans la BDD
        while ($donneesligne = $reponselignes->fetch()) //Permet d'afficher les lignes
        {
            
        ?>
        <section class="ligne">
            <div class="wrapper">
            
                <?php
                $id = $donneesligne['id']; //Récupère l'id de la ligne
 
                ?>
        
                <?php
                $reponseitems = $bdd->query("SELECT * FROM portail_items WHERE numeroligne = $id"); 

                //Récupère les items dont l'id est le même que celui de la ligne

                while ($donneesitems = $reponseitems->fetch())//Permet d'afficher les items
                {
                ?>
                <a href="<?php echo $donneesitems['lienhttp']; ?>">
                    <div class="item" id="<?php echo $donneesitems['nomid']?>" style="background: url('<?php echo $donneesitems['cheminimage']?>') no-repeat top center; background-size: 100%;">
                        <h4><?php echo $donneesitems['nom'] ?></h4>
                    </div>
                </a>

            <?php
                }
                $reponseitems->closeCursor(); // Termine le traitement de la requête des items
                
            ?>

            </div>
        </section>
    <?php
        }
        $reponseligne->closeCursor();// Termine le traitement de la requête des lignes

    ?>
    <!-- Add libraries -->
    <script type="text/javascript" src="lib/jquery-3.1.1.js" ></script>
    <script type="text/javascript" src="lib/script.js" ></script>
    <script type="text/javascript" src="lib/jquery.color.js" ></script>
    <script type="text/javascript" src="lib/sidebar.js" ></script>
    </body>
</html>
