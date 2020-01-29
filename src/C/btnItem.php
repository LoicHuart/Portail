<?php

// si l'utilisateur est connecté et qu'il a cliqué sur le bouton modifié -> affiche la page de modification
if ((isset($_SESSION["login"]))&&($_SESSION["login"]=="root")&&(isset($_POST['modifyItem']))) {   
    foreach($manager->getItem() as $donneesitems){
        if($donneesitems['id'] === $_POST['id']){
            require "./V/popupModifyItem.php";   
        }
    }
}


// si l'utilisateur est connecté et qu'il a cliqué sur le bouton modifié -> envoie les données à la bdd  
if ((isset($_SESSION["login"]))&&($_SESSION["login"]=="root")&&(isset($_POST['valideModifyItem']))) {
    if(($_FILES["file"]["error"] === 0)&&(isset($_POST['ReverseProxy']))&&(isset($_POST['id']))&&(!empty($_POST['nom']))&&(!empty($_POST['lienhttp']))&&(!empty($_POST['numeroligne']))){
        $manager->updateItem($_FILES,$_POST['id'],$_POST['nom'],$_POST['lienhttp'],$_POST['numeroligne'],$_POST['ReverseProxy']);
    }elseif(($_FILES["file"]["error"] === 4)&&(isset($_POST['ReverseProxy']))&&(isset($_POST['id']))&&(!empty($_POST['nom']))&&(!empty($_POST['lienhttp']))&&(!empty($_POST['numeroligne']))){
        $manager->updateItem("",$_POST['id'],$_POST['nom'],$_POST['lienhttp'],$_POST['numeroligne'],$_POST['ReverseProxy']);      
    }else{
        if(empty($_POST['nom'])){
            echo "veuillez fournir un nom d'item";
        }
        if(empty($_POST['lienhttp'])){
            echo "veuillez fournir un lienhttp";
        }
        if(empty($_POST['numeroligne'])){
            echo "veuillez fournir un numero de ligne";
        }
    }
}

// si l'utilisateur est connecté et qu'il a cliqué sur le bouton supprimé -> supprime l'item 
if ((isset($_SESSION["login"]))&&($_SESSION["login"]=="root")&&(isset($_POST['deleteItem']))) {
    $manager->deleteItem($_POST['id']);
}


?>