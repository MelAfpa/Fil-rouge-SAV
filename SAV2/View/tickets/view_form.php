<?php

foreach ($detail as $detail):

    $contenu = "<form class='formMod' action='indexTickets.php' method='get'>" .
        "<label for='date'> Date</label>
        <input type='date' name='date' value=" . $detail['Date_tick'] . " disabled='disabled'>
        <br>

        <label for='tech'>Technicien </label>
        <select name='tech' id='tech' disabled='disabled'>
            <option value = 'Bernard' name='ber' >Bernard</option>
            <option value = 'Martin' name='mar' >Martin</option>
            <option value = 'Petit' name='pet' >Petit</option>
            <option value = 'Durant' name='dur' >Durant</option>
            <option value = 'Dubois' name='dub' >Dubois</option>
            <option value = 'Robert' name='rob' >Robert</option>
            <option value = 'Richard' name='ric' >Richard</option>
            <option value = 'Leroy' name='ler' >Leroy</option>
            <option value = 'Moulin' name='mou' >Moulin</option>
            <option value = 'Fleury' name='fle' >Fleury</option>
            <option value = 'Fournier' name='four' >Fournier</option>
            <option value = 'Vasseur' name='vas' >Vasseur</option>
            <option value = 'Andre' name='and' >Andre</option>
            <option value = 'Garnier' name='gar' >Garnier</option>
            <option value ='' ></option>
        </select> 
        <br>

        <label for='num_comm'>Numéro de commande</label>
        <input type='text' name='num_comm' value=" . $detail['Num_comm'] . " disabled='disabled' >
        <br>

        <label for='type'>Type de ticket :</label> 
        <select name='type' id='type'>
            <option value = 'EP' name='ep' >EP</option>
            <option value = 'EC' name='ec' >EC</option>
            <option value = 'NP' name='np' >NP</option>
            <option value = 'NPAI' name='npai' >NPAI</option>
            <option value = 'SAV' name='sav' >SAV</option>
            <option value ='' ></option>
        </select> 
        <br/> 

        <label for='etat'>Etat :</label>
        <input type='text' name='etat' value=" . $detail['Etat_comm'] . ">
        <br>

        <label for='fact'>Numéro facture :</label>
        <input type='number' name='fact' value=" . $detail['Num_fact'] . ">
        <br>
        
        <label for='ref'>Référence :</label>
        <input type='text' name='ref' value=" . $detail['Ref_art'] . " disabled='disabled'>
        <br>

         <label for='lib'>Libelle :</label>
        <input type='text' name='lib' value=" . $detail['Libelle_art'] . " disabled='disabled'>
        <br>

        <label for='art'>Nb article :</label>
        <input type='number' name='art' value=" . $detail['nb_art'] . " disabled='disabled'>
        <br><br>
        
        <textarea name='comm' cols='30' rows='10' placeholder='Commentaire' value='" . $detail['Comm'] . "'></textarea><br><br> 

        <input type='hidden' name='action' value='MAJModifier' >
        <input type='hidden' name='num' value=" . $detail['Num_tick'] . ">
        <input class='btnOk' type='submit' value='Ok'>
        </form>";
endforeach;
require('View/tickets/gabarit.php');

?>