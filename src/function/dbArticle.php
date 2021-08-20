<?php

    function dbSendArticle($titre, $imgUrl, $contenu, $auteurId, $categorieArticleId, $onTop) {

        //Traitement de l'image envoyée
        $traiterImage = dbSendImg($imgUrl, "article");

        //Récuperer l'id de la catégorie d'article qui correspond à la selection de l'auteur
        $arrayCategorieId = dbListeCategorie($categorieArticleId);
        //J'envoie l'index récupéré dans une nouvelle variable
        $categorieArticleId = intval($arrayCategorieId[0][0]);
        // Envoyer article dans db
        $bdd = dbAccess();
        $requete = $bdd->prepare('INSERT INTO articles(titre, imgUrl, contenu, auteurId, categorieArticleId, onTop)
                                  VALUES(?, ?, ?, ?, ?, ?)');
        $requete->execute(array($titre, $traiterImage, $contenu, $auteurId, $categorieArticleId, $onTop)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
        // Vérifier si star est actif ou pas
        if ($onTop == 1) {
            // Envoyer l'article à la une dans la table star
            aLaUne($titre); 
        }


        
    }

    function dbSendImg($photo,$destination){

        if ($destination == "article") {

            $dossier = "../../src/img/article/" . time();
        }

        // Créer un tableau avec les extensions autorisée
        $extensionArray = ["png","jpg","jpeg","jfif","PNG","JPG","JPEG","JFIF"];

        // Récupérer toutes les infos du fichier envoyé
        $infoFichier = pathinfo($photo["name"]);

        // Je récupère l'extension du fichier envoyé
        $extensionImage = $infoFichier["extension"];

        // Extension autorisée ?
        if (in_array($extensionImage, $extensionArray)) {
            // Préparer le chemin répertoire + nom fichier
            $dossier.=basename($photo["name"]);
            // Envoyer mon fichier
            move_uploaded_file($photo["tmp_name"], $dossier);
        }
        return $dossier;
    }

    function aLaUne($valeur){
        $bdd = dbAccess();
        $requete = $bdd->prepare('SELECT articleId FROM articles WHERE titre = ?');
        $requete->execute(array($valeur)) or die(print_r($requete->errorInfo(), TRUE));
        
        while ($données = $requete->fetch()) {
            $articleId = $données[0];
            $intArticleId = intval($articleId);
        }
        
        $requete = $bdd->prepare('INSERT INTO misenavant(articleId) VALUES(?)');
        $requete->execute(array($intArticleId)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
    }

?>