<?php

$contenu = '<form action="indexTickets.php" method="get">' . "<br/> \n" .

    '<label for="num">Numéro de ticket :</label>' . "<br/> \n" .
    '<input type="number" name="num" id="num">' . "<br/><br/> \n" .

    '<label for="date">Date de commande :</label>' . "<br/> \n" .
    '<input type="date" name="date" id="date">' . "<br/><br/> \n" .

    '<label for="tech">Technicien </label>
        <select name="tech" id="tech" >
            <option value = "Andre" value=13 name="and" >Andre</option>
            <option value = "Bernard" name="ber" >Bernard</option>
            <option value = "Dubois" name="dub" >Dubois</option>
            <option value = "Durant" name="dur" >Durant</option>
            <option value = "Fleury" name="fle" >Fleury</option>
            <option value = "Fournier" name="four" >Fournier</option>
            <option value = "Garnier" name="gar" >Garnier</option>
            <option value = "Leroy" name="ler" >Leroy</option>
            <option value = "Martin" name="mar" >Martin</option>
            <option value = "Moulin" name="mou" >Moulin</option>
            <option value = "Petit" name="pet" >Petit</option>
            <option value = "Richard" name="ric" >Richard</option>
            <option value = "Robert" name="rob" >Robert</option>
            <option value = "Vasseur" name="vas" >Vasseur</option>
            <option value ="" ></option>
        </select> 
        <br>' .

    '<label for="comm">Numéro de commande :</label>' . "<br/> \n" .
    '<input type="text" name="comm" id="comm">' . "<br/><br/> \n" .

    '<label for="type">Type de ticket :</label>' . "<br/> \n" .
    '<select name="type" id="type">' . '
        <option value = "EP" name="ep" >EP</option>' . '
        <option value = "EC" name="ec" >EC</option>' . '
        <option value = "NP" name="np" >NP</option>' . '
        <option value = "NPAI" name="npai" >NPAI</option>' . '
        <option value = "SAV" name="sav" >SAV</option>' . '
    </select>' . "<br/><br/> \n" .

    '<textarea name="comm" cols="30" rows="10" placeholder="Commentaire"></textarea><br><br> ' .

    '<input type="hidden" name="action" value="MAJ' . $action . '">' . "\n" .

    '<input type="submit" value="Valider">' . "<br /> \n" .
    '</form>';

require('View/tickets/gabarit.php');

?>