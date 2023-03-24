<?php


// Formulaire de recherche de Commandes, situé à gauche de la liste des Commandes
$contenu = "<div class='rechGlob'>
                <p class='recherche'>Recherche</p>
                <div class='formRecherche'>
                    <form action='indexTickets.php' method='get'  >
                        <label for ='num' >Par numéro de commande</label>
                        <br>
                        <input type='number' name='num' >
                    <br>
                        <label for='date'> Par date</label>
                        <br>
                        <input type='date' name='date' >
                   <br>
                        <label for='idcli'>Par Id client</label>
                        <br>
                        <input type='text' name='idcli' >
                    <br>
                        <label for='comm'>Par numéro de commande</label>
                        <br>
                        <input type='text' name='comm' >
                    <br>
                        <label for='etat'>Etat de commande :</label> 
                        <br> 
                        <select name='etat' id='etat'>
                            <option value = 'Traitée' name='traitée' >Traitée</option>
                            <option value = 'Encours' name='encours' >En cours</option>
                        </select> 
                        <br> 
                        <input type='hidden' name='action' value='MAJrechercheCommande' >
                        <br>
                        <input type='submit' value='Ok'>
                    </form>
                </div>
            </div>" .
    "<div class=bodyCommandes>";

// Affiche la liste des Commandes de la BDD
if (count($tCommande) === 0) {
    $contenu .= "<p class='errComm'> Aucune Commande n'a été trouvé.</p>";
} else {
    foreach ($tCommande as $value):
        $contenu .= "<div class=contCommandes>
                    <span class=donneesCommande><p class='titreComm'>Commande n°" . $value['Num_comm'] . "</p> \n" .
            "Date : " . $value['Date_comm'] . "<br/> \n" .
            "Etat de la commande : " . $value['Etat_comm'] . "<br/> \n" .
            "Numero de facture: " . $value['Num_fact'] . "<br/> \n" .
            "Nom du client : " . $value['Nom_cli'] .
            "</span>" .
            "<form  method='get'> \n" .
            "<input type='hidden' " . $action . " />\n" .
            "<input type='hidden' name='num' value='" . $value['Num_comm'] . "' />\n" .
            "<input type='submit' name='action' value='Detail-a' />\n" .
            "<input type='submit' name='action' value='Modifier-a' />\n" .
            "<input type='submit' name='action' value='Archiver' />\n" .
            "</form>" .

            // Boutons pour afficher le détail d'un Commande, le modifier et l'archiver

            "</div>";

    endforeach;
    $contenu .= "</div>";
}

require('View/Commandes/gabarit.php');