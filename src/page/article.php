<?php
    $title = "Article";
    require "../../src/common/template.php";
    require "../../src/function/dbFunction.php";
    require "../../src/function/dbArticle.php";
    require "../../src/function/dbCommentaire.php";

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // J'envoie l'entier de ma valeur dans une variable id
        $id = intval($_GET['id']);
        // J'execute une requete pour récupérer mon contenu
        $contenuArticle = getArticleContent($id);
    }


?>

<section class="mainArticle">
    <!-- Les informations de l'article -->
    <div class="titrenautre">
        <h2><?= $contenuArticle[0]['titre'] ?></h2>
        <p>
            Catégorie: <?= $contenuArticle[0]['NomCategorie'] ?>
        </p>
        <p>
            Auteur: <?= $contenuArticle[0]['auteurNom'] ?> <?= $contenuArticle[0]['auteurPrenom'] ?>
        </p>
    </div>

    <div> 
        <!-- Section qui contient l'image et le titre -->
        <div class="ImgArticleOut">
        <img src="<?=$contenuArticle[0]['imgUrl']?>" alt="<?=$contenuArticle[0]['titre']?>" class="imgArticleIn">
        </div>

        <!-- Le contenu de mon article -->
        <div id="contenuArticle">
            <?= $contenuArticle[0]['contenu'] ?>
        </div>
    </div>

    
</section>

<section>
    <!-- Faire en sorte que uniquement les personne connecter voyent les commentaire -->
    <?php
        if(isset($_SESSION['user']['login'])) {
    ?>
    <div class="mainArticle">
        <!-- J'injecterai les commentaires de mes users -->
            <?php 
                require '../../src/page/articleInclude/commentaire.php';
            ?>
    </div>
    <?php
     }
    ?>
</section>

<?php
    require "../../src/common/footer.php"
?>