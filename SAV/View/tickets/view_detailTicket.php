<?php

$contenu =

    "<div class>
        <span class=>
            <p class=>Ticket n°" . $liste['Num_tick'] . "</p> \n" .
    "Date : " . $liste['Date_tick'] . "<br/> \n" .
    "Technicien : " . $liste['Log_name'] . "<br/> \n" .
    "Numéro de commande : " . $liste['Num_comm'] . "<br/> \n" .
    "Type de ticket : " . $liste['Type_tick'] .
    "</span>" .
    "<form class=btnTickets action='indexTickets.php' method='get'> \n" .
    "<textarea name='comment' cols='30' rows='10>Commentaire</textarea>" .

    "<input type='hidden' name='action' value='MAJ'" . $action . " />\n" .

    "<input type='hidden' name='idContact' value=" . $liste['Num_tick'] . " />\n" .
    "<input type='submit' value='Modifier' />\n" .
    "<input type='submit' value='Supprimer' />\n" .
    "</form>
        </div>";


//Infos ticket
// Libelle article
// Commande
// Commentaire
// Modifier et supprimer

require('View/tickets/gabarit.php');

?>





</form>