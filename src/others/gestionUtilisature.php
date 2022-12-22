<?php
//se connecter de base de données 
// HOTE : localhost - sql.monserveur.com
// NOME DE BD : le nom de votre base 
// LOGIN : root 
// MDP : ici c rien
try {
    $bdd = new PDO('mysql:host=localhost;dbname=uspn;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

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

    $poRequete = $bdd->prepare('INSERT INTO individu(prenom, nom, email, pwd, date_naissance) 
    VALUES(?, ?, ?, ?, ?)') or die(print_r($bdd->errorInfo()));
    $poRequete->execute(array($prenom, $nom, $email, $pass, $dateNaissance));
    $poRequete->closeCursor();
    header('location: ../test');
    exit(); // à ne pas oublier de fermer la session a chaque redirection.
}

// $requetes = $bdd->exec('INSERT INTO individu(nom, prenom, date_naissance, email, pwd, num_mobile) VALUES("SOLEN","sarah","1995-07-02", "sarah@gmail.com", "sam12123", 0755854577)') or die(print_r($bdd->errorInfo())); // die (afficher) est pour afficher si il y a une error

### ajouter des adresse
// $reqi = $bdd->exec('insert into adresse(`adresse`, `code_postal`, `ville`, `pays`, `Id_individu`) VALUES("16 rue des batignolles", 75008, "Paris", "France", 5)');

### modifier un utilisateur 
// $requetes = $bdd->exec('UPDATE individu SET ... '); comme un requete SQL

### supprimer un utilisateur
// $del = $bdd->exec('delete from individu where prenom = "sasa"');

### lire des infos
### jointures interne (inner join) extern (left join(il prend tout ce qui est dans le table left meme si qq valeur soit vide)/ right join (il prend tout ce qui est dans le table right meme si ...))
// $requete = $bdd->query('select nom, prenom, email, adresse from individu, adresse where individu.id_individu = adresse.id_individu order by 1,2');
// $prenom = "salvador"; // vrai
// $prenom = '" or 1=1#'; // un haker(ca va afficher tout)
// $prenom = htmlspecialchars($prenom); //premier pas pour se proteger qu'on l'utilise de moins en moins 
// deuxime pas c'est d'utiliser la function prepare() et l'executer 
//avec execute(array(?, ?, ... tout les paramettre qu'on a mis dans notre requete))
// qui securise bien notre code a la place de query(). 
// $nom = "SOLEN";
// $requete = $bdd->prepare('select nom, prenom, email, date_naissance 
//     from individu');
// $requete->execute();
// prepare() il prepare le requete mais il n'execute pas
// $requete = $bdd->prepare('select nom, prenom, email, adresse 
//     from individu 
//     inner join adresse  
//     on individu.id_individu = adresse.id_individu 
//     where prenom = ? || nom = ?');
// $requete->execute(array($prenom, $nom));

// echo '<table border>
//     <tr>
//         <th>Index</th>
//         <th>Prenom</th>
//         <th>Nom</th>
//         <th>Email</th>
//         <th>date_naissance</th>
//     </tr>';
// $i = 0;
// while ($donnes = $requete->fetch()) {
//     echo '<tr>
//             <td>' . $i . '</td>
//             <td>' . $donnes['prenom'] . '</td>
//             <td>' . $donnes['nom'] . '</td>
//             <td>' . $donnes['email'] . '</td>
//             <td>' . $donnes['date_naissance'] . '</td>
//         </tr>';
//     $i++;
// }
// <td>' . sha1($donnes['adresse']) . '</td>
// sha1() crypter nos données pas bien securisé 
// md5() cryptage mais moins securisé 
// tout les deux peuvent etre decrypter avec le site md5/sha1 decrypte ! 
// pour les securisé on peut ajouter un grain() ou on souhaite
// ex: 'sha1($donnes['adresse']) 58fy'// ici il va ajouter 58fy a la fin de chaque 
// mote de passe ou n'aimporte quel donnees qu'on va crypter  
// $requete->closeCursor(); //pour fermer notre requete
// echo '</table></br>'; // fermer la table !!!!
// sleep(2);
// ajouter un utlisiteur 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <title>inscription</title>
</head>

<body>
    <h1>Inscription</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>prenom</td>
                <td><input type="text" name="prenom"></td>
            </tr>
            <tr>
                <td>nom</td>
                <td><input type="text" name="nom"></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>mot de passe</td>
                <td><input type="password" name="pass"></td>
            </tr>
            <tr>
                <td>confirmer mot de passe</td>
                <td><input type="password" name="confirmpass"></td>
            </tr>
            <tr>
                <td>date de naissance </td>
                <td>
                    <!-- <input type="date" name="date_naissance" value="2022-12-05"> -->
                    <input type=date id="date_naissance" name="date_naissance">
                    <script>
                        document.getElementById('date_naissance').value = new Date().toISOString().substring(0, 10);
                        // console.log(new Date().toJSON().slice(0,10));
                        // console.log(new Date().toISOString().substring(0, 10));
                        // console.log(prenom.value, nom.value, email.value, pass.value, date_naissance.value);
                    </script>
                </td>
            </tr>
        </table>
        <button type="submit">envoyer</button>
    </form>
    <h3>sinon connectez vous <a href="./login.php">login</a></h3>
</body>

</html>