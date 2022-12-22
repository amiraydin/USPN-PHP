<?php
//envoi fichier php
// $_FILES['image']['name']; //nom 
// $_FILES['image']['type']; //type ex: image/png 
// $_FILES['image']['size']; //taille 
// $_FILES['image']['tmp_name']; //emplacement temporaire  
// $_FILES['image']['error']; //erreur

//image uploading
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $error = 1;
    if ($_FILES['image']['size'] <= 300000) {
        $informationsImage = pathinfo($_FILES['image']['name']);
        $extensionImage = $informationsImage['extension'];
        $extensionsArray = array('png', 'gif', 'jpg', 'jpeg');
        $address = 'uploads/' . time() . rand() . '.' . $extensionImage;
        //.basename($_FILES['image']['name']) on peux le concatener avec la fonction time() a la place de rand().'.'.$extensionImage , on ajoute tout ça pour ne pas confondre deux images avec meme nom dans notre server.
        if (in_array($extensionImage, $extensionsArray)) {
            move_uploaded_file($_FILES['image']['tmp_name'], $address);
            $error = 0;
        }
    } else if (isset($error) && $error == 1) {
        echo 'Votre image ne peut pas être envoyée, verifiez son extension et sa taille (max 3mo)';
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Pic picture</title>
</head>

<body>
    <header class="p-3">
        <h1 class="text-center">Heberger votre image</h1>
    </header>
    <?php
    if (isset($error) && $error == 0) {
        echo '
                    <div class="bg-secondary col-12 d-flex justify-content-center align-items-center flex-column">
                        <img class="img-fluid col-4 rounded" src=' . $address . '></img>
                        <input class="col-6 rounded text-center" type="text" value="http://localhost/test/' . $address . '"></input>
                    </div>
                    ';
    }
    ?>
    <div class="col-8 d-flex justify-content-center pt-4">
        <form class="col-6 d-flex flex-column justify-content-center" action="" method="post" enctype="multipart/form-data">
            <div class="">
                <input type="file" name="image" required class="form-control">
            </div>
            <div class="">
                <label for="prenom">prenom</label>
                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="prenom">
            </div>
            <button type="submit" class="btn btn-primary col-3 mt-3">Envoyer</button>
        </form>
    </div>
</body>

</html>