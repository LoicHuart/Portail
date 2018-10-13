<?php

include '../../config/bdd.php';

if (isset($_POST['send'])) {

    $name = $nameError = $compl = $complError = $sql = $com = $comError = $chemin = $cheminError = $pathForBDD = $num = $numError = "";

    $name = htmlspecialchars($_POST['nomitem'], ENT_QUOTES); // Recuperation du nom de l'item
    $compl = htmlspecialchars($_POST['nomid'], ENT_QUOTES); // Recuperation du nom de l'item pour l'id de l'item
    $com = htmlspecialchars($_POST['lienhttp'], ENT_QUOTES); // Recuperation du lien HTTP
    $num = htmlspecialchars($_POST['numeroligne'], ENT_QUOTES); // Recuperation du numero de ligne

    $isSuccess = false; // variable de verification avant validation

    if (empty($name))
    {
        $nameError = "Ce champ ne doit pas être vide";
    }
    if (empty($compl))
    {
        $complError = "Ce champ ne doit pas être vide";
    }
    if (empty($com))
    {
        $comError = "Ce champ ne doit pas être vide";
    }
    if (empty($num))
    {
        $numError = "Ce champ ne doit pas être vide";
    }
    if (empty($_FILES["file"]))
    {
        $cheminError = "Ce champ ne doit pas être vide";
    } else {
        $chemin = "../../css/img/cate/";
        $newfilename = $compl . ".png";

        $filename = $_FILES["file"]["name"];
        $file_ext = substr($filename, strripos($filename, '.')); // get file extension
        $allowed_file_types = array('.jpg', '.jpeg', '.png', '.bmp');

        if (in_array($file_ext, $allowed_file_types)) {
            if (file_exists($chemin . $newfilename)) {
                $cheminError = "You have already uploaded this file.";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], $chemin . $newfilename);
                $pathForBDD = "css/img/cate/" . $newfilename; // Creation du chemin pour la BDD
                $isSuccess = true;
            }
        } else {
            $cheminError = "Only these file typs are allowed for upload: " . implode(', ', $allowed_file_types);
            unlink($_FILES["file"]["tmp_name"]);
        }
    }

    if ($isSuccess) // si aucune erreur n'a ete detecté
    {
        $sql = "INSERT INTO portail_items (nom, nomid, lienhttp, cheminimage, numeroligne) VALUES('$name', '$compl', '$com','$pathForBDD', $num)"; // Insertion dans la table du nouvel item
        $bdd->query($sql);
        header('Location: ../index.php'); // Redirection vers l'acceuil du panel admin
    }
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>PORTAIL - INSERT</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/css/bootstrap-theme.min.css" >
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
            	<h3>Ajout d'un item</h3>
                <form method="POST" role="form" action="insert.php" class="form" enctype="multipart/form-data">

                    <!-- champ nom -->
                    <div class="form-group">
                        <label for="name">Nom </label>
                        <input type="text" class="form-control" id="nomitem" name="nomitem" maxlength="20" ><!-- Affecte une classe au input afin de le rendre rouge en cas d'erreur -->
                        <span class="help-inline bg-warning"><?php echo $nameError; ?> </span>
                        <span id="helpBlock" class="help-block">Nom de l'item, en MAJUSCULE pas d'espace ni de caractères spéciaux. </span>
                    </div>
                    <!-- champ nom id -->
                    <div class="form-group">
                        <label for="compl">Nom id</label>
                        <input type="text" class="form-control" id="nomid" name="nomid" maxlength="20" ><!-- Affecte une classe au input afin de le rendre rouge en cas d'erreur -->
                        <span class="help-inline bg-warning"><?php echo $complError; ?> </span>
                        <span id="helpBlock" class="help-block">Nom pour l'id de l'item, a titre indicatif, uniquement pour la BDD. pas d'espace ni de caractères spéciaux. </span>
                    </div>

                    <!-- champ lienhttp -->
                    <div class="form-group">
                        <label for="com">Lien http</label>
                        <input type="text" class="form-control" id="lienhttp" name="lienhttp" maxlength="100" >
                        <span class="help-inline bg-warning"><?php echo $comError; ?> </span>
                        <span id="helpBlock" class="help-block">Lien HTTP/HTTPS. </span>
                    </div>

                    <!-- Champ upload image -->
                    <div class="form-group">
                        <label for="com">Image</label>
                        <input type="file" class="form-control" name="file">
                        <span class="help-inline bg-warning"><?php echo $cheminError; ?> </span>
                        <span id="helpBlock" class="help-block">Chemin de l'image. </span>
                    </div>

                    <!-- champ numero ligne -->
                    <div class="form-group">
                        <label for="com">Numero de ligne</label>
                        <input type="text" class="form-control" id="numeroligne" name="numeroligne" maxlength="20" >
                        <span class="help-inline bg-warning"><?php echo $numError2; ?> </span>
                        <span id="helpBlock" class="help-block">Numero de ligne a laquelle l'item est affecté. </span>
                    </div>

                    <button type="button" class="button" onclick="location.href='../index.php';" ><span class="glyphicon glyphicon-arrow-left"></span> Retour </button>
                    <button type="submit" class="button2" name="send" ><span class="glyphicon glyphicon-ok "></span> Ajouter </button>

                </form>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript" src="../lib/jquery-3.1.1.js" ></script>
<script type="text/javascript" src="../../css/js/bootstrap.min.js"></script>

</body>
</html>
