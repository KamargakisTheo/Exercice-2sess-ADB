<?php

function dbRegister ($nom, $prenom, $login, $email, $mdp, $clef, $roleId) {
    
    $bdd = dbAccess();
    $requete = $bdd->prepare(" INSERT INTO users (nom, prenom, login, email, mdp, clef, roleId) VALUES(?, ?, ?, ?, ?, ?, ?)");
    $requete->execute(array($nom, $prenom, $login, $email, $mdp, $clef, $roleId)) or die (print_r($requete->errorInfo(), true));
    $requete->closeCursor();
}

?>