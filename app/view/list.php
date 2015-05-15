<?php
include 'header.php';
?>
<?php
foreach ($list as $annonce) {
?>

<a href='<?php echo BASE ?>annonce/<?php echo $annonce->getId() ?>'>
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
</a>

<?php
}

var_dump($list);
?>

<?php
include 'footer.php';