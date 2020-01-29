<?php
// si l'utilisateur est connecté et qu'il a cliqué sur le btnModifyLigne -> affiche la page de modify ligne
if((isset($_SESSION["login"]))&&($_SESSION["login"]=="root")&&(isset($_POST['BtnModifyLigne']))){
    require "./V/popupModifyLigne.php";
}

// si l'utilisateur est connecté et qu'il a cliqué sur le bouton BtnValideModifyLigne -> envoie les données à la bdd  
if((isset($_SESSION["login"]))&&($_SESSION["login"]=="root")&&(isset($_POST['BtnValideModifyLigne']))){       
    if((isset($_POST['newNomLigne'])) && (isset($_POST['numeroligne'])) && (isset($_POST['id']))){
        $test = "false";
        foreach ($manager->getLigne() as $donneesLigne){
            if($_POST['id'] === $donneesLigne['id']){
                if($_POST['newNumeroLigne'] === $donneesLigne['numeroligne']){
                    $test = "true";
                    $manager->updateLigne($_POST['id'],$_POST['newNomLigne'],$donneesLigne['numeroligne']);   
                    break; 
                }
            }
            if($_POST['newNumeroLigne'] === $donneesLigne['numeroligne']){
                //numero de ligne deja attribué
                echo "numéro de ligne déjà attribué";
                $test = "true";
                break;
            }
        }
        if($test != "true"){
            //nouveau numero de ligne
            echo "nouveau numero de ligne";
            foreach ($manager->getLigne() as $donneesLigne){
                if($_POST['id'] === $donneesLigne['id']){
                    $ancienNumLigne = $donneesLigne['numeroligne'];
                }
            }
            $manager->updateLigne($_POST['id'],$_POST['newNomLigne'],$_POST['newNumeroLigne']);
            foreach ($manager->getItem() as $donneesitems){
                if($donneesitems['numeroligne'] === $ancienNumLigne){
                    $manager->updateNumLigneItem($ancienNumLigne,$_POST['newNumeroLigne']);
                }
            }
        }       
    }

    foreach ($manager->getItem() as $donneesitems){
        if(isset($_POST["idItem_".$donneesitems['id']])){
            $manager->updatePositionItemInLigne($donneesitems['id'],$_POST["idItem_".$donneesitems['id']]);
        }
    }
}

// si l'utilisateur est connecté et qu'il a cliqué sur le bouton BtnDeleteLigne-> envoie les données à la bdd 
if((isset($_SESSION["login"]))&&($_SESSION["login"]=="root")&&(isset($_POST['BtnDeleteLigne']))){
    if(!empty($manager->getItem())){
        foreach ($manager->getItem() as $donneesitems){
            if($_POST['numeroligne'] === $donneesitems['numeroligne']){
                $test = "veuillez déplacer ou supprimer les items de cette ligne avant de la supprimer";
                echo $test;
                break;
            }else{
                $test = "true";
            }
        }
    }else{
        $test="true";
    }
    if($test === "true"){
        $manager->deleteLigne($_POST['id']);
    }
}
?>