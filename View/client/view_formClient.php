<?php

$content =
    '<form method="GET">' . "\n"
    . '  NOM<input type="text" name="nom" required><br>' . "\n"
    . '  PRENOM<input type="text" name="prenom" required><br>' . "\n"
    . '  ADRESSE<input type="text" name="adresse" required><br>' . "\n"
    . '  CODE POSTAL<input type="text" name="postal" required><br>' . "\n"
    . '  VILLE<input type="text" name="ville" required><br>' . "\n"
    . '  TELEPHONE<input type="text" name="tel" required><br>' . "\n"
    . '  <input type="hidden" name="action" value="MAJajoutClient">' . "\n"
    . '  <input type="submit" value="VALIDER"><br>' . "\n"
    . '</form>' . "\n";

require("View/template.php");