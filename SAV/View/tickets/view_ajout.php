<?php
// Prépare les variables pour le gabarit
$titre = "Ajout d'un ticket";

if ($data === true) {
    $contenu = "<h2>Votre ticket a bien été ajouté</h2>";
} else {
    $contenu = "<h2>PB BDD : Votre ticket n'a pas été ajouté.</h2>";
}
require('View/tickets/gabarit.php');

?>