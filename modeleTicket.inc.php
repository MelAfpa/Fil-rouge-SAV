<?php
require 'dbCon.class.php';

/**
 * Récupère la liste des tickets
 * @return array
 */
function getListeTickets()
{
    $sql = "select Num_tick, Date_tick, Num_comm, Type_tick, Log_name
            from ticket
            inner join user_sav
            on ticket.Id_user = user_sav.Id_user";

    $connexion = dbCon::getConnexion();
    $curseur = $connexion->prepare($sql);
    $curseur->execute();
    $data = $curseur->fetchAll();

    $curseur->closeCursor();
    $connexion = null;
    return $data;
}



/**
 * Recherche cumulative de ticket selon le(s) critère(s) passé(s) en paramètre(s)
 * @param mixed $num_ticket
 * @param string $date_ticket
 * @param string $num_comm
 * @param string $type_tick
 * @param string $log_name
 * @return array
 */
function searchTicket($num_ticket, string $date_ticket, string $num_comm, string $type_tick, string $log_name)
{

    $tabCriteria = [];
    $tabValues = [];

    if (isset($num_ticket) && !empty($num_ticket)) {
        array_push($tabCriteria, 'Num_tick = :num_tick');
        $tabValues['num_tick'] = $num_ticket;
    }
    if (isset($date_ticket) && !empty($date_ticket)) {
        array_push($tabCriteria, 'Date_tick = :date_tick');
        $tabValues['date_tick'] = $date_ticket;
    }

    if (isset($num_comm) && !empty($num_comm)) {
        array_push($tabCriteria, 'Num_comm = :num_comm');
        $tabValues['num_comm'] = $num_comm;
    }
    if (isset($type_tick) && !empty($type_tick)) {
        array_push($tabCriteria, 'Type_tick = :type_tick');
        $tabValues['type_tick'] = $type_tick;
    }
    if (isset($log_name) && !empty($log_name)) {
        array_push($tabCriteria, 'Log_name = :log_name');
        $tabValues['log_name'] = $log_name;
    }

    $sql = "select Num_tick, Date_tick, Num_comm, Type_tick, Log_name
            from ticket
            inner join user_sav
            on ticket.Id_user = user_sav.Id_user";
    if (count($tabCriteria) > 0) {
        $sql .= " where ";
        $sql .= join(' AND ', $tabCriteria);
    }

    $connexion = dbCon::getConnexion();
    $curseur = $connexion->prepare($sql);
    $curseur->execute($tabValues);
    $data = $curseur->fetchAll();
    $curseur->closeCursor();
    $connexion = null;

    return $data;

}


/**
 * Récupère les détails d'un ticket
 * @param mixed $num_ticket
 * @return array
 */
function getDetail($num_ticket)
{
    $sql = "SELECT ticket.Num_tick, Date_tick, Log_name, composer_1.Num_comm, Type_tick,  Libelle_art, article.Ref_art, nb_art, Date_comm, Etat_comm, Num_fact, Comm
            from article
            inner join composer_1
            on article.Id_article = composer_1.Id_article
            inner join commande
            on commande.Num_comm = composer_1.Num_comm
            inner join ticket
            on ticket.Num_tick = commande.Num_tick
            inner join user_sav
            on user_sav.Id_user=ticket.Id_user
            where ticket.Num_tick = ?";

    $connexion = dbCon::getConnexion();
    $curseur = $connexion->prepare($sql);
    $curseur->execute([$num_ticket]);
    $data = $curseur->fetchAll();

    $curseur->closeCursor();
    $connexion = null;
    return $data;
}

/**
 * Modifie le ticket dont le numéro est sélectionné
 * @param array $ticket
 * @return array
 */
function updTicket(array $ticket)
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

    $data = $curseur->execute([
        ":num_tick" => $ticket['Num_tick'],
        ":date_tick" => $ticket['Date_tick'],
        ":num_comm" => $ticket['Num_comm'],
        ":type_tick" => $ticket['Type_tick'],
        ":libelle_art" => $ticket['Libelle_art'],
        ":nb_art" => $ticket['nb_art'],
        ":etat_comm" => $ticket['Etat_comm'],
        ":num_fact" => $ticket['Num_fact'],
        ":comm" => $ticket['Comm'],
        ":ref_art" => $ticket['Ref_art']
    ]);

    $data = $curseur->fetchAll();
    $curseur->closeCursor();
    $connexion = null;

    return $data;
}


/**
 * Supprime le ticket dont le numéro est passé en paramètre
 * @param mixed $num_ticket
 * @return array
 */
function suppTicket($num_ticket)
{
    $sql = "DELETE from ticket where Num_tick=?";
    $connexion = dbCon::getConnexion();
    $curseur = $connexion->prepare($sql);
    echo "<script type=\"text/javascript\">
    alert('Confirmez-vous la suppression ?')
    </script>";
    $curseur->execute([$num_ticket]);
    $data = $curseur->fetchAll();

    $curseur->closeCursor();
    $connexion = null;

    return $data;
}



/**
 * Ajoute un ticket avec le numéro de ticket en auto incrément remplacé par default
 * @param string $default
 * @param string $date_ticket
 * @param string $id_user
 * @param string $num_comm
 * @param string $type_tick
 * @param string $commentaire
 * @return array
 */
function addTicket(string $default, string $date_ticket, string $id_user, string $num_comm, string $type_tick, string $commentaire)
{
    $sql = "INSERT INTO ticket VALUES (?,?,?,?,?,?)";
    $connexion = dbCon::getConnexion();
    $curseur = $connexion->prepare($sql);
    $curseur->execute([$default, $date_ticket, $id_user, $num_comm, $type_tick, $commentaire]);
    $data = $curseur->fetchAll();

    $curseur->closeCursor();
    $connexion = null;

    return $data;
}


?>