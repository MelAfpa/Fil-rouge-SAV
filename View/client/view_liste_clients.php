<?php
ob_start();

$contenu = "<br><br><br><br><br><br><br><br><br><br><br>";

foreach ($tClients as $client) {
    $contenu .= "<li>\n"
        . "ID: " . $client['Id_cli'] . " | NOM: " . $client['Nom_cli'] .
        " | PRENOM: " . $client['Prenom'] . " | ADRESSE: " . $client['Adr_cli'] .
        " | CODE POSTAL: " . $client['Code_postal'] . " | VILLE: " . $client['ville'] .
        " | TELEPHONE: " . $client['tel'] . "
        </li><br>\n";
}
$contenu .= '<form method="GET">
<input type="hidden" name="action" value="ajoutClient">
<input type="submit" name="Ajout" value="Ajouter un client" >
</form>';

$contenu .= ob_get_clean();

//require("View/template.php");
require('View/tickets/gabarit.php');