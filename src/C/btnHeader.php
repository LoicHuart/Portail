<?php

// compare les identifier de l'utilisateur avec la BDD
if (isset($_POST['connect'])) {
    $manager->connexionAdmin($_POST['login'],$_POST['mdp']);
}
//deconnect l'utilisateur
if (isset($_POST['disconnect'])) {
    session_destroy();
    header("Refresh:0");
}


// si l'utilisateur est connecté et qu'il a cliqué sur le bouton "+ item" -> affiche la page de création d'item
if ((isset($_SESSION["login"]))&&($_SESSION["login"]=="root")&&(isset($_POST['BtnNewItem']))) {
   
    echo "<div class='NewItem'>";
    echo    "<h1>Ajout d'un Item</h1>"; 
    echo    "<form action='#' method='post' enctype='multipart/form-data'>";
    echo        "<p>Nom :</p><input type='text' name='nom' >";
    echo        "<p>Lien Http :</p><input type='text' name='lienhttp' >";
    echo        "<p>ReverseProxy (remplir ce champ uniquement il y en a besoin):</p><input type='text' name='ReverseProxy' value=''>";
    echo        "<p>Numero de Ligne :</p><input type='text' name='numeroligne' >";
    echo        "<p>Position dans la ligne :</p><input type='text' name='positionInLigne' >";

    echo        "<p>Image :</p><input type='file' name='file' accept='image/png,'image/jpg, image/jpeg'>";
    
    echo        "<button type='submit' name='valideNewItem' submit>valider</button>";

    echo        "<button type='submit' name='closeNewItem' submit>close</button>";         
    echo    "</form>";
    echo "</div>";   
    

}

// si l'utilisateur est connecté et qu'il a cliqué sur le bouton valider item -> envoie les données à la bdd  
if ((isset($_SESSION["login"]))&&($_SESSION["login"]=="root")&&(isset($_POST['valideNewItem']))) {

    if((!empty($_FILES["file"]["name"]))&&(isset($_POST['nom']))&&(isset($_POST['lienhttp']))&&(isset($_POST['numeroligne']))&&(isset($_POST['positionInLigne']))){ 
        $filename = $_FILES["file"]["name"];
        $filesize = $_FILES["file"]["size"];

        if ($filesize < 300000)
        {
            $newfilename =  $_POST['nom'] . ".png";
            if (move_uploaded_file($_FILES["file"]["tmp_name"],"css/img/cate/" . $newfilename));
            {
                resize_crop_image(200, 120, "css/img/cate/" . $newfilename, "css/img/cate/" . $newfilename);

                if(!empty($_POST['ReverseProxy'])){
                    $manager->ajoutReverseProxy($_POST['lienhttp'],$_POST['ReverseProxy']);
                    $manager->insertItem($_POST['nom'],$_POST['lienhttp'],$_POST['numeroligne'],$_POST['positionInLigne'],$_POST['ReverseProxy']);
                }else{
                    $manager->insertItem($_POST['nom'],$_POST['lienhttp'],$_POST['numeroligne'],$_POST['positionInLigne'],"");
                }
            }
        }
        elseif ($filesize > 300000)
        {
            echo "The file you are trying to upload is too large.";
        }
    }
    else{
        echo "error";
    }
}

// si l'utilisateur est connecté et qu'il a cliqué sur le bouton "+ ligne" ->  affiche la page de création de ligne
if ((isset($_SESSION["login"]))&&($_SESSION["login"]=="root")&&(isset($_POST['BtnNewLigne']))) {
    echo "<div class='NewLigne'>";
    echo    "<h1>Ajout d'une Ligne</h1>"; 
    echo    "<form action='#' method='post' enctype='multipart/form-data'>";
    echo        "<p>NomLigne :</p><input type='text' name='NomLigne' >";
    echo        "<p>Numero de Ligne :</p><input type='text' name='numeroligne' >";
    echo        "<button type='submit' name='valideNewLigne' submit>valider</button>";
    echo        "<button type='submit' name='closeNewLigne' submit>close</button>";         
    echo    "</form>";
    echo "</div>";  
}

// si l'utilisateur est connecté et qu'il a cliqué sur le bouton valide Ligne -> envoie les données à la bdd  
if ((isset($_SESSION["login"]))&&($_SESSION["login"]=="root")&&(isset($_POST['valideNewLigne']))) {    
    if((isset($_POST['NomLigne']))&&(isset($_POST['numeroligne']))){
        $manager->insertLigne($_POST['NomLigne'],$_POST['numeroligne']);
    }else{
        echo "champ requis incomplet";
    }
}





?>