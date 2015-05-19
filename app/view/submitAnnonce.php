<?php
include 'header.php';
?>
<?php

if(isset($_SESSION['submit'])){
    if($_SESSION['submit'] === TRUE){
        echo '<p>Création effectuée</p>';
    } else { 
        if($_SESSION['submit'] === 'done'){
            echo '<p>Vous avez déjà enregistré cette annonce</p>';
        } else {
        echo '<p>Une erreur s\'est produite</p>';
        }
    }
}
$_SESSION['submit'] = 'done';
var_dump($_SESSION['submit']);
?>

<?php
include 'footer.php';