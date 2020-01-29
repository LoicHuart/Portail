<div class='NewItem'>
    <h1>Ajout d'un Item</h1> 
    <form action='#' method='post' enctype='multipart/form-data'>
        <p>Nom :</p><input type='text' name='nom'>
        <p>Lien Http :</p><input type='text' name='lienhttp'>
        <p>ReverseProxy (remplir ce champ uniquement il y en a besoin):</p><input type='text' name='ReverseProxy' value=''>
        <p>Numero de Ligne :</p><input type='text' name='numeroligne'>
        <p>Position dans la ligne :</p><input type='text' name='positionInLigne'>

        <p>Image :</p><input type='file' name='file' accept="image/png,image/jpg, image/jpeg" >

        <button type='submit' name='valideNewItem' submit>valider</button>

        <button type='submit' name='closeNewItem' submit>close</button>         
    </form>
</div>  