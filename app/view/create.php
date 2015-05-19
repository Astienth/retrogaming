<?php
include 'header.php';
?>
<?php
if(isset($creation)){
    if($creation){
        ?>
<p>Création effectuée</p>
    <?php } else { ?>
<p>Une erreur s'est produite</p>      
    <?php }
    
} else { ?>
<form method="POST" action="">
    <label>Catégorie: <input type="text" name="category"/></label>
    <label>localisation: <input type="text" name="localisation"/></label>
    <label>titre: <input type="text" name="titre"/></label>
    <label>description: <input type="text" name="description"/></label>
    <label>prix: <input type="text" name="prix"/></label>
    <label>password: <input type="text" name="password"/></label>
    <label>telContact: <input type="text" name="telContact"/></label>
    <label>mailContact: <input type="text" name="mailContact"/></label>
    <input type="submit" name="submit" value="Valider"/>    
</form>
<?php } ?>

<?php
include 'footer.php';