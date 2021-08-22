<?php 

function envoyerCommentaires($articleId, $userId,$commentaire){
    $bdd = dbAccess();
    $requete = $bdd->prepare("INSERT INTO commentaire(articleId,userId,contenu)
                              VALUES (?,?,?)");
    $requete->execute(array($articleId, $userId,$commentaire)) or die(print_r($requete->errorInfo(), TRUE));
    if ($requete == false) {
        echo 'Erreur dans la recherche';
        exit();
    }
    $requete->closeCursor();
}


function getCommentaire(){
    $bdd = dbAccess();
    $requete = $bdd->query('SELECT * FROM commentaire') or die(print_r($requete->errorInfo(), TRUE));
    if ($requete == false) {
        echo 'Erreur dans la recherche';
        exit();
    }
    while ($données = $requete->fetch()) {
        $listeCommentaire[] = $données; 
    }
    $requete->closeCursor();
    return $listeCommentaire;
}

function getCommentaireById($articleId){
    $bdd = dbAccess();
    $requete = $bdd->prepare('SELECT * FROM commentaire c INNER JOIN users u ON c.userId = u.userId WHERE articleId = ?') or die(print_r($requete->errorInfo(), TRUE));
    $requete->execute(array($articleId));
    if ($requete == false) {
        echo 'Erreur dans la recherche';
        exit();
    }
    while ($données = $requete->fetch()) {
        $listeCommentaire[] = $données; 
    }
    $requete->closeCursor();
    if (isset($listeCommentaire)) {
        return $listeCommentaire;
    }
    
}
