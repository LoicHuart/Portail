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
if ((isset($_SESSION["login"]))&&($_SESSION["login"]=="root")&&(isset($_POST['valideModify']))) {
    if(!empty($_FILES["file"]["name"])){ 
        $filename = $_FILES["file"]["name"];
        $filesize = $_FILES["file"]["size"];

        if ($filesize < 300000)
        {
            $newfilename =  $_POST['nom'] . ".png";
            foreach($manager->getItem() as $donneesitems){
                if($donneesitems['id'] === $_POST['id']){
                    unlink($donneesitems['cheminimage']);
                }
            }
            if (move_uploaded_file($_FILES["file"]["tmp_name"],"css/img/cate/" . $newfilename));
            {
                resize_crop_image(200, 120, "css/img/cate/" . $newfilename, "css/img/cate/" . $newfilename);
            }
        }
        elseif ($filesize > 300000)
        {
            echo "The file you are trying to upload is too large.";
        }
    }
    else{
        rename($_POST['cheminimage'],"css/img/cate/" . $_POST['nom'] . ".png");
    }
    if(!empty($_POST['ReverseProxy'])){
        $manager->suppReverseProxy($_POST['id']);
        $manager->ajoutReverseProxy($_POST['lienhttp'],$_POST['ReverseProxy']);
        $manager->updateItem($_POST['id'],$_POST['nom'],$_POST['lienhttp'],$_POST['numeroligne'],$_POST['ReverseProxy']);
    }else{
        $manager->updateItem($_POST['id'],$_POST['nom'],$_POST['lienhttp'],$_POST['numeroligne'],"");
    }
}

// si l'utilisateur est connecté et qu'il a cliqué sur le bouton supprimé -> supprime l'item 
if ((isset($_SESSION["login"]))&&($_SESSION["login"]=="root")&&(isset($_POST['deleteItem']))) {
    foreach($manager->getItem() as $donneesitems){
        if($donneesitems['id'] === $_POST['id']){
            unlink($donneesitems['cheminimage']);

            $manager->suppReverseProxy($_POST['id']);
            $manager->deleteItem($_POST['id']);
        }
    }
}


?>