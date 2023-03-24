15 lines (11 sloc)  402 Bytes

<?php

$contenu = "<div class = 'divAcc'>
              <button class='btnListe'>
                <a href='indexTickets.php?action=listeTickets'>Liste des tickets</a>
              </button>" .
  "<button  class='btnAjout' >
                <a href='indexTickets.php?action=ajoutTicket'>Ajouter un ticket</a>
              </button>" .
  "            </div>" .


  '<div class = divAcc>
  <button class=btnListe>
    <a href="indexTickets.php?action=listCommandes">Liste des commandes</a>
  </button>' .
'<button class=btnAjout>
    <a href="indexTickets.php?action=ajoutCommande">Ajouter une commande</a>
  </button>' .
'            </div>';

  
  ;


require('View/tickets/gabarit.php');