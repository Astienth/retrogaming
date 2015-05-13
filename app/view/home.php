<?php
include 'header.php';
?>
<?php
$annonces = new AnnonceManager($db);
$list = $annonces->getList();
var_dump($list);
?>

<?php
include 'footer.php';