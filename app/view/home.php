<?php
include 'header.php';
?>
<?php

$db = DbConnection::getInstance();

$annonces = new AnnonceManager($db);
$list = $annonces->getList();
var_dump($list);
?>

<?php
include 'footer.php';