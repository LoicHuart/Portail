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
            <a href="index.html"><h1 class='MainTitle'>PORTAIL</h1></a>
            <div class='clear'></div> 
        </div>
    </header>

        <?php
        $reponselignes = $bdd->query('SELECT id FROM portail_ligne');
        while ($donneesligne = $reponselignes->fetch())
        {
            
        ?>
        <section class="ligne">
            <div class="wrapper">
            
        <?php
            $id = $donneesligne['id'];
 
        ?>
        
                <?php
                $reponseitems = $bdd->query("SELECT * FROM portail_items WHERE numeroligne = $id");
                while ($donneesitems = $reponseitems->fetch())
                {
                ?>
                <a href="<?php echo $donneesitems['lienhttp']; ?>">
                    <div class="item" id="<?php echo $donneesitems['nomid']?>" style="background: url('<?php echo $donneesitems['cheminimage']?>') no-repeat top center; background-size: 100%;">
                        <h4><?php echo $donneesitems['nom'] ?></h4>
                    </div>
                </a>

            <?php
                }
                $reponseitems->closeCursor(); // Termine le traitement de la requête
                
            ?>

            </div>
        </section>
    <?php
        }
        $reponseligne->closeCursor();

    ?>
    
<!-- Add libraries -->
    <script type="text/javascript" src="lib/jquery-3.1.1.js" ></script>
    <script type="text/javascript" src="lib/script.js" ></script>
    <script type="text/javascript" src="lib/jquery.color.js" ></script>
    <script type="text/javascript" src="lib/sidebar.js" ></script>
</body>
</html>
