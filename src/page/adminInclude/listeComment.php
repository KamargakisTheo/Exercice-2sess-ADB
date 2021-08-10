<?php

    $listeCommentaire = dbListeCommentaire();

?>

<div class="listeAdmin">

    <?php
        foreach ($listeCommentaire as $value) {

            echo "<p> " . $value["articleId"] . " | ". $value["userId"] ." | ". $value["contenu"] ." </p>";
        }
    ?>

</div>