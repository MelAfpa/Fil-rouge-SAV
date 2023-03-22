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

    '<label for="type">Type de ticket :</label>' . "<br/> \n" .
    '<select name="type" id="type">' . '
        <option value = "EP" name="ep" >EP</option>' . '
        <option value = "EC" name="ec" >EC</option>' . '
        <option value = "NP" name="np" >NP</option>' . '
        <option value = "NPAI" name="npai" >NPAI</option>' . '
        <option value = "SAV" name="sav" >SAV</option>' . '
    </select>' . "<br/><br/> \n" .

    '<input type="hidden" name="action" value="MAJ' . $action . '">' . "\n" .

    '<input type="submit" value="Valider">' . "<br /> \n" .
    '</form>';

require('View/tickets/gabarit.php');

?>