<?php
session_start();

include 'config/bdd.php';
include 'php/connexion_test.php';

$errormessage = "";

if(!empty($_POST)){

    if(!empty($_POST['user']) && !empty($_POST['password']) && !empty($_POST['captcha'])){

        if($_POST['captcha'] == $_SESSION['captcha']){

            $Connexion = new Connexion_test($bdd);

            $return = $Connexion->CheckConnexion($_POST['user'], $_POST['password']);

            if($return == "ok"){
                $errormessage = "<div class=\"alert alert-success\" role=\"alert\">Bonjour ".$_POST['user'].", vous allez etre redirigé</div>";
                $Connexion->setName($_POST['user']);
                $Connexion->GetConnected();
                header("refresh:3;url=admin/index.php");
            }else{
                $errormessage = "<div class=\"alert alert-danger\" role=\"alert\">identifiant ou mot de passe incorrect</div>";;
            }
        }else{
            $errormessage = "<div class=\"alert alert-danger\" style=\"alert\">Captcha incorrect</div>";;
        }


    }else{
        $errormessage = "<div class=\"alert alert-danger\" role=\"alert\">Veuillez remplir tout les champs</div>";;
    }
}


function motListe()
{
    $liste = array('internet', 'captcha', 'robot');
    return $liste[array_rand($liste)];
}

function captcha()
{
    $mot = motListe();
    $_SESSION['captcha'] = $mot;
    return $mot;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width" />
    <link href="https://fonts.googleapis.com/css?family=Antic|Julius+Sans+One|" rel="stylesheet">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css/bootstrap-theme.min.css" >
    <title>PORTAIL</title>
</head>
<body>


<div id="content">

    <header>
        <div class="wrapper">
            <a href="index.php"><h1 class='MainTitle'>Connexion a PORTAIL</h1></a>
            <div class='clear'></div>
        </div>
    </header>
    <body>

        <section class="ligne">
            <div class="wrapper">
                <div class="connexion-ctn">
                    <div class="connexion-window">

                        <form method="post" action="connexion.php">
                            <div class="form-group">
                                <label>Nom d'utilisateur</label><br>
                                <input type="text" name="user" class="form-control"><br/>
                            </div>

                            <div class="form-group">
                                <label>Mot de passe</label><br>
                                <input type="password" name="password" class="form-control"><br/>
                            </div>

                            <div class="form-group">
                                <label>Recopiez le mot :  <?php echo captcha(); ?></label><br>
                                <input type="text" name="captcha" id="captcha" class="form-control"><br/>
                            </div>

                            <div class="text-center">
                                <input type="submit" value="Connexion" class="button1">
                            </div>

                            <div class="message-wrapper">
                                <?php echo $errormessage; ?>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </section>

    <!-- Add libraries -->
    <script type="text/javascript" src="lib/jquery-3.1.1.js" ></script>
    <script type="text/javascript" src="lib/script.js" ></script>
    <script type="text/javascript" src="lib/jquery.color.js" ></script>
    <script type="text/javascript" src="lib/sidebar.js" ></script>
    </body>
</html>
