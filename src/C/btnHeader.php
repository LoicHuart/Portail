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
    require "./V/popupNewItem.php";
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
    require "./V/popupNewLigne.php";
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