<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=portail_monge;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}


if(!empty($_GET['id'])) // Recuperation de l'id via la methode GET
{
    $id = htmlentities($_GET['id']);
}

$name = $nameError = $nameError2 = $compl = $complError = $complError2 = $sql = $com = $comError = $comError2 = ""; // Declaration des variables

if(!empty($_POST)){


    $name = htmlspecialchars($_POST['nomligne'], ENT_QUOTES); // Recuperation du nom de la ligne
    $compl = htmlspecialchars($_POST['numeroligne'], ENT_QUOTES); // Recuperation du numero de la ligne
    $com = htmlspecialchars($_POST['commentaire'], ENT_QUOTES); // Recuperation du commmentaire
    $isSuccess = true; // variable de verification de variable

    if(empty($name)) // Si le champs nom est vide
    {
        $nameError = "ce champs ne peut pas etre vide";
        $nameError2 = "has-error";
        $isSuccess = false;
    }

    if(empty($compl)) // Si le champs num est vide
    {
        $complError = "ce champs ne peut pas etre vide";
        $complError2 = "has-error";
        $isSuccess = false;
    }

    if($isSuccess) // si aucune erreur n'a ete detecté
    {
        $sql = "UPDATE portail_ligne SET nomligne='$name', numeroligne='$compl', description='$com' WHERE id=$id"; // requete de modification SQL
        $bdd->query($sql); // Execution de la requete
        header('Location: index.php'); // redirection vers l'acceuil
    }

}else{ // si une erreur a ete rencontre
    $sqelse = "SELECT * FROM portail_ligne WHERE id = $id"; // Selection des données du contact
    $liste = $bdd->query($sqelse); // Extraction
    $item = $liste->fetch();

    $name = $item['nomligne']; // Affectation de variales afin de les reecrire dans les inputs
    $compl = $item['numeroligne'];
    $com = $item['description']; // Recuperation du commmentaire
}
?>

<!doctype html>
<html lang="fr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>PORTAIL - UPDATE</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
  </head>
  <body>
    <div class="bg">
        <div class='container' id="cont1" >
            <!-- Entete -->
            <div class="row">
                <h3>Modification d'un message</h3>
            </div>

            <!-- bloc du formulaire -->
            <div class="row">
                <div id='formulaire' class="col-md-12 " >
                    <form method="POST" role="form" action="<?php echo 'update.php?id='.$id; ?>" class="form"> <!-- generation du lien grace a l'id -->
                        <!-- champ nom -->
                        <div class="form-group <?php echo $nameError2; ?> ">

                            <label for="name">Nom de la ligne </label>
                            <input type="text" class="form-control" id="nomligne" name="nomligne" maxlength="20" value="<?php echo $name; ?>"><!-- Affecte une classe au input afin de le rendre rouge en cas d'erreur -->
                            <span class="help-inline"><?php echo $nameError; ?> </span>
                            <span id="helpBlock" class="help-block">Nom de la ligne, pas d'espace ni de caractères spéciaux. </span>
                        </div>
                        <!-- champ nom complet -->
                        <div class="form-group <?php echo $complError2; ?>">
                            <label for="compl">Numero de ligne</label>
                            <input type="text" class="form-control" id="numeroligne" name="numeroligne" maxlength="20" value="<?php echo $compl; ?>">
                            <span class="help-inline"><?php echo $complError; ?> </span>
                            <span id="helpBlock" class="help-block">Numero de la ligne, pas d'espace ni de caractères spéciaux. </span>
                        </div>

                        <!-- champ commentaires -->
                        <div class="form-group <?php echo $comError2; ?>">
                            <label for="com">Commentaires</label>
                            <input type="text" class="form-control" id="commentaire" name="commentaire" maxlength="20" value="<?php echo $com; ?>">
                            <span class="help-inline"><?php echo $comError; ?> </span>
                        </div>

                        <button type="button" class="btn btn-primary active" onclick="location.href='index.php';" ><span class="glyphicon glyphicon-arrow-left"></span> Retour </button>
                        <button type="submit" class="btn btn-submit btn-success active" ><span class="glyphicon glyphicon-ok "></span> Modifier </button>

                    </form>
                </div>
            </div>
          </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
  	<script type="text/javascript" src="../../script.js" ></script>
  </body>
</html>
