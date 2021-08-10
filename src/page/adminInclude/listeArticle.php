<?php

    $listeArticle = dbListeArticle();

?>

<div class="listeAdmin">

    <?php
        foreach ($listeArticle as $value) {

            echo "<p> " . $value["titre"] . " | ". $value["imgUrl"] ." | ". $value["contenu"] ." | ". $value["auteurId"] ." | ". $value["categorieArticleId"] . " </p>";
        }
    ?>

</div>