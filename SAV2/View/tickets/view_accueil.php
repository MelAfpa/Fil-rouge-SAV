<?php

$contenu = "<div class = 'divAcc'>
              <button class='btnListe'>
                <a href='indexTickets.php?action=listeTickets'>Liste des tickets</a>
              </button>" .
  "<button disabled class='btnAjout' >
                <a href='indexTickets.php?action=ajoutTicket'>Ajouter un ticket</a>
              </button>" .
  "            </div>";


require('View/tickets/gabarit.php');

?>