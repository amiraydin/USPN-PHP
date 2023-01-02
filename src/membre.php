<?php 
require("./connection.php");
$reqMember = $bdd->query("SELECT `nom`, `prenom`, `email_prof` FROM `personnel` p, `email` e 
WHERE p.Id_personnel = e.Id_email");
$membresList= [];
while ($row = $reqMember->fetch()) {
    $list = [
        'nom' => $row['nom'],
        'prenom' => $row['prenom'],
        'email' => $row['email_prof'],
    ];
    $membresList[] = $list;
}

?>

<div class="membreside">
    <?php foreach ($membresList as $membre) { ?>
        <input class="membre" draggable="true" 
            value="<?php echo strtoupper($membre['nom']) ."/".$membre['prenom']; 
                echo '/'. $membre['email']; ?>"
        />
    <?php } ?>
</div>



<style>
    /* Style the membreside - fixed full height */
    .membreside {
        padding: 5px;
        min-height: fit-content;
        width: 350px;
        position: absolute;
        z-index: 1;
        top: 85px;
        right: 25;
        background-color: #F3F2F1;
        /* overflow-x: hidden; */
    }

    /* Style membreside links */
    .membreside .membre {
        width: 340px;
        padding: 5px;
        border: solid 1px ;
        display: block;
    }

    /* Style links on mouse-over */
    .sidebar a:hover {
        color: #3c11da;
    }
</style>