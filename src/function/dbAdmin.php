<?php
    function dbListeCategorie() {
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT * FROM categoriearticle") or die (print_r($requete->errorInfo(), true));

        while ($donnée = $requete->fetch()) {

            $listeCategorie[] = $donnée;
            
        }
        
        return $listeCategorie;


        $requete->closeCursor();
    }

    function dbListeArticle() {
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT * FROM articles") or die (print_r($requete->errorInfo(), true));

        while ($donnée = $requete->fetch()) {

            $listeArticle[] = $donnée;
            
        }
        
        return $listeArticle;


        $requete->closeCursor();
    }

    function dbListeUser() {
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT * FROM users") or die (print_r($requete->errorInfo(), true));

        while ($donnée = $requete->fetch()) {

            $listeUser[] = $donnée;
            
        }
        
        return $listeUser;


        $requete->closeCursor();
    }

    function dbListeCommentaire() {
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT * FROM commentaire") or die (print_r($requete->errorInfo(), true));

        while ($donnée = $requete->fetch()) {

            $listeCommentaire[] = $donnée;
            
        }
        
        return $listeCommentaire;


        $requete->closeCursor();
    }
?>