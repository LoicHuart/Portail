<?php
// si l'utilisateur est connecté et qu'il a cliqué sur le btnModifyLigne -> affiche la page de modify ligne
if((isset($_SESSION["login"]))&&($_SESSION["login"]=="root")&&(isset($_POST['BtnModifyLigne']))){
    echo "<div class='modifyLigne'>";
    echo    "<form action='#' method='post'>";
    echo        "<input type='hidden' name='id' value=".$_POST['id'].">";
    echo        "<input type='hidden' name='nomligne' value=".$_POST['nomligne'].">";
    echo        "<input type='hidden' name='numeroligne' value=".$_POST['numeroligne'].">";
    echo        "<p>nom ligne :</p><input type='text' name='newNomLigne' value=".$_POST['nomligne'].">";
    echo        "<p>numero ligne :</p><input type='text' name='newNumeroLigne' value=".$_POST['numeroligne'].">";
    echo        "<h1>Modifier la position des items dans la ligne </h1>"; 
    
    foreach ($manager->getItem() as $donneesitems){
        if($_POST['numeroligne'] === $donneesitems['numeroligne']){
            echo "<p>".$donneesitems['nom'] ." :</p><input type='text' name="."positionItem_".$donneesitems['nom']." value=".$donneesitems['positionInLigne'].">";
        }
    }
    echo        "<br/>";
    echo        "<button type='submit' name='BtnValideModifyLigne' submit>valider</button>";

    echo        "<button type='submit' name='BtnCloseModifyLigne' submit>close</button>";         
    echo    "</form>";
    echo "</div>";
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