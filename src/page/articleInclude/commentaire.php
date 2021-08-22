<?php 

    if (isset($_GET['id'])) {
        $articleId = $_GET['id'];
    }

    if (isset($_POST['commentaire']) && !empty($_POST['commentaire'])) {
            $userId = $_SESSION['user']['id'];
            $pseudo = $_SESSION['user']['login'];
        $commentaire = htmlspecialchars($_POST['commentaire']);
        envoyerCommentaires($articleId,$userId,$commentaire);
    }
    
    $listeCommentaire = getCommentaireById($articleId);
?>

<section>
    <table class="comment">
        <form action="../../../src/page/article.php?id=<?=$articleId?>#commentaire" method="post">
            <thead class="mb-1">
                <tr>
                    <td>Partage donc ton avis <?=$_SESSION['user']['login']?> !</td>
                </tr>
            </thead>
            <tbody>                 
                <tr>
                    <td><textarea name="commentaire" placeholder="Entrez votre commentaire..." cols="35" rows="5" required></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Envoie du commentaire"></td>
                </tr>
            </tbody>
        </form>
    </table>
</section>

<section class="listeComment">
<?php
    if (isset($listeCommentaire)) {
        foreach ($listeCommentaire as $value) {
            ?>
                <div class="commLogin mb-1">
                    <div class="mb-1">
                        <p id="peudocom">Pseudo: <?=$value['login']?></p>
                    </div>
                    <div>
                        <p><?=$value['contenu']?></p>
                    </div>
                </div>
            <?php
        }
    }
?>
</section>