<?php
// il faut le mettre tout en haut ttemps 
// session_start();
// session_destroy();

if (!empty($_POST['pseudo'])) {
    $pseudo = $_POST['pseudo'];

    // setcookie('pseudo', $pseudo, time() + 30 * 24 * 3600); //cookie
    $_SESSION['pseudo'] = $pseudo;
}

// session est plus securisé que cookie .
// session va disparaite quand on ferme la session de notre navigature .
// par contre setcookie on lui definir un temps d'expiration par exemple un an . 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <title>PHP</title>
</head>

<body>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <table>
            <h2>Entrez votre pseudo</h2>
            <tr>
                <td>pseudo</td>
                <td><input type="text" name="pseudo"></td>
            </tr>

        </table>
        <button type="submit">envoyer</button>
    </form>

    <?php if (!empty($_SESSION['pseudo'])) { // $_COOKIE pour cookie['pseudo']
        // echo '<h3>Bienvenue ' . $_COOKIE['pseudo'] . '</h3>';
        echo '<h3>Bienvenue ' . $_SESSION['pseudo'] . '</h3>';
    } ?>

</body>

</html>