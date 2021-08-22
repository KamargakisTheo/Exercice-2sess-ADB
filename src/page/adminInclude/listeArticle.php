<?php

    $listeArticle = dbListeArticle();

    if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin") {
        if(isset($_GET["deleteArticle"]) && $_GET["deleteArticle"] == true) {

            $secuUserId = htmlspecialchars($_GET["value"]);

            $deleteArticle = intval($secuUserId);

            dbDeleteArticle($deleteArticle);

            header("location: ../../src/page/admin.php?choix=listeArticle");

            exit();
        }
    }

?>

<div class="listeAdmin">

    <table id="article">
        <tr>
            <th><h3>Titre</h3></th>
            <th><h3>Image</h3></th>
            <th><h3>Contenu</h3></th>
            <th><h3>Auteur</h3></th>
            <th><h3>Catégorie</h3></th>
        </tr>

    <?php
        foreach ($listeArticle as $value) {
    ?>
            <tr>
                <td><?=$value["titre"]?></td>
                <td><?=$value["imgUrl"]?></td>
                <td><div class="listerArticleContenu"><?=$value["contenu"]?></div></td>
                <td><?=$value["login"]?></td>
                <td><?=$value["NomCategorie"]?></td>

    <?php
        if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin") {
    ?>
                <td>
                <a href="../../src/page/admin.php?choix=listeArticle&deleteArticle=true&value=<?=$value["articleId"]?>/#article" class="btnsupp">💣</a>
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