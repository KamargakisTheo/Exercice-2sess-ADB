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

<section class="register">
    <form action="" method="post" class="login" enctype="multipart/form-data">
        <table>
            <thead>
                <tr>
                    <th>Enregistrez-vous</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Prénom: </td>
                    <td><input type="text" name="prenom" require placeholder="Ex: Joseph"></td>
                </tr>
                <tr>
                    <td>Nom: </td>
                    <td><input type="text" name="nom" require placeholder="Ex: Joestar"></td>
                </tr>
                <tr>
                    <td>Pseudo: </td>
                    <td><input type="text" name="pseudo" require placeholder="Ex: JoJo234"></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="email" name="email" require placeholder="Exemple@gmail.com"></td>
                </tr>
                <tr>
                    <td>Mot de passe: </td>
                    <td><input type="password" name="mdp" require placeholder="Ne le divugler a personne !"></td>
                </tr>
                <tr>
                    <td>Uploader un avatar</td>
                    <td><input type="file" name="avatar"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Création du compte"></td>
                </tr>       
            </tbody>
        </table>
    </form>
</section>

<footer>
<?php
    require "../../src/common/footer.php"
?>
</footer>
</body>
</html>