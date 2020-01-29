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
    if(($_FILES["file"]["error"] === 0)&&(isset($_POST['nom']))&&(isset($_POST['lienhttp']))&&(isset($_POST['numeroligne']))&&(isset($_POST['positionInLigne']))&&(!empty($_POST['nom']))&&(!empty($_POST['lienhttp']))&&(!empty($_POST['numeroligne']))&&(!empty($_POST['positionInLigne']))){ 
        $manager->insertItem($_FILES,$_POST['nom'],$_POST['lienhttp'],$_POST['numeroligne'],$_POST['positionInLigne'],$_POST['ReverseProxy']);
    }else{
        if((empty($_FILES["file"]["name"]))){
            echo "veuillez fournir une image valide";
        }
        if(empty($_POST['nom'])){
            echo "veuillez fournir un nom d'item valide";
        }
        if(empty($_POST['lienhttp'])){
            echo "veuillez fournir un lienhttp valide";
        }
        if(empty($_POST['numeroligne'])){
            echo "veuillez fournir un numero de ligne valide";
        }
        if(empty($_POST['positionInLigne'])){
            echo "veuillez fournir une position dans la ligne valide";
        }
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
        if(empty($_POST['NomLigne'])){
            echo "veuillez fournir un nom de ligne";
        }
        if(empty($_POST['numeroligne'])){
            echo "veuillez fournir numero de ligne";
        }
    }
}





?>