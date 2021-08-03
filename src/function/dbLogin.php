<?php

function dbRegister ($nom, $prenom, $login, $email, $mdp, $clef, $roleId, $ban) {
    
    $bdd = dbAccess();
    $requete = $bdd->prepare(" INSERT INTO users (nom, prenom, login, email, mdp, clef, roleId, ban) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
    $requete->execute(array($nom, $prenom, $login, $email, $mdp, $clef, $roleId, $ban)) or die (print_r($requete->errorInfo(), true));
    $requete->closeCursor();
}

function dbCheckRegister ($email, $login) {
    $bdd = dbAccess();

    $requete = $bdd->prepare("SELECT count(*) AS x FROM users WHERE email = ? OR login = ?");
    $requete->execute(array($email, $login)) or die(print_r($requete->errorInfo(), true));
    while($données = $requete->fetch()) {

        if($données["x"] != 0)

        {

                 

            header("location: ../../src/page/register.php?errorAccount=true&msg=Le login ou l'email existe déjà");

            exit();

        }


    }

    $requete->closeCursor();
}

function login($pseudo, $mdp) {

    // connection à la db
    $bdd = dbAccess();

    // requete pour récupérer l'user correspondant au login entré
    $requete = $bdd->query("SELECT * FROM users u INNER JOIN role e ON e.roleId = u.roleId");

    // Traitement de la requete
    while($données = $requete->fetch()) {

        if($données["login"] == $pseudo){
            
            $sel = md5($mdp) . $données["ban"];
            
            
            if($données["mdp"] == $sel){

                $_SESSION["connect"] = true;

                $_SESSION["user"] = [

                    "id" => $données["userId"],

                    "nom" => $données["nom"],

                    "prenom" => $données["prenom"],

                    "login" => $données["login"],

                    "email" => $données["email"],

                    "role" => $données["nomRole"]

                ];

            // J'active la session connecté

            $_SESSION["connecté"] = true;

            // Je redirige vers la page account

            header("location: ../../src/page/index.php");

            exit();

        }
        
        else{
            
            
            
            header("location: ../../src/page/login.php?erreur=Mot de passe incorrect");
            
            exit();
            
        }
        
        
        }
    }
    //J'active ma session user avec les infos dont je pourrai avoir besoin            
    // tant que mon utilisateur est connecté 


    // J'active la session connecté


    // Je redirige vers la page account


    // Si mon script arrive ici, il est sorti de ma boucle sans trouver de user


}
?>