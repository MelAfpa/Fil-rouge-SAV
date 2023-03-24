<?php

$contenu = '<form class="formAjout" action="indexTickets.php" method="get">' . "<br/> \n" .

    '<label for="date">Date de commande :</label>' . " \n" .
    '<input type="date" name="date" id="date" required>' . " \n" .

    '<label for="tech">Technicien </label>
        <select class="add" name="tech" id="tech" required>
            <option value = "13" name="and" >Andre</option>
            <option value = "1" name="ber" >Bernard</option>
            <option value = "5" name="dub" >Dubois</option>
            <option value = "4" name="dur" >Durant</option>
            <option value = "10" name="fle" >Fleury</option>
            <option value = "11" name="four" >Fournier</option>
            <option value = "14" name="gar" >Garnier</option>
            <option value = "8" name="ler" >Leroy</option>
            <option value = "2" name="mar" >Martin</option>
            <option value = "9" name="mou" >Moulin</option>
            <option value = "3" name="pet" >Petit</option>
            <option value = "7" name="ric" >Richard</option>
            <option value = "6" name="rob" >Robert</option>
            <option value = "12" name="vas" >Vasseur</option>
        </select>' .


    '<label for="num_comm">Numéro de commande :</label>' . " \n" .
    '<input type="text" name="num_comm" id="num_comm" required>' . " \n" .

    '<label for="type">Type de ticket :</label>' . " \n" .
    '<select class="add" name="type" id="type" required>' . '
        <option value = "EP" name="ep" >EP</option>' . '
        <option value = "EC" name="ec" >EC</option>' . '
        <option value = "NP" name="np" >NP</option>' . '
        <option value = "NPAI" name="npai" >NPAI</option>' . '
        <option value = "SAV" name="sav" >SAV</option>' . '
    </select>' . "<br/> \n" .

    '<textarea class="addComm" name="comm" cols="30" rows="10" placeholder="Commentaire" required></textarea><br/>' . "\n" .

    '<input type="hidden" name="action" value="MAJ' . $action . '">' . "\n" .

    '<input type="submit" value="Valider">' . "<br /> \n" .
    '</form>';

require('View/tickets/gabarit.php');