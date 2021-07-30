<?php
     $title = "Register";
    require "../../src/common/template.php";
    require "../../src/function/function.php";
    require "../../src/function/dbLogin.php";
    require "../../src/function/dbFunction.php";

    if(isset($_POST["prenom"]) && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["mdp"]) && !empty($_POST["mdp2"])) {

        $option = array(

            "prenom" => FILTER_SANITIZE_STRING,
            "nom" => FILTER_SANITIZE_STRING,
            "pseudo" => FILTER_SANITIZE_STRING,
            "email" => FILTER_VALIDATE_EMAIL,
            "mdp" => FILTER_SANITIZE_STRING,
            "mdp2" => FILTER_SANITIZE_STRING

        );
        
        $result = filter_input_array(INPUT_POST, $option);

        $prenom = $result["prenom"];
        $nom = $result["nom"];
        $login = $result["pseudo"];
        $email = $result["email"];
        $mdp = $result["mdp"];
        $mdp2 = $result["mdp2"];
        $clef = 0;
        $roleId = 3;

        if ($mdp == $mdp2) {
            //hash du mdp
            $mdpHash = md5($mdp);
            //générée grain de sel
            $sel = grainDeSel(rand(5,20));
            // mdp envoyer
            $mdpToSend = $mdpHash . $sel;


        } else {

            //boolen de controle
            echo "mdp pas correct lol";
            // j'active une session pour dire que les mdp sont pas correct

            //recharger ma page
            /* header("../../src/page/register.php");
            exit(); */

        }


        dbRegister($nom, $prenom, $login, $email, $mdpToSend, $clef, $roleId);
    }
    

?>



<body>

<section class="formulaire">
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <thead>
                <tr>
                    <th>Enregistrez-vous</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Prénom : </td>
                    <td><input type="text" name="prenom" require placeholder="Ex: Joseph"></td>
                </tr>
                <tr>
                    <td>Nom : </td>
                    <td><input type="text" name="nom" require placeholder="Ex: Joestar"></td>
                </tr>
                <tr>
                    <td>Pseudo : </td>
                    <td><input type="text" name="pseudo" require placeholder="Ex: JoJo234"></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type="email" name="email" require placeholder="Exemple@email.com"></td>
                </tr>
                <tr>
                    <td>Mot de passe : </td>
                    <td><input type="password" name="mdp" require placeholder="Ne le divugler a personne !"></td>
                </tr>
                <tr>
                    <td>Mot de passe : </td>
                    <td><input type="password" name="mdp2" require placeholder="Retapez votre mot de passe."></td>
                </tr>
<!--                 <tr>
                    <td>Uploader un avatar: </td>
                    <td><input type="file" name="avatar"></td>
                </tr> -->
                <tr>
                    <td><input type="submit" value="Création du compte" class="send"></td>
                </tr>       
            </tbody>
        </table>
    </form>
</section>

<?php
    require "../../src/common/footer.php"
?>
</body>
