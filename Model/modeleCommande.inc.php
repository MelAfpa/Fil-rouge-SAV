<?php
//require 'dbCon.class.php';  

/**
 * Récupère la liste des commandes
 * @return array
 */
function getListeCommandes()
{
    $sql = "select Num_comm, Date_comm, Etat_comm, Num_tick, Num_fact, commande.Id_cli
            from commande
            inner join client on commande.Id_cli = client.Id_cli;";

    $connexion = dbCon::getConnexion();
    $curseur = $connexion->prepare($sql);
    $curseur->execute();
    $data = $curseur->fetchAll();
    $curseur->closeCursor();
    $connexion = null;
    return $data;
}



/**
 * Recherche cumulative de commande selon le(s) critère(s) passé(s) en paramètre(s)
 * @param mixed $num_comm
 * @param string $date_comm
 * @param string $etat_comm
 * @param string $num_tick
 * @param string $num_fact
 * @param mixed $id_cli
 * @return array
 */
function searchCommande($num_comm, string $date_comm, string $etat_comm, string $id_cli)
{

    $tabCriteria = [];
    $tabValues = [];

    if (isset($num_comm) && !empty($num_comm)) {
        array_push($tabCriteria, 'Num_comm = :num_comm');
        $tabValues['num_comm'] = $num_comm;
    }
    if (isset($date_comm) && !empty($date_comm)) {
        array_push($tabCriteria, 'Date_comm = :date_comm');
        $tabValues['date_comm'] = $date_comm;
    }

    if (isset($etat_comm) && !empty($etat_comm)) {
        array_push($tabCriteria, 'Etat_comm = :etat_comm');
        $tabValues['etat_comm'] = $etat_comm;
    }
   /*  if (isset($num_tick) && !empty($num_tick)) {
        array_push($tabCriteria, 'Num_tick = :num_tick');
        $tabValues['num_tick'] = $num_tick;
    }
    if (isset($num_fact) && !empty($num_fact)) {
        array_push($tabCriteria, 'Num_fact = :num_fact');
        $tabValues['num_fact'] = $num_fact;
    } */
    if (isset($id_cli) && !empty($id_cli)) {
        array_push($tabCriteria, 'Id_cli = :id_cli');
        $tabValues['id_cli'] = $id_cli;
    }

    $sql = "select Num_comm, Date_comm, Etat_comm, Num_tick, Num_fact, Id_cli
    from commande
    inner join user_sav on commande.Id_cli = user_sav.Id_user;";
    if (count($tabCriteria) > 0) {
        $sql .= " where ";
        $sql .= join(' AND ', $tabCriteria);
    }


    $connexion = dbCon::getConnexion();
    $curseur = $connexion->prepare($sql);
    $curseur->execute($tabValues);

    return $curseur->fetchAll();
}

function getCommandebyNum($num_commande)
{
    $sql = "SELECT * from commande where Num_comm=?";
    $connexion = dbCon::getConnexion();
    $curseur = $connexion->prepare($sql);
    $curseur->execute([$num_commande]);
    return $curseur->fetchAll();
}


function getDetail_a($num_commande)
{
    $sql = "SELECT commande.Num_comm, Date_comm, Etat_comm, Num_tick, Num_fact, Id_cli
            from commande
            inner join composer_1
            on commande.Num_comm = composer_1.Num_comm
            inner join client
            on commande.Id_cli = client.Id_cli
            inner join facture
            on commande.Num_fact = facture.Num_fact
            inner join ticket
            on commande.Num_ticket=ticket.Num_ticket
            where commande.Num_comm = ?";


    $connexion = dbCon::getConnexion();
    $curseur = $connexion->prepare($sql);
    $curseur->execute([$num_commande]);
    $data = $curseur->fetchAll();
    return $data;

}

/*function updCommande(array $tCommande)
{
    $sql = "UPDATE article
            inner join composer_1
            on article.Id_article = composer_1.Id_article
            inner join commande
            on commande.Num_comm = composer_1.Num_comm
            inner join ticket
            on ticket.Num_tick = commande.Num_tick
            inner join user_sav
            on user_sav.Id_user=ticket.Id_user
            SET ticket.Num_comm = :num_comm, ticket.Date_tick =:date_tick, Type_tick = :type_tick, Libelle_art =:libelle_art,
            nb_art =:nb_art, Etat_comm =:etat_comm, Num_fact =:num_fact, Comm =:comm, article.Ref_art =:ref_art
            where ticket.Num_tick =:num_tick";
    $connexion = dbCon::getConnexion();
    $curseur = $connexion->prepare($sql);
    $curseur->execute([
        ":num_tick" => $commande['Num_tick'],
        ":date_tick" => $commande['Date_tick'],
        ":num_comm" => $commande['Num_comm'],
        ":type_tick" => $commande['Type_tick'],
        ":libelle_art" => $commande['Libelle_art'],
        ":nb_art" => $commande['nb_art'],
        ":etat_comm" => $commande['Etat_comm'],
        ":num_fact" => $commande['Num_fact'],
        ":comm" => $commande['Comm'],
        ":ref_art" => $commande['Ref_art']
    ]);
    $curseur->closeCursor();
    $connexion = null;
    return $curseur->fetchAll();
}*/

/*function updComment(string $commentaire, $num_comm)
{
    $sql = "UPDATE commande set Comm=? where Num_comm=?";
    $connexion = dbCon::getConnexion();
    $curseur = $connexion->prepare($sql);
    $curseur->execute([$commentaire, $num_comm]);
    return $curseur->fetchAll();
}*/



function suppComm($num_comm)
{
    $sql = "DELETE from commande where Num_comm=?";
    $connexion = dbCon::getConnexion();
    $curseur = $connexion->prepare($sql);
    $curseur->execute([$num_comm]);
    return $curseur->fetchAll();
}



// function addTicket(int $num_ticket, string $date_ticket, string $id_user, string $num_comm, string $type_tick)
// {
//     $sql = "INSERT INTO ticket VALUES (?,?,?,?,?)";
//     $connexion = getConnexion('root', '');
//     $curseur = $connexion->prepare($sql);

//     $curseur->execute([$num_ticket, $date_ticket, $id_user, $num_comm, $type_tick]);
//     $curseur->closeCursor();

//     $connexion = null;
//     return $curseur->fetchAll();
// }