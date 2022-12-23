<?php
require('./src/connection.php');

$statutCheck = $bdd->prepare('SELECT count(*) as statutNb FROM statut');
$statutCheck->execute();

while ($statutVerif = $statutCheck->fetch()) {
    if ($statutVerif['statutNb'] == 0) {
        $statutCreation = $bdd->prepare('INSERT INTO statut(id_statut, nom_statut) 
        VALUES (1, NULL), (2, "VAC"), (3, "Doc_Contractuel"), (4, "ENS_2"), (5, "ECC"), (6,"ATER"),
        (7, "PAST"), (8, "PU_PR"), (9, "MCF_HDR"), (10, "BIATSS"), (11,"PACTE"),
        (12, "PUPH"), (13, "MCUPH"), (14, "MSS")');
        $statutCreation->execute();
        $statutCreation->closeCursor();
    }
}
$statutCheck->closeCursor();
