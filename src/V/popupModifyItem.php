<div class='modify'>
    <h1>Modifier un Item</h1>
    <form action='#' method='post' enctype='multipart/form-data'>
        <input type='hidden' name='id' value="<?=$_POST['id']?>">
        <input type='hidden' name='cheminimage' value="<?=$donneesitems['cheminimage']?>">
        <p>Nom :</p><input type='text' name='nom' value="<?=$donneesitems['nom']?>">
        <p>Lien Http :</p><input type='text' name='lienhttp' value="<?=$donneesitems['lienhttp']?>">
        <p>ReverseProxy (remplir ce champ uniquement il y en a besoin):</p><input type='text' name='ReverseProxy' value="<?=$donneesitems['reverseProxy']?>">
        <p>Numero de Ligne :</p><input type='text' name='numeroligne' value="<?=$donneesitems['numeroligne']?>">
        <p>Image :</p><img src="<?=$donneesitems['cheminimage']?>"><input type='file' name='file' accept="image/png,image/jpg, image/jpeg">
        <button type='submit' name='valideModifyItem' submit>valider</button>

        <button type='submit' name='closeModify' submit>close</button>        
    </form>
</div>