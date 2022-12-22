<?php

//se connecter de base de données 
// HOTE : localhost - sql.monserveur.com
// NOME DE BD : le nom de votre base 
// LOGIN : root 
// MDP : ici c rien
// try {
//     $bdd = new PDO('mysql:host=localhost;dbname=uspn;charset=utf8', 'root', '');
// } catch (Exception $e) {
//     die('Erreur : ' . $e->getMessage());
// }

### ajouter des utilisateurs (individus)

// if (isset($_POST['email']) && isset($_POST['pass'])) {

//     $email = $_POST['email'];
//     $pass = $_POST['pass'];

//     $poRequete = $bdd->prepare('') or die(print_r($bdd->errorInfo()));
//     $poRequete->execute(array($email, $pass));
//     $poRequete->closeCursor();
//     header('location: ../test');
//     exit(); // à ne pas oublier de fermer la session a chaque redirection.
// }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../styles/index.css">
    <title>LOGIN</title>
</head>

<body>
    <header>
        <?php require('./navbar.php'); ?>
    </header>
    <main class="main">
        <h1>Connextion</h1>
        <section class="col-8 d-flex justify-content-center pt-4">
            <form action="" method="POST" enctype="multipart/form-data" class="col-6 d-flex flex-column justify-content-center">
                <table>
                    <tr>
                        <td>email</td>
                        <td><input type="email" id="email" name="email"></td>
                    </tr>
                    <tr>
                        <td>mot de passe</td>
                        <td><input type="password" name="pass"></td>
                    </tr>
                </table>
            </form>
            <button type="submit" class="btn btn-primary">envoyer</button>
        </section>
        <h3>Sinon connectez vous <a href="../">signup</a></h3>
    </main>
</body>

</html>