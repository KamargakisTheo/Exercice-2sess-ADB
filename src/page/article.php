<?php
    require "../../src/common/template.php"
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title><?=$title?></title>
</head>
<body>   
<section>
    <div class="headarticle">
        <div>
            <p>image</p>
        </div>
        <div>
            <p>Titre de l'article</p>
        </div>
    </div>
    <div class="mainarticle">
        <p>Ceci n'est pas un article.</p>
    </div>
    <div class="commentaire">
        <p>Ceci n'est pas un commentaire.</p>
    </div>
</section>

<footer>
<?php
    require "../../src/common/footer.php"
?>
</footer>
</body>
</html>