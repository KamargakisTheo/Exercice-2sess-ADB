<?php

    $listeComment = dbListeCommentaire();

    if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin") {
        if(isset($_GET["deleteComment"]) && $_GET["deleteComment"] == true) {

            $secuUserId = htmlspecialchars($_GET["value"]);

            $deleteComment = intval($secuUserId);

            dbDeleteComment($deleteComment);

            header("location: ../../src/page/admin.php?choix=listeComment");

            exit();
        }
    }

?>

<div class="listeAdmin">

    <table id="comment">
        <tr>
            <th><h3>Auteur</h3></th>
            <th><h3>Article Id</h3></th>
            <th><h3>Contenu</h3></th>
        </tr>

    <?php
        foreach ($listeComment as $value) {
    ?>
            <tr>
                <td><?=$value["login"]?></td>
                <td><?=$value["articleId"]?></td>
                <td><div class="listerArticleContenu"><?=$value["contenu"]?></div></td>

    <?php
        if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin") {
    ?>
                <td>
                <a href="../../src/page/admin.php?choix=listeComment&deleteComment=true&value=<?=$value["commentaireId"]?>/#comment" class="btnsupp">💣</a>
                </td>
    <?php
        }   
    ?>
            </tr>
    <?php
    }
    ?>
    </table>

   

</div>

echo "<p> " . $value["articleId"] . " | ". $value["userId"] ." | ". $value["contenu"] ." </p>";
