<?php
session_start();
include 'M/manager.php';
include 'config/config.php';
$manager = new manager;
$manager->connectBDD($NOMTABLE,$IDENTIFIANT,$MDP);
$manager->getLigneBDD();
$manager->getItemBDD();
include 'C/functionResizeImage.php';
include 'C/btnHeader.php';
include 'C/btnItem.php';
include 'C/btnLigne.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width" />
    <title>PORTAIL</title>
</head>
<body>
    <header>
        <h1 class='MainTitle'>PORTAIL</h1>
        <?php
        // affiche les boutons "+ item" et "+ ligne" si l'utilisateur est connecté
        if (isset($_SESSION["login"])&&($_SESSION["login"]=="root")){
            echo "<div class='divBtnNewItemLigne'>";
            echo    "<form action='#' method='post'>";
            echo         "<button class='BtnNewItem' name='BtnNewItem'>+ Item</button>";
            echo         "<button class='BtnNewLigne' name='BtnNewLigne'>+ Ligne</button>";
            echo    "</form>";
            echo "</div>";
        }?>

        <!-- si l'utilisateur clique sur le bouton connect -> affiche la page de connection -->
        <button type="button" class="BtnConnect" onclick="openLoginForm()" >connect</button>    
        <div id="_connexion" class="connexion" >    
            <form action="#" method="post">
                <h1>Connexion</h1>
                <p>Login : <input type="text" name="login"></p>
                <p>Mdp : <input type="text" name="mdp"></p>
                <button type="submit" name="connect" submit>connexion</button>
                <button type="submit" name="disconnect" submit>disconnect</button>
            </form>
            
            <button onclick="closeLoginForm()">Cancel</button>
        </div>  
    </header>

    <!-- Parcourent toutes les données récupérer de la BDD pour les afficher --> 
    <?php 
    if(!empty($manager->getLigne())){
        foreach ($manager->getLigne() as $donneesligne){  
        ?>
        <div class="ligne container-ligne">
            <h1 class='nomligne'><?php echo $donneesligne['nomligne']?> :</h1>
            <?php
            if (isset($_SESSION["login"])&&($_SESSION["login"]=="root")){
                echo "<form action='#' method='post' class='BtnModifyDeleteLigne'>";
                echo    "<input type='hidden' name='id' value=".$donneesligne['id'].">";
                echo    "<input type='hidden' name='nomligne' value=".$donneesligne['nomligne'].">";
                echo    "<input type='hidden' name='numeroligne' value=".$donneesligne['numeroligne'].">";
                echo    "<button name='BtnModifyLigne'><img src='css\img\modify.png' /></button>";
                echo    "<button name='BtnDeleteLigne'><img src='css\img\delete.png' /></button>";
                echo "</form>";
            }
            ?>
            <div class='container-item'>
                <?php
                if(!empty($manager->getItem())){
                    foreach ($manager->getItem() as $donneesitems){ 
                        if($donneesligne['numeroligne'] === $donneesitems['numeroligne']){
                            echo "<div class='item'>";
                            echo    "<a href=".$donneesitems['lienhttp'].">";
                            echo        "<img id=".$donneesitems['id']." src=".$donneesitems['cheminimage'].">";
                            echo        "<h4 class='nomitem'>".$donneesitems['nom']."</h4>";
                            echo    "</a>";
                            
                            // si l'utilisateur est connecté -> affiche les boutons modifiés et supprimés 
                            if (isset($_SESSION["login"])&&($_SESSION["login"]=="root")){
                                echo "<form action='#' method='post'>";
                                echo    "<input type='hidden' name='id' value=".$donneesitems['id'].">";
                                echo    "<button class='BtnModifyDeleteItem' name='modifyItem'><img src='css\img\modify.png' /></button>";
                                echo    "<button class='BtnModifyDeleteItem' name='deleteItem'><img src='css\img\delete.png' /></button>";
                                echo "</form>";
                            }
                            echo "</div>";
                        }
                    }
                }
                ?>
            </div>
        </div>
    <?php
        }
    } 
    ?>
</body>
<script src="javascript.js"></script>
</html>
