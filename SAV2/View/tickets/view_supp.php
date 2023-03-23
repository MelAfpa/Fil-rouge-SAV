<?php

$contenu = '';

$contenu = "<p class='errTick'>Le ticket a bien été supprimé.</p><br><br>\n";

$contenu .= "<a class='retListe' href='indexTickets.php?action=listeTickets'>Retourner à la liste des tickets</a>";

require('View/tickets/gabarit.php');

?>