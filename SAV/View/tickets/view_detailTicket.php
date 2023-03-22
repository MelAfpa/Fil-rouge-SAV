<?php
$contenu = '';

foreach ($detail as $detail):
    $contenu .= "<div class='detailTicket'>" .
        "<form action='indexTickets.php' method='get'>
        <p class='titreTick'>Ticket n°" . $detail['Num_tick'] . "</p> \n" .
        "<span class='donneesTicket'>Date</span> : " . $detail['Date_tick'] . "<br/> \n" .
        "<span class='donneesTicket'>Technicien</span> : " . $detail['Log_name'] . "<br/> \n" .
        "<span class='donneesTicket'>Numéro de commande</span> : " . $detail['Num_comm'] . "<br/> \n" .
        "<span class='donneesTicket'>Type de ticket</span> : " . $detail['Type_tick'] .
        "<br> " .

        "<span class='donneesTicket'>Etat</span> : " . $detail['Etat_comm'] . "<br> \n" .
        "<span class='donneesTicket'>Numéro facture</span> : " . $detail['Num_fact'] . "<br> \n" .
        "<span class='donneesTicket'>Nb article</span> : " . $detail['nb_art'] . "<br> \n" .
        "<span class='donneesTicket'>Libelle</span> : " . $detail['Libelle_art'] . "<br> <br> \n" .

        "<textarea name='comm' id='comm' cols='30' rows='10' placeholder='Commentaire' value='" . $detail['comm'] . "'></textarea><br><br> " .

        "<input type='submit' name='action' value='Enregistrer' />\n" .
        "<input type='submit' name='action' value='Modifier' />\n" .
        "<input type='submit' name='action' value='Archiver' />\n" .
        "</form></div>";
endforeach;






require('View/tickets/gabarit.php');

?>