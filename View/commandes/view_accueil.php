<?php

$contenu = '<div class = divAcc>
              <button class=btnListe>
                <a href="indexCommandes.php?action=listeCommandes">Liste des commandes</a>
              </button>' .
  '<button class=btnAjout>
                <a href="indexCommandes.php?action=ajoutCommande">Ajouter une commande</a>
              </button>' .
  '            </div>';


require('View/commandes/gabarit.php');