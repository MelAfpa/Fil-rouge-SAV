// case 'ajoutTicket':
// // 1 - Afficher le formulaire ----------------------------------- ADD ----------------------------------------
// $titre = "Ajouter un ticket";
// require('View/tickets/view_form.php');
// break;

// case 'MAJajoutTicket':
// // 1 - Enregistrer le nouveau ticket dans la BDD --------------------- MAJ ADD --------------------------------
// // $titre = "Le ticket a bien été créé";
// require('Model/modeleTicket.inc.php');
// addTicket($id_user, $num_comm, $type);
// // 2 - Afficher le résultat
// require('View/tickets/view_listeTickets.php');
// break;

// case "rechercheTicketbyNumber":
// // 1 - Afficher le formulaire ---------------------------------- RESEARCH NUMBER ------------------------------------
// $titre = "Rechercher un ticket par numéro";
// require('View/tickets/view_formNumber.php');
// break;

// // $titre = "Rechercher un ticket :";
// // require('View/tickets/view_form.php');
// // break;
// case "rechercheTicketbyDate":
// // 1 - Afficher le formulaire ---------------------------------- RESEARCH DATE ------------------------------------
// $titre = "Rechercher un ticket par date";
// require('View/tickets/view_formDate.php');
// break;

// case "rechercheTicketbyUser":
// // 1 - Afficher le formulaire ---------------------------------- RESEARCH USER ------------------------------------
// $titre = "Rechercher un ticket par identifiant d'utilisateur";
// require('View/tickets/view_formId.php');
// break;

// case 'MAJrechercheTicketbyNumber':
// // 1 - Rechercher le(s) ticket(s) dans la BDD ------------------------ MAJ RESEARCH NUMBER
---------------------------------
// require('Model/modeleTicket.inc.php');
// try {
// $num_ticket = $_GET['num'];
// searchTicketbyNum($num_ticket);
// } catch (PDOException $e) {
// echo "ERR: " . $e->getMessage();
// }
// case 'MAJrechercheTicketbyDate':
// // 1 - Rechercher le(s) ticket(s) dans la BDD ------------------------ MAJ RESEARCH DATE
---------------------------------
// require('Model/modeleTicket.inc.php');
// try {
// $date_ticket = $_GET['date'];
// searchTicketbyDate($date_ticket);
// } catch (PDOException $e) {
// echo "ERR: " . $e->getMessage();
// }

// case 'MAJrechercheTicketbyUser':
// // 1 - Rechercher le(s) ticket(s) dans la BDD ------------------------ MAJ RESEARCH USER
---------------------------------
// require('Model/modeleTicket.inc.php');
// try {
// $id_user = $_GET['user'];
// searchTicketbyIdUser($id_user);
// } catch (PDOException $e) {
// echo "ERR: " . $e->getMessage();
// }


// // 2 - Afficher les contacts trouvés
// $titre = "Liste des tickets trouvés : ";
// require('View/tickets/view_listeTickets.php');
// break;


// // case 'updateTicket':
// // require('View/tickets/view_research.php');
// // break;