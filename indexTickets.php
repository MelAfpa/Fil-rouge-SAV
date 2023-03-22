<?php
// Initialisation des variables
require_once('Model/modeleTicket.inc.php');
$action = 'accueil';
$titre = '';
$classeCont = '';
$classeTitre = '';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if ($action === 'MAJrechercheTicket' || $action === 'MAJajoutTicket') {
    $num_ticket = $_GET['num'];
    $date_ticket = $_GET['date'];
    $num_comm = $_GET['comm'];
    $type_tick = $_GET['type'];
    $log_name = $_GET['tech'];

}



// Etapes et traitements :
switch ($action) {
    case 'accueil':
        // 1 - Afficher l'accueil ----------------------------------------- ACCUEIL ---------------------------------
        $titre = "Bienvenue dans les tickets";
        $classeTitre = 'titreAcc';
        $classeCont = 'accueil';
        require("View/tickets/view_accueil.php");
        break;

    case 'listeTickets':
        // 1 - récupérer la liste des tickets ------------------------------ LIST ---------------------------------
        $titre = "Liste des tickets";

        $classeTitre = 'titreTickets';
        $classeCont = 'tickets';

        $tTicket = getListeTickets();

        require("View/tickets/view_ListeTickets.php");
        break;

    case "detailTicket":
        $titre = "Détail";
        $classeTitre = 'titreTickets';
        require('View/tickets/view_detailTicket');

        break;
    case "rechercheTicket":
        // 1 - Afficher le formulaire ---------------------------------- RESEARCH  ------------------------------------
        $titre = "Rechercher un ticket ";
        $classeTitre = 'titreTickets';
        $classeCont = 'tickets';
        require('View/tickets/view_listeTickets.php');
        break;
    case 'MAJrechercheTicket':
        // 1 - Rechercher le(s) ticket(s) dans la BDD ------------------------ MAJ RESEARCH ------------------------
        $tTicket = searchTicket($num_ticket, $date_ticket, $num_comm, $type_tick, $log_name);

        $titre = "Liste des tickets trouvés";
        $classeTitre = 'titreTickets';
        $classeCont = 'tickets';

        require('View/tickets/view_listeTickets.php');
        break;

    case 'ajoutTicket':
        // 1 - Afficher le formulaire ----------------------------------- ADD ----------------------------------------
        $titre = "Ajouter un ticket";
        $classeTitre = 'titreTickets';
        $classeCont = 'tickets';
        require('View/tickets/view_formAjout.php');
        break;

    case 'MAJajoutTicket':
        // 1 - Enregistrer le nouveau ticket dans la BDD --------------------- MAJ ADD --------------------------------
        $titre = "Le ticket a bien été créé";
        $tTicket = addTicket($num_ticket, $date_ticket, $id_user, $num_comm, $type_tick);

        // 2 - Afficher le résultat
        $classeTitre = 'titreTickets';
        $classeCont = 'tickets';
        require('View/tickets/view_listeTickets.php');
        break;

}







?>