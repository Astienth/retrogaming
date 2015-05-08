<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if(!isset($_POST['submit'])) {

    var_dump($id);

    echo $id['id'];

    echo $id['annonce'];

    
    if(isset($message)) {
        echo $message;
    }

?>

<form method="POST" action="/CoinRetrogaming/listPost"/>
<input type="text" name="test"/>
<input type="submit" name="submit"/>
</form>
<?php } 

else {
        if(isset($message)) {
        echo $message;
    }
}
?>

