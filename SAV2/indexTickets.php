<?php

require_once('Model/modeleTicket.inc.php');

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

// Etapes et traitements :
switch ($action) {
    case 'accueil':
        // Initialise les classes pour gabarit.php
        $titre = "Bienvenue dans les tickets";
        $classeTitre = 'titreAcc';
        $classeCont = 'accueil';

        // 1 - Affiche l'accueil 
        require("View/tickets/view_accueil.php");
        break;

    case 'listeTickets':
        // Initialise les classes pour gabarit.php
        $titre = "Liste des tickets";
        $classeTitre = 'titreTickets';
        $classeCont = 'tickets';

        // 1 - Récupère la liste des tickets 
        $tTicket = getListeTickets();

        // 2 - Affiche la liste des tickets
        require("View/tickets/view_ListeTickets.php");
        break;

    case "Detail":
        // Initialise les classes pour gabarit.php
        $titre = "Détail";
        $classeTitre = 'titreTickets';
        $classeCont = 'detTickets';

        // 2 - Récupère le numéro de ticket du formulaire
        $num_ticket = $_GET['num'];

        // 3 - Affiche le détail du ticket sélectionné
        $detail = getDetail($num_ticket);

        require('View/tickets/view_detailTicket.php');
        break;

    case "rechercheTicket":
        // Initialise les classes pour gabarit.php
        $titre = "Rechercher un ticket ";
        $classeTitre = 'titreTickets';
        $classeCont = 'tickets';

        // 1 - Affiche le formulaire de recherche
        require('View/tickets/view_listeTickets.php');
        break;

    case 'MAJrechercheTicket':
        // Initialise les classes pour gabarit.php
        $titre = "Liste des tickets trouvés";
        $classeTitre = 'titreTickets';
        $classeCont = 'tickets';

        // 1 - Récupère les données du formulaire de recherche
        $num_ticket = stripslashes($_GET['num']);
        $date_ticket = $_GET['date'];
        $num_comm = stripslashes($_GET['num_comm']);
        $type_tick = $_GET['type'];
        $log_name = $_GET['tech'];

        // 2 - Recherche le(s) ticket(s) dans la BDD 
        $tTicket = searchTicket($num_ticket, $date_ticket, $num_comm, $type_tick, $log_name);

        // 3 - Affiche le(s) ticket(s) trouvé(s)
        require('View/tickets/view_listeTickets.php');
        break;

    case 'Archiver':
        // Initialise la classe pour gabarit.php
        $titre = "Suppression d'un ticket";
        $classeTitre = 'titreTickets';
        $classeCont = 'suppTickets';

        // 1 - Récupère le numéro de ticket du formulaire 
        $num_ticket = $_GET['num'];

        // 2 - Supprime le ticket 
        $ticket = suppTicket($num_ticket);

        // 3 - Affiche le résultat
        require('View/tickets/view_supp.php');
        break;

    case 'Modifier':
        // Initialise les classes pour gabarit.php
        $classeTitre = 'titreTickets';
        $classeCont = 'modTickets';

        // 1 - Récupère le numéro de ticket du formulaire
        $num_ticket = $_GET['num'];

        // 2 - Récupère les données du ticket
        $detail = getDetail($num_ticket);

        // 3 - Affiche le résultat
        $titre = "Modifier le ticket n°" . $num_ticket;
        require('View/tickets/view_form.php');
        break;

    case 'MAJModifier':
        // Initialise les classes pour gabarit.php
        $titre = "Le ticket a bien été modifié";
        $classeTitre = 'titreTickets';
        $classeCont = 'detTickets';

        // 1 - Récupère les données du formulaire de modification
        $num_ticket = $_GET['num'];
        $date_ticket = $_GET['date'];
        $num_comm = $_GET['num_comm'];
        $type_tick = $_GET['type'];
        $libelle = $_GET['lib'];
        $nb_art = $_GET['art'];
        $etat = stripslashes($_GET['etat']);
        $num_fact = stripslashes($_GET['fact']);
        $commentaire = stripslashes($_GET['comm']);
        $ref_art = $_GET['ref'];
        $detail = getDetail($num_ticket);

        // 2- Modifie le ticket dans la BDD
        $ticket = [
            "Num_tick" => $num_ticket,
            "Date_tick" => $date_ticket,
            "Num_comm" => $num_comm,
            "Type_tick" => $type_tick,
            "Libelle_art" => $libelle,
            "nb_art" => $nb_art,
            "Etat_comm" => $etat,
            "Num_fact" => $num_fact,
            "Comm" => $commentaire,
            "Ref_art" => $ref_art
        ];

        $newTicket = updTicket($ticket);

        // 3 - Affiche le résultat
        require('View/tickets/view_detailTicket.php');
        break;

    case 'ajoutTicket':
        //  Affiche le formulaire d'ajout 
        $titre = "Ajouter un ticket";
        $classeTitre = 'titreTickets';
        $classeCont = 'ajoutTick';
        require('View/tickets/view_formAjout.php');
        break;

    case 'MAJajoutTicket':
        // Initialise les classes pour gabarit.php
        $titre = "Le ticket a bien été créé";
        $classeTitre = 'titreTickets';
        $classeCont = 'tickets';

        // 1 - Récupère les données du formulaire d'ajout
        $date_ticket = $_GET['date'];
        $num_comm = strip_tags($_GET['num_comm']);
        $type_tick = $_GET['type'];
        $id_user = $_GET['tech'];
        $commentaire = strip_tags($_GET['comm']);
        $default = 'default';

        // 2 - Enregistre le nouveau ticket dans la BDD 
        $tTicket = addTicket($default, $date_ticket, $id_user, $num_comm, $type_tick, $commentaire);

        // 3 - Affiche le résultat
        require('View/tickets/view_ajout.php');
        break;
    default:
        echo "Erreur : Vous ne devriez pas être là.";
}


?>