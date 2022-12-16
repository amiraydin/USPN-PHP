<?php
require('connection.php');
// $_POST['prenom'];
### ajouter des utilisateurs (individus)

if (
    isset($_POST['prenom']) && isset($_POST['nom'])
    && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['date_naissance'])
) {
    $prenom = $_POST['prenom'];
    $nom = strtoupper($_POST['nom']);
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $dateNaissance =  $_POST['date_naissance'];

    $req = $bdd->prepare('SELECT count(*) as numEmail FROM individu WHERE email = ?');
    $req->execute(array($email));
    $email_verif = $req->fetch();
    echo $email_verif;

    echo 'tout va bien !';
    $poRequete = $bdd->prepare('INSERT INTO individu(prenom, nom, email, pwd, date_naissance) 
    VALUES(?, ?, ?, ?, ?)') or die(print_r($bdd->errorInfo()));
    $poRequete->execute(array($prenom, $nom, $email, $pass, $dateNaissance));
    // echo 'tu es là !';
    $poRequete->closeCursor();
    header('location: ./signup.php');
    exit(); // à ne pas oublier de fermer la session a chaque redirection.
} else {
    // echo '<h3 class="text-center"> remplisez tout les information !</h3>'; // error quelque  par car il affich en cas de reussit
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous"> -->
    <title>inscription</title>
</head>

<body>
    <h1>Inscription</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Prenom</td>
                <td><input type="text" name="prenom" required></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><input type="text" name="nom" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Mot de passe</td>
                <td><input type="password" name="pass" required></td>
            </tr>
            <tr>
                <td>Confirmer mot de passe</td>
                <td><input type="password" name="confirmpass" required></td>
            </tr>
            <tr>
                <td>Date de naissance </td>
                <td>
                    <!-- <input type="date" name="date_naissance" value="2022-12-05"> -->
                    <input type=date id="datenaissance" name="date_naissance">
                    <script>
                        document.getElementById('datenaissance').value = new Date().toISOString().substring(0, 10);
                        // console.log(new Date().toJSON().slice(0,10));
                        // console.log(new Date().toISOString().substring(0, 10));
                        // console.log(prenom.value, nom.value, email.value, pass.value, date_naissance.value);
                    </script>
                </td>
            </tr>
        </table>
        <button type="submit">Envoyer</button>
    </form>
    <h3>Sinon connectez vous <a href="./login.php">Login</a></h3>
</body>

</html>