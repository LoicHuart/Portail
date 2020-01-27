<?php

// si l'utilisateur est connecté et qu'il a cliqué sur le bouton modifié -> affiche la page de modification
if ((isset($_SESSION["login"]))&&($_SESSION["login"]=="root")&&(isset($_POST['modifyItem']))) {   
    foreach($manager->getItem() as $donneesitems){
        if($donneesitems['id'] === $_POST['id']){
            
            echo "<div class='modify'>";
            echo    "<h1>Modifier un Item</h1>"; 
            echo    "<form action='#' method='post' enctype='multipart/form-data'>";
            echo        "<input type='hidden' name='id' value=".$_POST['id'].">";
            echo        "<input type='hidden' name='cheminimage' value=".$donneesitems['cheminimage'].">";
            echo        "<p>Nom :</p><input type='text' name='nom' value=".$donneesitems['nom'].">";
            echo        "<p>Lien Http :</p><input type='text' name='lienhttp' value=".$donneesitems['lienhttp'].">";
            echo        "<p>ReverseProxy (remplir ce champ uniquement il y en a besoin):</p><input type='text' name='ReverseProxy' value=".$donneesitems['reverseProxy'].">";
            echo        "<p>Numero de Ligne :</p><input type='text' name='numeroligne' value=".$donneesitems['numeroligne'].">";
            echo        "<p>Image :</p><img src=".$donneesitems['cheminimage']."><input type='file' name='file' accept='image/png,'image/jpg, image/jpeg'>";
            echo        "<button type='submit' name='valideModify' submit>valider</button>";

            echo        "<button type='submit' name='closeModify' submit>close</button>";         
            echo    "</form>";
            echo "</div>";   
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