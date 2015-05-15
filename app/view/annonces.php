<?php
include 'header.php';
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


<?php
var_dump($annonce);
include 'footer.php';