<?php
    //Formulaire 
    if (isset($_POST['prenom']) && isset($_POST['nom'])) {
        $prenom = htmlspecialchars($_POST['prenom']); // il va eviter d'envoyer les codes en html ! use this for bloque first step of hack ! 
        $nom    = htmlspecialchars($_POST['nom']);
        echo 'Bonjour ' .$prenom. ' ' .$nom. ' !';
    }

    echo '
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <title>Document</title>
    </head>
    <body>
        <div class="col-8 d-flex justify-content-center pt-4">
            <form class="col-6 d-flex flex-column justify-content-center" action="" method="post">
                <div class="">
                    <label for="nom">nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="nom">
                </div>
                <div class="">
                    <label for="prenom">prenom</label>
                    <input type="text" name = "prenom" class="form-control" id="prenom" placeholder="prenom">
                </div>
                <div class="">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                <button type="submit" class="btn btn-primary col-3 mt-3">Envoyer</button>
            </form>
        </div>
    </body>
    </html>
    ';
?>