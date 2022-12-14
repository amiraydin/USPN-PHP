<?php
require('./src/connection.php');

$roleCheck = $bdd->prepare('SELECT count(*) as rolesNb FROM role');
$roleCheck->execute();

while ($roleVerif = $roleCheck->fetch()) {
    if ($roleVerif['rolesNb'] == 0) {
        $roleCreation = $bdd->prepare('INSERT INTO role(id_role, nom_role) 
        VALUES (1, "visiteur"), (2, "secretaire"), (3, "admin"), (4, "sup_admin")');
        $roleCreation->execute();
        $roleCreation->closeCursor();
    }
}
$roleCheck->closeCursor();

// foreach ($rolesArr as $key => $value) {
//     echo 'key = ' . $key . ' value ' . $value . '<br>';
// }
// $roleName = $bdd->prepare('SELECT nom_role FROM role');

function roleControl($x)
{
    $rolesArr = array('visiteur' => 1, 'secretaire' => 2, 'admin' => 3, 'sup_admin' => 4);
    $rolesLen = count($rolesArr);
    // echo 'len :' . $rolesLen . '<br>';
    // echo 'role depuis index :' . $x . '<br>';
    // echo 'role depuis role.php :' . $rolesArr[$x];
    for ($i = 0; $i < $rolesLen; $i++) {
        echo 'role :' . $rolesArr[$i] . '<br>';
        // if ($x == $rolesArr[$i]) {
        //     echo 'here !' . $rolesArr[$x];
        //     return $rolesArr[$x];
        // }
    }
    // return 0;
}
