<?php

$contenu = '';

foreach ($detail as $detail):
    $contenu .= "<div class='detailTicket'>" .
        "<form action='indexTickets.php' method='get'>
            <p class='titreTick' name='num'>Ticket n°" . $detail['Num_tick'] . "</p> \n" .
        "<span class='donneesTicket'>Date</span> : " . $detail['Date_tick'] . "<br/> \n" .
        "<span class='donneesTicket'>Technicien</span> : " . $detail['Log_name'] . "<br/> \n" .
        "<span class='donneesTicket'>Numéro de commande</span> : " . $detail['Num_comm'] . "<br/> \n" .
        "<span class='donneesTicket'>Type de ticket</span> : " . $detail['Type_tick'] .
        "<br> " .

        "<span class='donneesTicket'>Etat</span> : " . $detail['Etat_comm'] . "<br> \n" .
        "<span class='donneesTicket'>Numéro facture</span> : " . $detail['Num_fact'] . "<br> \n" .
        "<span class='donneesTicket'>Référence</span> : " . $detail['Ref_art'] . " <br> \n" .
        "<span class='donneesTicket'>Libelle</span> : " . $detail['Libelle_art'] . "<br>  \n" .
        "<span class='donneesTicket'>Nb article</span> : " . $detail['nb_art'] . "<br><br> \n" .
        "<span class='donneesTicketComm'>Commentaire</span> : " . $detail['Comm'] . "<br> <br> \n" .

        "<input type='hidden' name='num' value=" . $detail['Num_tick'] . ">" .

        "<input type='submit' name='action' value='Modifier' />\n" .
        "<input type='submit' name='action' value='Supprimer' />\n" .
        "</form></div>";

endforeach;

$contenu .= "<a class='retListe' href='indexTickets.php?action=listeTickets'>Retourner à la liste des tickets</a>";

require('View/tickets/gabarit.php');

?>