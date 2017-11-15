<?php

include '../../config/bdd.php';

if(!empty($_GET['id'])) // Recuperation de l'id via la methode GET
{
    $id = htmlentities($_GET['id']);
}

$name = $nameError = $nameError2 = $compl = $complError = $complError2 = $sql = $com = $comError = $comError2 = $chemin = $cheminError = $cheminError2 = $num = $numError = $numError2 = "";

if(!empty($_POST)){


    $name = htmlspecialchars($_POST['nomitem'], ENT_QUOTES); // Recuperation du nom de l'item
    $compl = htmlspecialchars($_POST['nomid'], ENT_QUOTES); // Recuperation du nom de l'item pour l'id de l'item
    $com = htmlspecialchars($_POST['lienhttp'], ENT_QUOTES); // Recuperation du lien HTTP
    $num = htmlspecialchars($_POST['numeroligne'], ENT_QUOTES); // Recuperation du commmentaire
    $filename = $compl . ".png";
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
    if(empty($com)) // si le champs num est vide
    {
        $comError = "Ce champ ne doit pas être vide";
        $comError2 = "has-error";
        $isSuccess = false;
    }
    if(empty($num)) // si le champs num est vide
    {
        $numError = "Ce champ ne doit pas être vide";
        $numError2 = "has-error";
        $isSuccess = false;
    }

    if($isSuccess) // si aucune erreur n'a ete detecté
    {
        $sql = "UPDATE portail_items SET nom='$name', nomid='$compl', lienhttp='$com', cheminimage='css/img/cate/$filename', numeroligne=$num WHERE id=$id"; // requete de modification SQL
        $bdd->query($sql); // Execution de la requete
        header('Location: ../index.php'); // redirection vers l'acceuil
    }

}else { //
    $sqelse = "SELECT * FROM portail_items WHERE id = $id"; // Selection des données du contact
    $liste = $bdd->query($sqelse); // Extraction
    $item = $liste->fetch();

    $name = $item['nom']; // AFFECTATION DES VARIABLE
    $compl = $item['nomid']; //
    $com = $item['lienhttp']; //
    $chemin = $item['cheminimage']; //
    $num = $item['numeroligne']; //
}

if (isset($_POST['send']))
{
    $chemin = "../../css/img/cate/"; // Recuperation du chemin de l'image
    $filename = $_FILES["file"]["name"];
    $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
    $file_ext = substr($filename, strripos($filename, '.')); // get file name
    $filesize = $_FILES["file"]["size"];
    $allowed_file_types = array('.jpg','.jpeg','.png','.bmp');

    if (in_array($file_ext,$allowed_file_types) && ($filesize < 300000))
    {
// Rename file
        $newfilename =  $compl . ".png";
        if (move_uploaded_file($_FILES["file"]["tmp_name"],$chemin . $newfilename));
        {
// file already exists error
            echo "File uploaded successfully.";
        }
    }
    elseif (empty($file_basename))
    {
// file selection error
        echo "Please select a file to upload.";
    }
    elseif ($filesize > 300000)
    {
// file size error
        echo "The file you are trying to upload is too large.";
    }
    else
    {
// file type error
        echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
        unlink($_FILES["file"]["tmp_name"]);
    }
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
                <form method="POST" role="form" action="<?php echo 'update.php?id='.$id; ?>" class="form" enctype="multipart/form-data"> <!-- generation du lien grace a l'id -->

                    <!-- champ nom -->
                    <div class="form-group <?php echo $nameError2; ?> ">

                        <label for="name">Nom </label>
                        <input type="text" class="form-control" id="nomitem" name="nomitem" maxlength="20" value="<?php echo $name; ?>" ><!-- Affecte une classe au input afin de le rendre rouge en cas d'erreur -->
                        <span class="help-inline"><?php echo $nameError; ?> </span>
                        <span id="helpBlock" class="help-block">Nom de l'item, en MAJUSCULE pas d'espace ni de caractères spéciaux. </span>
                    </div>
                    <!-- champ nom id -->
                    <div class="form-group <?php echo $complError2; ?>">
                        <label for="compl">Nom id</label>
                        <input type="text" class="form-control" id="nomid" name="nomid" maxlength="20" value="<?php echo $compl; ?>" ><!-- Affecte une classe au input afin de le rendre rouge en cas d'erreur -->
                        <span class="help-inline"><?php echo $complError; ?> </span>
                        <span id="helpBlock" class="help-block">Nom pour l'id de l'item, a titre indicatif, uniquement pour la BDD. pas d'espace ni de caractères spéciaux. </span>
                    </div>

                    <!-- champ lienhttp -->
                    <div class="form-group <?php echo $comError2; ?>">
                        <label for="com">Lien http</label>
                        <input type="text" class="form-control" id="lienhttp" name="lienhttp" maxlength="100" value="<?php echo $com; ?>">
                        <span class="help-inline"><?php echo $comError; ?> </span>
                        <span id="helpBlock" class="help-block">Lien HTTP/HTTPS. </span>
                    </div>



                    <!-- Champ upload image -->
                    <div class="form-group <?php echo $cheminError2; ?>">
                        <label for="com">Image</label><br />
                        <img border="0" src="../../<?php echo $chemin ?>"  width="200" height="120">
                        <input type="file" class="form-control" name="file">
                        <span class="help-inline"><?php echo $cheminError; ?> </span>
                        <span id="helpBlock" class="help-block">Chemin de l'image. Si le champ "Nom id" de base est modifié, veuillez uploader l'image a nouveau. </span>
                    </div>

                    <!-- champ numero ligne -->
                    <div class="form-group <?php echo $numError2; ?>">
                        <label for="com">Numero de ligne</label>
                        <input type="text" class="form-control" id="numeroligne" name="numeroligne" maxlength="20" value="<?php echo $num; ?>" >
                        <span class="help-inline"><?php echo $numError2; ?> </span>
                        <span id="helpBlock" class="help-block">Numero de ligne a laquelle l'item est affecté. </span>
                    </div>

                    <button type="button" class="btn btn-primary active" onclick="location.href='../index.php';" ><span class="glyphicon glyphicon-arrow-left"></span> Retour </button>
                    <button type="submit" class="btn btn-submit btn-success active" name="send"><span class="glyphicon glyphicon-ok "></span> Modifier </button>

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