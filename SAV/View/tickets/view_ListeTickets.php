<?php

// Formulaire de recherche de tickets, situé à gauche de la liste des tickets
$contenu = "<div class='rechGlob'>
                <p class='recherche'>Recherche</p>
                <div class='formRecherche'>
                    <form action='indexTickets.php' method='get'  >
                        <label for ='num' >Par numéro</label>
                        <br>
                        <input type='number' name='num' >
                    <br>
                        <label for='date'> Par date</label>
                        <br>
                        <input type='date' name='date' >
                   <br>
                        <label for='tech'>Par technicien</label>
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
                        <label for='comm'>Par numéro de commande</label>
                        <br>
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
                        <br> 
                        <input type='hidden' name='action' value='MAJrechercheTicket' >
                        <br>
                        <input type='submit' value='Ok'>
                    </form>
                </div>
            </div>" .
    "<div class=bodyTickets>";

// Affiche la liste des tickets de la BDD
if (count($tTicket) === 0) {
    $contenu .= "<p class='errTick'> Aucun ticket n'a été trouvé pour cette recherche.</p>";
} else {
    foreach ($tTicket as $liste):
        $contenu .= "<div class=contTickets>
                    <span class=donneesTicket><p class='titreTick'>Ticket n°" . $liste['Num_tick'] . "</p> \n" .
            "Date : " . $liste['Date_tick'] . "<br/> \n" .
            "Technicien : " . $liste['Log_name'] . "<br/> \n" .
            "Numéro de commande : " . $liste['Num_comm'] . "<br/> \n" .
            "Type de ticket : " . $liste['Type_tick'] .
            "</span>" .
            "<form action='indexTickets.php' method='get'> \n" .
            "<input type='hidden' " . $action . " />\n" .
            "<input type='hidden' name='num' value='" . $liste['Num_tick'] . "' />\n" .
            "<input type='submit' name='action' value='Detail' />\n" .
            "<input type='submit' name='action' value='Modifier' />\n" .
            "<input type='submit' name='action' value='Archiver' />\n" .
            "</form>" .

            // Boutons pour afficher le détail d'un ticket, le modifier et l'archiver

            "</div>";

    endforeach;
    $contenu .= "</div>";

    // // // Affichage direct du détail d'un ticket s'il n'y en a qu'un seul trouvé
    // if (count($tTicket) === 1 && $action === 'MAJrechercheTicket') {
    //     foreach ($detail as $detail):
    //         $contenu .= "<div>" .
    //             "<span class=donneesTicket>
    // <p class='titreTick'>Ticket n°" . $detail['Num_tick'] . "</p> \n" .
    //             "Date : " . $detail['Date_tick'] . "<br/> \n" .
    //             "Technicien : " . $detail['Log_name'] . "<br/> \n" .
    //             "Numéro de commande : " . $detail['Num_comm'] . "<br/> \n" .
    //             "Type de ticket : " . $detail['Type_tick'] .
    //             "<br> </span>" .
    //             "<span>
    //                 Numéro de commande :" . $detail['Num_comm'] . "<br> \n" .
    //             "Etat : " . $detail['Etat_comm'] . "<br> \n" .
    //             "Numéro ticket : " . $detail['Num_tick'] . "<br> \n" .
    //             "Numéro facture : " . $detail['Num_fact'] . "<br> \n" .
    //             "Nb article : " . $detail['nb_art'] . "<br> \n" .
    //             "Libelle : " . $detail['Libelle_art'] . "<br> <br> \n" .
    //             "<textarea name='comm' id='comm' cols='30' rows='10' placeholder='Commentaire'></textarea> </span>" .
    //             "</div>";
    //     endforeach;
    // }
}


require('View/tickets/gabarit.php');




?>