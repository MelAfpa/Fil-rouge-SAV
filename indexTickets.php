<?php

require_once('Model/modeleTicket.inc.php');

// 

// Initialisation des variables
$action = 'accueil';
$titre = '';
$classeCont = '';
$classeTitre = '';
$tTicket = [];

// Récupère l'action en cours
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

// Récupère les données des formulaires
if ($action === 'MAJrechercheTicket' || $action === 'MAJajoutTicket') {
    $num_ticket = $_GET['num'];
    $date_ticket = $_GET['date'];
    $num_comm = $_GET['comm'];
    $type_tick = $_GET['type'];
    $log_name = $_GET['tech'];
}

//  $Num_comm, $nb_art, $Date_comm, $Etat_comm)


// Etapes et traitements :
switch ($action) {
    case 'accueil':
        // 1 - Affiche l'accueil ---------------------------------------------------- ACCUEIL ---------------------------------
        $titre = "Bienvenue dans les tickets";
        $classeTitre = 'titreAcc';
        $classeCont = 'accueil';
        require("View/tickets/view_accueil.php");
        break;

    case 'listeTickets':
        // 1 - Récupère la liste des tickets ------------------------------------------ LIST ---------------------------------
        $titre = "Liste des tickets";
        $classeTitre = 'titreTickets';
        $classeCont = 'tickets';

        $tTicket = getListeTickets();

        // 2 - Affiche la liste des tickets
        require("View/tickets/view_ListeTickets.php");

        break;

    case "Detail":
        // 1 - Affiche le détail du ticket sélectionné  ------------------------------ DETAIL ---------------------------------

        $titre = "Détail";
        $classeTitre = 'titreTickets';
        $classeCont = 'detTickets';

        // 2 - Récupère le numéro de ticket du formulaire
        $num_ticket = $_GET['num'];

        // 3 - Affiche le détail du ticket sélectionné
        $detail = getDetail($num_ticket);

        require('View/tickets/view_detailTicket.php');
        break;

    case "Enregistrer":
        $commentaire = $_GET['comm'];
        $num_ticket = $_GET['Num_tick'];

        $ticket = updComment($commentaire, $num_ticket);
        require('View/tickets/view_detailTicket.php');
        break;


    case "rechercheTicket":
        // 1 - Affiche le formulaire de recherche ----------------------------------- RESEARCH  ------------------------------------
        $titre = "Rechercher un ticket ";
        $classeTitre = 'titreTickets';
        $classeCont = 'tickets';

        require('View/tickets/view_listeTickets.php');
        break;

    case 'MAJrechercheTicket':
        // 1 - Recherche le(s) ticket(s) dans la BDD ------------------------------- MAJ RESEARCH ------------------------
        $tTicket = searchTicket($num_ticket, $date_ticket, $num_comm, $type_tick, $log_name);

        // 2 - Affiche le(s) ticket(s) trouvé(s)
        $titre = "Liste des tickets trouvés";
        $classeTitre = 'titreTickets';
        $classeCont = 'tickets';

        require('View/tickets/view_listeTickets.php');
        break;

    // case 'Archiver':
    //     // 1 - Récupère le numéro de ticket du formulaire
    //     $num_ticket = $_GET['num'];


    //     // 2 - Supprime le ticket --------------------------------------------------- MAJ DELETE ------------------------
    //     $ticket = suppTicket($num_ticket);

    //     // 3 - Affiche le résultat
    //     $titre = 'Liste à jour';

    //     require('View/tickets/view_listeTickets.php');

    //     break;

    // case 'MAJArchiver':
    //     break;

    case 'Modifier':
        $num_ticket = $_GET['num'];
        $ticket = getTicketbyNum($num_ticket);

        $titre = "Modifier le ticket n°" . $num_ticket;
        require('View/tickets/view_form.php');

        break;

    case 'MAJModifier':
        $num_ticket = $_GET['num'];
        $date_ticket = $_GET['date'];
        $num_comm = $_GET['comm'];
        $type_tick = $_GET['type'];
        $log_name = $_GET['tech'];
        $libelle = $_GET['lib'];
        $nb_art = $_GET['art'];
        $etat = $_GET['etat'];
        $num_fact = $_GET['fact'];

        $ticket = [
            "Num_tick" => $num_ticket,
            "Date_tick" => $date_ticket,
            "Log_name" => $log_name,
            "Num_comm" => $num_comm,
            "Type_tick" => $type_tick,
            "Libelle_art" => $libelle,
            "nb_art" => $nb_art,
            "Etat_comm" => $etat,
            "Num_fact" => $num_fact
        ];

        $res = updTicket($ticket);

        $titre = "Modification d'un ticket";
        require('View/tickets/view_listeTickets.php');

        break;









    // case 'ajoutTicket':
    //     // 1 - Affiche le formulaire d'ajout ------------------------------------------ ADD ----------------------------------------
    //     $titre = "Ajouter un ticket";
    //     $classeTitre = 'titreTickets';
    //     $classeCont = 'tickets';
    //     require('View/tickets/view_formAjout.php');
    //     break;

    // case 'MAJajoutTicket':
    //     // 1 - Enregistre le nouveau ticket dans la BDD ---------------------------- MAJ ADD --------------------------------
    //     $titre = "Le ticket a bien été créé";
    //     $tTicket = addTicket($num_ticket, $date_ticket, $id_user, $num_comm, $type_tick);

    //     // 2 - Affiche le résultat
    //     $classeTitre = 'titreTickets';
    //     $classeCont = 'tickets';
    //     require('View/tickets/view_listeTickets.php');
    //     break;

}


?>