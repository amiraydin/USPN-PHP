<?php
require('./src/connection.php');
require('./control/roles.php');
require('./control/statut.php');
### ajouter des utilisateurs (individus)

if (
    isset($_POST['prenom']) && isset($_POST['nom'])
    && isset($_POST['email']) && isset($_POST['pass'])
    && isset($_POST['confirmpass'])
    && isset($_POST['date_naissance']) && isset($_POST['role'])
) {
    $nom = strtoupper($_POST['nom']);
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass_confirm = $_POST['confirmpass'];
    $dateNaissance =  $_POST['date_naissance'];
    $roleId = roleControl($_POST['role']);
    // echo $roleId;

    // if ($pass != $pass_confirm) {
    //     header('location: ../test/?error=1&pass=1');
    //     exit();
    // }
    // $req = $bdd->prepare('SELECT count(*) as numEmail FROM personnel WHERE email = ?');
    // $req->execute(array($email));
    // $email_verif = $req->fetch();
    // echo $email_verif;
    // $roleGet = $bdd->prepare('SELECT Id_role from role where nom_role = ? ');
    // $roleGet->execute(array($role));

    // $reqRole = $bdd->prepare('INSERT INTO role(nom_role) VALUES(?)');
    // $reqRole->execute(array($role));
    // $reqRole->closeCursor();

    // echo 'id est' . ' voila !';
    // echo 'tout va bien !';
    // $signupReq = $bdd->prepare('INSERT INTO personnel(prenom, nom, email, pwd, date_naissance, Id_role) 
    // VALUES(?, ?, ?, ?, ?, ?)') or die(print_r($bdd->errorInfo()));
    // $signupReq->execute(array($prenom, $nom, $email, $pass, $dateNaissance));
    // // echo 'tu es là !';
    // $signupReq->closeCursor();
    // header('location: ./index.php');
    // exit(); // à ne pas oublier de fermer la session a chaque redirection.
}
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
    <link rel="stylesheet" href="./styles/index.css">
    <title>inscription</title>
</head>

<body>
    <?php include('./src/navbar.php'); ?>
    <main class="main">
        <?php include('./src/sidebar.php'); ?>
        <div class="tetedate">
            <h1>Inscription</h1>
            <?php
            setlocale(LC_TIME, 'FR');
            date_default_timezone_set('Europe/Paris');
            echo utf8_encode(strftime('%A %d %B %Y'));
            ?>
        </div>
        <?php
        if (isset($_GET['error'])) {
            if (isset($_GET['pass']) == 1) {
                echo '<h4> le mot de passe ne match pas ! </h4>';
            }
        }
        ?>

        <form class="signup" action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Nom</td>
                    <td><input type="text" name="nom"></td>
                </tr>
                <tr>
                    <td>Prenom</td>
                    <td><input type="text" name="prenom"></td>
                </tr>
                <!-- <tr>
                    <td>Email</td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td>Mot de passe</td>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td>Confirmez mot de passe</td>
                    <td><input type="password" name="confirmpass"></td>
                </tr> -->
                <tr>
                    <td>Departement</td>
                    <td><input type="text" name="departement"></td>
                    <td>date_debut <input type="date" name="dep_date_debut"> </td>
                    <td>date_fin <input type="date" name="dep_date_fin"> </td>
                </tr>
                <tr>
                    <td>Discipline</td>
                    <td><input type="text" name="discipline"></td>
                    <td>date_debut <input type="date" name="dis_date_debut"> </td>
                    <td>date_fin <input type="date" name="dis_date_fin"> </td>
                </tr>
                <tr>
                    <td>Service</td>
                    <td><input type="text" name="service"></td>
                    <td>date_debut <input type="date" name="ser_date_debut"> </td>
                    <td>date_fin <input type="date" name="ser_date_fin"> </td>
                </tr>
                <tr>
                    <td>role</td>
                    <td><select name="role" id="roles">
                            <option value="visiteur">visiteur</option>
                            <option value="secretaire">secretaire</option>
                            <option value="admin">admin</option>
                            <option value="sup_admin">sup_admin</option>
                        </select>
                    </td>
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
        <h3>Sinon connectez vous <a href="./src/login.php">Login</a></h3>
    </main>

</body>

</html>