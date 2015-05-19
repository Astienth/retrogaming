<?php
include 'header.php';
?>
<?php
foreach ($list as $annonce) {
?>

<a href='<?php echo BASE ?>annonce/<?php echo $annonceManager->annonceUrl($annonce); ?>'>
   <div class="annonce_list row">
    <div class="list_category">Catégorie: <?php echo $annonce->getCategory() ?></div>
    <div class="list_titre"><?php echo $annonce->getTitre() ?></div>
    <div class="list_prix">Prix: <?php echo $annonce->getPrix() ?> €</div>
    <div class="list_localisation">Localisation: <?php echo $annonce->getLocalisation() ?></div>
    <div class="list_date"><?php echo $annonceManager->getDate($annonce); ?></div>
        <img class="img_list" src="<?php echo IMG ?>/annonces/<?php
        $img = $annonce->getImg();
        if(!empty($img)){
            echo $img[0]['path'];
        } else { echo 'defaultPic.png'; } ?>"/>
    <div class="clearfix"></div>
</div>
</a>

<?php
}
$paginator->create();
?>

<?php
include 'footer.php';