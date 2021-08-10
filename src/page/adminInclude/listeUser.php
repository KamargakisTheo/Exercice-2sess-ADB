<?php

    $listeUser = dbListeUser();

?>

<div class="listeAdmin">

    <?php
        foreach ($listeUser as $value) {

            echo "<p> " . $value["nom"] . " | ". $value["prenom"] ." | ". $value["login"] ." | ". $value["email"] ." </p>";
        }
    ?>

</div>