<?php 
require("./connection.php");
$reqMember = $bdd->query("SELECT * FROM `personnel` p
INNER JOIN `email` e 
ON p.Id_personnel = e.Id_email");
$membresList= [];
while ($row = $reqMember->fetch()) {
    $list = [
        'IdPerso' => $row['Id_personnel'],
        'nom' => $row['nom'],
        'prenom' => $row['prenom'],
        'email' => $row['email_prof'],
    ];
    $membresList[] = $list;
}
?>

<html>
    <script>
    function allowDrop(ev) {ev.preventDefault();}

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.value);
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
    }
    </script>
    <main class="main">
        <div class="membreside">
            <p>Membre disponible</p>
            <?php foreach ($membresList as $val => $membre) { ?>
                <input ondragstart="drag(event)" class="membre" draggable="true" 
                    value="<?php echo strtoupper($membre['nom']) ."/ ".$membre['prenom']; 
                        echo '/ '. $membre['email']; ?>"
                />
            <?php } ?>
        </div>
        <div id="container">
            <input class="membre" ></input>
            <br>
            <input class="membre" ></input>
        </div>
    </main>
</html>




<style>
    .main {
        margin-left: 140px;
    }
    /* Style the membreside - fixed full height */
    .membreside {
        padding: 5px;
        min-height: fit-content;
        width: 350px;
        position: absolute;
        z-index: 1;
        top: 85px;
        right: 5px;
        background-color: #F3F2F1;
        /* overflow-x: hidden; */
    }

    /* Style membreside links */
    .membreside .membre {
        width: 340px;
        padding: 5px;
        border: solid 1px ;
        border-radius: 5px;
        display: block;
    }

    #container .membre {
        width: 320px;
        margin-left: 140px;
    }

    /* drag divs */

    #container{
        position: absolute;
        display: grid;
        width: 400px;
        margin: auto;
        justify-items: center;
        margin-top: 200px;
        left: 65px;
    }
</style>