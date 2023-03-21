<?php

$contenu = '<form action="indexTickets.php" method="get">' . "<br/> \n" .

    '<label for="num">Numéro de ticket :</label>' . "<br/> \n" .
    '<input type="number" name="num" id="num">' . "<br/><br/> \n" .

    '<label for="date">Date de commande :</label>' . "<br/> \n" .
    '<input type="date" name="date" id="date">' . "<br/><br/> \n" .

    '<label for="idUser">Id user :</label>' . "<br/> \n" .
    '<input type="number" name="user" id="idUser">' . "<br/><br/> \n" .

    '<label for="comm">Numéro de commande :</label>' . "<br/> \n" .
    '<input type="text" name="comm" id="comm">' . "<br/><br/> \n" .

    // '<label for="type">Type :</label>' . "<br/> \n" .
    // '<input type="text" name="type" id="type">' . "<br/><br/> \n" .

    '<input type="hidden" name="action" value="MAJ' . $action . '">' . "\n" .
    '<input type="submit" value="Valider">' . "<br /> \n" .
    '</form>';

require('View/tickets/gabarit.php');

?>