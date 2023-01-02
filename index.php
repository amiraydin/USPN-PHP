<?php
require('./src/connection.php');
require('./control/roles.php');
require('./control/statut.php');
### ajouter des utilisateurs (individus)
// isset($_POST['pass']) && isset($_POST['confirmpass']) 
// $pass = $_POST['pass'];
// $pass_confirm = $_POST['confirmpass'];
$reqStatut = $bdd->prepare('SELECT * FROM statut');
$reqStatut->execute();
$resStatut = $reqStatut->fetchAll();

if (
    isset($_POST['prenom']) && isset($_POST['nom']) &&
    isset($_POST['date_naissance']) && isset($_POST['email_pro'])
    && isset($_POST['role']) && isset($_POST['genre'])
    && isset($_POST['statut'])
) {
    //strtoupper($_post['nom']) en get !
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $genre = $_POST['genre'];
    $dateNaissance =  $_POST['date_naissance'];
    $emailPro = $_POST['email_pro'];
    $roleId = roleControl($_POST['role']);
    $statutId = $_POST['statut'];

    if (isset($_POST['email_per']))
        $emailPer = $_POST['email_per'];

    if (
        isset($_POST['departement'])  &&
        isset($_POST['dep_date_debut']) && isset($_POST['dep_date_fin'])
    ) {
        $departement = $_POST['departement'];
        $depDateDebut = $_POST['dep_date_debut'];
        $depDateFin = $_POST['dep_date_fin'];
    }
    if (
        isset($_POST['discipline']) &&
        isset($_POST['dis_date_debut']) && isset($_POST['dis_date_fin'])
    ) {
        $discipline = $_POST['discipline'];
        $disDateDebut = $_POST['dis_date_debut'];
        $disDateFin = $_POST['dis_date_fin'];
    }
    if (isset($_POST['specialite']))
        $specialite = $_POST['specialite'];
    if (
        isset($_POST['service']) &&
        isset($_POST['ser_date_debut']) && isset($_POST['ser_date_fin'])
    ) {
        $service = $_POST['service'];
        $serDateDebut = $_POST['ser_date_debut'];
        $serDateFin = $_POST['ser_date_fin'];
    }
    if (isset($_POST['email_pro']))
        $mailPro = $_POST['email_pro'];
    if (isset($_POST['email_per']))
        $mailPer = $_POST['email_per'];

    if (isset($_POST['numero_pro']))
        $mobilePro = $_POST['numero_pro'];
    if (empty($_POST['numero_pro']))
        $mobilePro = NULL;
    if (isset($_POST['numero_per']))
        $mobilePer = $_POST['numero_per'];
    if (empty($_POST['numero_per']))
        $mobilePer = null;

    // echo "mobile prof : " . gettype($mobilePro)  . " <br>";
    // echo "mobile perso : " . gettype($mobilePer)  . "<br> ";
    // echo "email prof : " . gettype($mailPro)  . " <br>";
    // echo "email perso : " . gettype($mailPer)  . " ";

    if (!empty($mailPro) || !empty($mailPer)) {
        $reqMail = $bdd->prepare('INSERT INTO email(email_prof, email_perso) VALUES(?, ?)')
            or die(print_r($bdd->errorInfo()));
        $reqMail->execute(array($mailPro, $mailPer));
        $emailId = $bdd->lastInsertId();
        // echo "email Id" . $emailId;
    }
    if (!empty($mobilePro) || !empty($mobilePer)) {
        $reqMobile = $bdd->prepare('INSERT INTO mobile(mobile_prof, mobile_perso) VALUES(?, ?)')
            or die(print_r($bdd->errorInfo()));
        $reqMobile->execute(array($mobilePro, $mobilePer));
        $mobileId = $bdd->lastInsertId();
        // echo "moile Id" . $mobileId;
    }

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


    $signupReq = $bdd->prepare('INSERT INTO personnel(nom, prenom, sexe, date_naissance, Id_role, Id_mobile, Id_email, Id_statut) 
    VALUES(?, ?, ?, ?, ?, ?, ?, ?)') or die(print_r($bdd->errorInfo()));
    $signupReq->execute(array($nom, $prenom, $genre, $dateNaissance, $roleId, $mobileId, $emailId, $statutId));
    // echo 'tu es là !';
    // $signupReq->closeCursor();
    // header('location: ./index.php');
    // exit(); // à ne pas oublier de fermer la session a chaque redirection.
    $reqMail->closeCursor();
    $reqMobile->closeCursor();
    $signupReq->closeCursor();
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
            $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
            echo $formatter->format(time());
            // echo '<br>';
            // $date = DateTimeImmutable::createFromFormat('U', time());
            // echo $date->format('d-m-Y');
            ?>
        </div>
        <!-- <?php
                // if (isset($_GET['error'])) {
                //     if (isset($_GET['pass']) == 1) {
                //         echo '<h4> le mot de passe ne match pas ! </h4>';
                //     }
                // }
                ?> -->
        <form class="signup" action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Nom</td>
                    <td><input type="text" name="nom" placeholder="nom *"></td>
                </tr>
                <tr>
                    <td>Prenom</td>
                    <td><input type="text" name="prenom" placeholder="prenom *"></td>
                </tr>
                <tr>
                    <td>Genre</td>
                    <td>
                        <select name="genre">
                            <option value="NULL"></option>
                            <option value="M">Monsieur</option>
                            <option value="F">Madame</option>
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
                        </script>*
                    </td>
                </tr>
                <tr>
                    <td>Email Professionnelle</td>
                    <td><input type="email" name="email_pro" placeholder="votre mail pro *"></td>
                </tr>
                <tr>
                    <td>Email Personnel</td>
                    <td><input type="email" name="email_per" placeholder="optionnelle"></td>
                </tr>
                <tr>
                    <td>Numero Professionnelle</td>
                    <td><input type="tel" name="numero_pro"></td>
                </tr>
                <tr>
                    <td>Numero Personnel</td>
                    <td><input type="tel" name="numero_per" placeholder="optionnelle"></td>
                </tr>
                <tr>
                    <td>Statut</td>
                    <td>
                        <select name='statut'>
                            <?php foreach ($resStatut as $value) { ?>
                                <option value="<?php echo $value['Id_statut']; ?>">
                                    <?php echo $value['nom_statut']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <!--<tr>
                    <td>Mot de passe</td>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td>Confirmez mot de passe</td>
                    <td><input type="password" name="confirmpass"></td>
                </tr> -->
                <tr>
                    <td>Departement</td>
                    <td><input type="text" name="departement" placeholder="nom departement"></td>
                    <td>date_debut <input type="date" name="dep_date_debut"> </td>
                    <td>date_fin <input type="date" name="dep_date_fin"> </td>
                </tr>
                <tr>
                    <td>Discipline</td>
                    <td><input type="text" name="discipline" placeholder="intitulé discipline"></td>
                    <td>date_debut <input type="date" name="dis_date_debut"> </td>
                    <td>date_fin <input type="date" name="dis_date_fin"> </td>
                </tr>
                <tr>
                    <td>specialité</td>
                    <td><input type="text" name="specialite" placeholder="intitulé specialité"></td>
                </tr>
                <tr>
                    <td>Service</td>
                    <td><input type="text" name="service" placeholder="votre service"></td>
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
            </table>
            <button type="submit">Envoyer</button>
        </form>
        <h3>Sinon connectez vous <a href="./src/login.php">Login</a></h3>
    </main>

</body>

<?php
$reqStatut->closeCursor();
?>

</html>