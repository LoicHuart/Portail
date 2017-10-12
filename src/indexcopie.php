<?php

include 'config/bdd.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/style2.css">
	<meta name="viewport" content="width=device-width" />
	<link href="https://fonts.googleapis.com/css?family=Antic|Julius+Sans+One|" rel="stylesheet">
	<title>PORTAIL</title>
</head>
<body>


<div id="content">

    <header>
        <div class="wrapper">
            <a href="index.html"><h1 class='MainTitle'>PORTAIL</h1></a>
            <div class='clear'></div> 
        </div>
    </header>

    <section id="premiere">
        <div class="wrapper">
                <?php
                $reponse1 = $bdd->query('SELECT * FROM portail_items WHERE numeroligne = 1');
                while ($donnees1 = $reponse1->fetch())
                {
                ?>
                <a href="<?php echo $donnees1['lienhttp']; ?>">
                    <div class="item" id="<?php echo $donnees1['nomid']?>" style="background: url('<?php echo $donnees1['cheminimage']?>') no-repeat top center; background-size: 100%;">
                        <h4><?php echo $donnees1['nom'] ?></h4>
                    </div>
                </a>

            <?php
                }
                $reponse1->closeCursor(); // Termine le traitement de la requête
                
            ?>
        </div>
    </section>

    <section id="deuxieme">
        <div class="wrapper">
            <?php
                $reponse2 = $bdd->query('SELECT * FROM portail_items WHERE numeroligne= 2');
                while ($donnees2 = $reponse2->fetch())
                {
                ?>
                <a href="<?php echo $donnees2['lienhttp']; ?>">
                    <div class="item" id="<?php echo $donnees2['nomid']?>" style="background: url('<?php echo $donnees2['cheminimage']?>') no-repeat top center; background-size: 100%;">
                        <h4><?php echo $donnees2['nom'] ?></h4>
                    </div>
                </a>

            <?php
                }
                $reponse2->closeCursor(); // Termine le traitement de la requête
                
            ?>
        </div>
    </section>

    <section id="troisieme">
        <div class="wrapper">
            <?php
                $reponse3 = $bdd->query('SELECT * FROM portail_items WHERE numeroligne = 3');
                while ($donnees3 = $reponse3->fetch())
                {
                ?>
                <a href="<?php echo $donnees3['lienhttp']; ?>">
                    <div class="item" id="<?php echo $donnees3['nomid']?>" style="background: url('<?php echo $donnees3['cheminimage']?>') no-repeat top center; background-size: 100%;">
                        <h4><?php echo $donnees3['nom'] ?></h4>
                    </div>
                </a>

            <?php
                }
                $reponse3->closeCursor(); // Termine le traitement de la requête
                
            ?>
        </div>
    </section>

</div>

<!-- Add libraries -->
	<script type="text/javascript" src="lib/jquery-3.1.1.js" ></script>
  	<script type="text/javascript" src="lib/script.js" ></script>
    <script type="text/javascript" src="lib/jquery.color.js" ></script>
    <script type="text/javascript" src="lib/sidebar.js" ></script>
</body>
</html>