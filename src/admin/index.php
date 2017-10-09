<?php

include '../config/bdd.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width" />
	<link href="https://fonts.googleapis.com/css?family=Antic|Julius+Sans+One|" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
    <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/noppa/text-security/master/dist/text-security.css">
	<title>PORTAIL</title>
</head>
<body>


<div id="content">

    <header>
        

    </header>

    <section id="premiere">

        <div class='container'>
                        <div class="row ">
                <div class="col-md-12 table-responsive ">
                <h1>PANEL ADMINISTRATEUR</h1>
                <div class="barre"> </div>
                <h3>Gestion des lignes</h3>
                    <div class="containtable">

                    <a href="insert.php" id="btnadd"class="btn btn-primary "><span class="glyphicon glyphicon-plus"></span> Ajouter une ligne</a>
                    <!-- Tableau -->
                <table class='table table-condensed table-striped '>
                    <thead>
                        <tr>
                            <th>Nom ligne</th>
                            <th>Numero de ligne</th>
                            <th>Description</th>
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
                            echo '<a class="btn btn-primary" href="update.php?id='.$item['id'].'" ><span class="glyphicon glyphicon-pencil"></a>';
                            echo " ";
                            echo '<a class="btn btn-danger" href="delete.php?id='.$item['id'].'" ><span class="glyphicon glyphicon-remove"></a>';
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
    
     <section id="deuxieme">

        <div class='container'>
                        <div class="row ">
                <div class="col-md-12 table-responsive ">
                <h1><?php echo $titre ?></h1>
                <div class="barre"> </div>
                <h3>Gestion des items</h3>
                    <div class="containtable">

                    <a href="items/insert.php" id="btnadd"class="btn btn-primary "><span class="glyphicon glyphicon-plus"></span> Ajouter un items</a>
                    <!-- Tableau -->
                <table class='table table-condensed table-striped '>
                    <thead>
                        <tr>
                            <th>Nom message</th>
                            <th>Message</th>
                            <th>Commentaires</th>
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
                            echo '<a class="btn btn-primary" href="items/update.php?id='.$item['id'].'" ><span class="glyphicon glyphicon-pencil"></a>';
                            echo " ";
                            echo '<a class="btn btn-danger" href="items/delete.php?id='.$item['id'].'" ><span class="glyphicon glyphicon-remove"></a>';
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
  	<script type="text/javascript" src="lib/script.js" ></script>
    <script type="text/javascript" src="lib/jquery.color.js" ></script>
    <script type="text/javascript" src="lib/sidebar.js" ></script>
</body>
</html>