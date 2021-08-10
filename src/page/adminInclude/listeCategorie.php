<?php

    $listeCategorie = dbListeCategorie();

?>

<div class="listeAdmin">

    <?php
        foreach ($listeCategorie as $value) {

            echo "<p> -" . $value["NomCategorie"] . " </p>";
        }
    ?>

</div>