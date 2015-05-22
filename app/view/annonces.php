<?php
include 'header.php';
?>
<?php
if(isset($_POST['submit'])){
    if($envoi){
        echo '<p>Votre message a été envoyé</p>';
    } else {
        echo '<p>Une erreur s\'est produite.';
    }
} else {
    
?>

<div class="annonce_list row">
    <div class="list_category">Catégorie: <?php echo $annonce->getCategory() ?></div>
    <div class="list_titre"><?php echo $annonce->getTitre() ?></div>
    <div class="list_prix">Prix: <?php echo $annonce->getPrix() ?> €</div>
    <div class="list_localisation">Localisation: <?php echo $annonce->getLocalisation() ?></div>
    <?php
    foreach($annonce->getImg() as $img) {
    ?>
        <img class="img_list" src="<?php echo IMG ?>/annonces/<?php echo $img['path'] ?>"/>
        <?php } ?>
    <div class="clearfix"></div>
</div>

<form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $annonce->getId() ?>"/>
    <input type="text" name="message"/>
    <input type="submit" name="submit" value="envoyer"/>
</form>
<?php } ?>

<?php
var_dump($annonce);
include 'footer.php';