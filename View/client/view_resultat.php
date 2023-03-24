<?php
echo "<br><br><br><br><br><br><br><br><br><br><br>";
$contenu = ($res === true) ? "Le client " . strtoupper($nom) . " " . ucfirst($prenom) . " a bien été ajouté." 
: "Votre client n'a pas été ajouté, le numéro de téléphone existe déjà.";
//require("View/template.php");
require('View/tickets/gabarit.php');





