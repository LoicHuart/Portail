<?php
// si l'utilisateur est connecté et qu'il a cliqué sur le btnModifyLigne -> affiche la page de modify ligne
if((isset($_SESSION["login"]))&&($_SESSION["login"]=="root")&&(isset($_POST['BtnModifyLigne']))){
    require "./V/popupModifyLigne.php";
}

// si l'utilisateur est connecté et qu'il a cliqué sur le bouton BtnValideModifyLigne -> envoie les données à la bdd  
if((isset($_SESSION["login"]))&&($_SESSION["login"]=="root")&&(isset($_POST['BtnValideModifyLigne']))){        
    foreach ($manager->getItem() as $donneesitems){
        if(isset($_POST["positionItem_".$donneesitems['nom']])){
            $manager->updatePositionItemInLigne($donneesitems['nom'],$_POST["positionItem_".$donneesitems['nom']]);
        }
    }
    if((isset($_POST['nomligne'])) && (isset($_POST['numeroligne'])) && (isset($_POST['id'])) && (isset($_POST['newNomLigne'])) && (isset($_POST['newNumeroLigne']))){
        if($_POST['numeroligne'] != $_POST['newNumeroLigne']){
            foreach ($manager->getLigne() as $donneesitems){
                if($_POST['newNumeroLigne'] != $donneesitems['numeroligne']){
                    $test = "true";
                }else{
                    $test = "numero de ligne deja attribuer";
                    echo $test;
                    break;
                }
            }
        }    
        if($_POST['nomligne'] != $_POST['newNomLigne']){   
            foreach ($manager->getItem() as $donneesitems){
                if($donneesitems['numeroligne'] === $_POST['numeroligne']){
                    $manager->updateItem($donneesitems['id'],$donneesitems['nom'],$donneesitems['lienhttp'],$_POST['newNumeroLigne']);
                }
            }
            $manager->updateLigne($_POST['id'],$_POST['newNomLigne'],$_POST['newNumeroLigne']);
        }
        
    }
    header("Refresh:0");
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
    }
    else{
        $test="true";
    }
    if($test === "true"){
        $manager->deleteLigne($_POST['id']);
    }
}
?>