<?php
require('./src/connection.php');

$statutCheck = $bdd->prepare('SELECT count(*) as statutNb FROM statut');
$statutCheck->execute();

while ($statutVerif = $statutCheck->fetch()) {
    if ($statutVerif['statutNb'] == 0) {
        $statutCreation = $bdd->prepare('INSERT INTO statut(id_statut, nom_statut) 
        VALUES (1, "VAC"), (2, "Doc_Contractuel"), (3, "ENS_2"), (4, "ECC"), (5,"ATER"),
        (6, "PAST"), (7, "PU_PR"), (8, "MCF_HDR"), (9, "BIATSS"), (10,"PACTE"),
        (11, "PUPH"), (12, "MCUPH"), (13, "MSS")');
        $statutCreation->execute();
        $statutCreation->closeCursor();
    }
}
$statutCheck->closeCursor();
