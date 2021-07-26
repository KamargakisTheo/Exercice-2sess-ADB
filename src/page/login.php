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
    <form action="" method="post" class="login">
        <table>
            <thead>
                <tr>
                    <th>Identifiez-vous</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pseudo: </td>
                    <td><input type="text" name="pseudo" require placeholder="Entrez votre pseudo"></td>
                </tr>
                <tr>
                    <td>Mot de passe: </td>
                    <td><input type="password" name="mdp" require placeholder="Entrez votre mot de passe"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Login"></td>
                </tr>
            </tbody>
        </table>
    </form>

    <p>Si vous ne possèdez pas de compte, vous pouvez vous en crée un <a href="../../src/page/register.php">ici</a></p>
</section>

<footer>
<?php
    require "../../src/common/footer.php"
?>
</footer>
</body>
</html>