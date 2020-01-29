<div class='modifyLigne'>
    <form action='#' method='post'>
        <input type='hidden' name='id' value="<?=$_POST['id']?>">
        <input type='hidden' name='nomligne' value="<?=$_POST['nomligne']?>">
        <input type='hidden' name='numeroligne' value="<?=$_POST['numeroligne']?>">
        <p>nom ligne :</p><input type='text' name='newNomLigne' value="<?=$_POST['nomligne']?>">
        <p>numero ligne :</p><input type='text' name='newNumeroLigne' value="<?=$_POST['numeroligne']?>">
        <h1>Modifier la position des items dans la ligne </h1> 
        <?php
            foreach ($manager->getItem() as $donneesitems){
                if($_POST['numeroligne'] === $donneesitems['numeroligne']){
                    echo "<p>".$donneesitems['nom'] ." :</p><input type='text' name="."idItem_".$donneesitems['id']." value=".$donneesitems['positionInLigne'].">";
                }
            }
        ?>
        <br/>
        <button type='submit' name='BtnValideModifyLigne' submit>valider</button>

        <button type='submit' name='BtnCloseModifyLigne' submit>close</button>        
    </form>
</div>