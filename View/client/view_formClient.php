<?php
 $contenu='';
ob_start(); ?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div>
    <form method="GET">
     NOM<input type="text" name="nom" required><br>
     PRENOM<input type="text" name="prenom" required><br>
     ADRESSE<input type="text" name="adresse" required><br>
     CODE POSTAL<input type="text" name="postal" required><br>
     VILLE<input type="text" name="ville" required><br>
     TELEPHONE<input type="text" name="tel" required><br>
     <input type="hidden" name="action" value="MAJajoutClient">
     <input type="submit" value="VALIDER"><br>
    </form>
<div>

   <?php $contenu .= ob_get_clean(); 

//require("View/template.php");
require('View/tickets/gabarit.php');