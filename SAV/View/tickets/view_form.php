<?php

$contenu = "<form action='indexTickets.php' method='get'>" .
    "<label for='num'> Numéro de ticket</label>
    <br>
    <input type='number' name='num' value=" . $ticket['Num_tick'] . " >
    <br>
    
    <label for='date'> Date</label>
            <br>
    <input type='date' name='num' value=" . $ticket['Date_tick'] . " >
            <br>

            <label for='tech'>Technicien </label>
            <br>
            <select name='tech' id='tech'>
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
                <option value ='' selected=selected ></option>
            </select> 
            <br>

            <label for='comm'>Numéro de commande</label>
            <br>
    <input type='number' name='num' value=" . $ticket['Num_comm'] . " >
    <input type='text' name='comm' >
            <br>

            <label for='type'>Type de ticket :</label> 
            <br> 
            <select name='type' id='type'>
                <option value = 'EP' name='ep' >EP</option>
                <option value = 'EC' name='ec' >EC</option>
                <option value = 'NP' name='np' >NP</option>
                <option value = 'NPAI' name='npai' >NPAI</option>
                <option value = 'SAV' name='sav' >SAV</option>
                <option value ='' selected=selected ></option>
            </select> 
            <br/> 

            <label for='etat'>Etat :</label>
            <br>
            <input type='text' name='etat' value=" . $ticket['Etat_comm'] . ">
            <br>

            <label for='fact'>Numéro facture :</label>
            <br>
            <input type='number' name='fact' value=" . $ticket['Num_fact'] . ">
            <br>

            <label for='art'>Nb article :</label>
            <br>
            <input type='number' name='art' value=" . $ticket['nb_art'] . ">
            <br>

            <label for='lib'>Libelle :</label>
                <br>
                <input type='text' name='lib' value=" . $ticket['Libelle_art'] . ">
            <br>

            <input type='hidden' name='action' value='MAJModifier' >
             <input type='hidden' name='num' value=" . $ticket['Num_tick'] . ">

            <br>
            <input type='submit' value='Ok'>
            </form>";

require('View/tickets/gabarit.php');

?>