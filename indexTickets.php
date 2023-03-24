<?php

require_once('Model/modeleTicket.inc.php'); ///-m
require_once('Model/modeleCommande.inc.php');///-a
require_once('Model/modeleClient.inc.php');///-k

// Initialisation des variables
$action = 'accueil'; ////-m
$titre = '';
$classeCont = '';
$classeTitre = '';
$tTicket = [];


$tCommande = []; ////-a

// Récupère l'action en cours
if (isset($_GET['action'])) { ///-m
    $action = $_GET['action'];
}



// Récupère les données des formulaires
if ($action === 'MAJrechercheCommande' || $action === 'MAJajoutCommande') {   ////-a
    $num_comm = $_GET['num'];
    $date_comm = $_GET['date'];
    $etat_comm = $_GET['etat'];
   // $num_tick = $_GET['notick'];
   // $num_fact = $_GET['nofact'];
    $id_cli = $_GET['idcli'];
}


// Etapes et traitements :
switch ($action) {  ///-m
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

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////-INDEX ARTHUR
    case 'accueil-a':
        // 1 - Affiche l'accueil ---------------------------------------------------- ACCUEIL ---------------------------------
        $titre = "Bienvenue dans les commandes";
        $classeTitre = 'titreAcc';
        $classeCont = 'accueil';
        require("View/commandes/view_accueil.php");
        break;

    case 'listCommandes':
        // 1 - Récupère la liste des Commandes ------------------------------------------ LIST ---------------------------------
        $titre = "Liste des commandes";
        $classeTitre = 'titreCommandes';
        $classeCont = 'commandes';

        $tCommandes = getListeCommandes();

        // 2 - Affiche la liste des Commandes
        require("View/commandes/view_ListCommandes.php");

        break;

    case "Detail-a":
        // 1 - Affiche le détail du Commande sélectionné  ------------------------------ DETAIL ---------------------------------

        $titre = "Détail";
        $classeTitre = 'titreCommandes';
        $classeCont = 'detCommandes';

        // 2 - Récupère le numéro de Commande du formulaire
        $num_commande = $_GET['num'];

        // 3 - Affiche le détail du Commande sélectionné
        $detail = getDetail($num_commande);

        require('View/commandes/view_detailCommande.php');
        break;


    case "rechercheCommande":
        // 1 - Affiche le formulaire de recherche ----------------------------------- RESEARCH  ------------------------------------
        $titre = "Rechercher un Commande ";
        $classeTitre = 'titreCommandes';
        $classeCont = 'Commandes';

        require('View/Commandes/view_listeCommandes.php');
        break;

    case 'MAJrechercheCommande':
        // 1 - Recherche le(s) Commande(s) dans la BDD ------------------------------- MAJ RESEARCH ------------------------
        $tCommande = searchCommande($num_comm, $date_comm, $etat_comm, $id_cli);

        // 2 - Affiche le(s) Commande(s) trouvé(s)
        $titre = "Liste des Commandes trouvés";
        $classeTitre = 'titreCommandes';
        $classeCont = 'Commandes';

        require('View/Commandes/view_listCommandes.php');
        break;

    // case 'Archiver':
    //     // 1 - Récupère le numéro de Commande du formulaire
    //     $num_Commande = $_GET['num'];


    //     // 2 - Supprime le Commande --------------------------------------------------- MAJ DELETE ------------------------
    //     $Commande = suppCommande($num_Commande);

    //     // 3 - Affiche le résultat
    //     $titre = 'Liste à jour';

    //     require('View/Commandes/view_listeCommandes.php');

    //     break;

    // case 'MAJArchiver':
    //     break;

    case 'Modifier-a':
        $classeTitre = 'titreCommandes';
        $classeCont = 'modCommandes';

        $num_Commande = $_GET['num'];
        $detail = getDetail($num_Commande);

        $titre = "Modifier le Commande n°" . $num_Commande;
        require('View/Commandes/view_form.php');

        break;

    // case "Enregistrer":
    //     $commentaire = $_GET['comm'];
    //     $num_Commande = $_GET['num'];

    //     $detail = getDetail($num_Commande);


    //     $Commande = updComment($commentaire, $num_Commande);
    //     require('View/Commandes/view_detailCommande.php');
    //     break;

    case 'MAJModifier-a':
        $num_Commande = $_GET['num'];
        $date_Commande = $_GET['date'];
        $num_comm = $_GET['num_comm'];
        $type_tick = $_GET['type'];
        $libelle = $_GET['lib'];
        $nb_art = $_GET['art'];
        $etat = $_GET['etat'];
        $num_fact = $_GET['fact'];
        $commentaire = $_GET['comm'];
        $ref_art = $_GET['ref'];

        // AJOUTER DATE Commande
        $Commande = [
            "Num_tick" => $num_Commande,
            "Date_tick" => $date_Commande,
            "Num_comm" => $num_comm,
            "Type_tick" => $type_tick,
            "Libelle_art" => $libelle,
            "nb_art" => $nb_art,
            "Etat_comm" => $etat,
            "Num_fact" => $num_fact,
            "Comm" => $commentaire,
            "Ref_art" => $ref_art

        ];

        $res = //updCommande($Commande);

        $titre = "Modification d'un Commande";
        require('View/Commandes/view_listeCommandes.php');

        break;
/////////////////////////////////////////////////////////////////////////////-Kenny


case 'clients':
    //require("Model/modeleClient.inc.php");
   //die('client');
    $tClients = getListClients();
    require 'View/client/view_liste_clients.php';
    break;

 case 'ajoutClient':
    // 1 - Afficher formulaire
    require("View/client/view_formClient.php");
    break;

 case 'MAJajoutClient':
    // 1 - Récupérer les données du formulaire
    $nom = ($_GET)['nom'];
    $nom = strtoupper($nom);
    $prenom = $_GET['prenom'];
    $prenom = ucfirst($prenom);
    $adresse = $_GET['adresse'];
    $codePostal = $_GET['postal'];
    $ville = $_GET['ville'];
    $ville = strtoupper($ville);
    $telephone = $_GET['tel'];

    // 2 - Enregistrer le nouveau client dans la BDD
    //require("Model/modeleClient.inc.php");
    $res = ajoutClient($nom, $prenom, $adresse, $codePostal, $ville, $telephone);
    // 3 - Afficher le résultat 
    require("View/client/view_resultat.php");
    break;
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////-m
    default:
    echo "Erreur : Vous ne devriez pas être là.";
}
