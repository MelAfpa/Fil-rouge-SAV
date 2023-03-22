<?php
/**
 * Se connecte à la base de données SAV
 * @param string $user
 * @param string $password
 * @return PDO
 */
function getConnexion(string $user, string $password)
{
    $tParam = parse_ini_file('Params/param.init', true);

    extract($tParam['BDD']);

    $dsn = "mysql:host=" . $host . "; dbname=" . $bdd . "; charset=utf8";
    try {
        $mysqlPDO = new PDO(
            $dsn,
            $user,
            $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
    } catch (PDOException $e) {
        // en cas erreur on affiche un message et on arrete tout
        die('<h1>Erreur de connexion : </h1>' . $e->getMessage());
    }

    $connexion = $mysqlPDO;
    return $connexion;
}


/**
 * Récupère la liste des tickets
 * @return array
 */
function getListeTickets()
{
    $sql = "select Num_tick, Date_tick, Num_comm, Type_tick, Log_name
            from ticket
            inner join user_sav
            on ticket.Id_user = user_sav.Id_user;";

    $connexion = getConnexion('root', '');
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


    $connexion = getConnexion('root', '');
    $curseur = $connexion->prepare($sql);
    $curseur->execute($tabValues);

    return $curseur->fetchAll();
}

function getTicketbyNum($num_ticket)
{
    $sql = "SELECT * from ticket where Num_tick=?";
    $connexion = getConnexion('root', '');
    $curseur = $connexion->prepare($sql);
    $curseur->execute([$num_ticket]);
    return $curseur->fetchAll();
}


function getDetail($num_ticket)
{
    $sql = "SELECT ticket.Num_tick, Date_tick, Log_name, composer_1.Num_comm, Type_tick,  Libelle_art, nb_art, Date_comm, Etat_comm, Num_fact
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


    $connexion = getConnexion('root', '');
    $curseur = $connexion->prepare($sql);
    $curseur->execute([$num_ticket]);
    $data = $curseur->fetchAll();
    return $data;

}

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
            SET Date_tick = :date_tick , Log_name = :log_name , ticket.Num_comm = :num_comm, Type_tick = :type_tick, Libelle_art =:libelle_art,
            nb_art =:nb_art, Etat_comm =:etat_comm, Num_fact =:num_fact
            where ticket.Num_tick =:num_tick";
    $connexion = getConnexion('root', '');
    $curseur = $connexion->prepare($sql);

    $curseur->execute([
        ":num_tick" => $ticket['Num_tick'],
        ":date_tick" => $ticket['Date_tick'],
        ":log_name" => $ticket['Log_name'],
        ":num_comm" => $ticket['Num_comm'],
        ":type_tick" => $ticket['Type_tick'],
        ":libelle_art" => $ticket['Libelle_art'],
        ":nb_art" => $ticket['nb_art'],
        ":etat_comm" => $ticket['Etat_comm'],
        ":num_fact" => $ticket['Num_fact']

    ]);
    $curseur->closeCursor();
    $connexion = null;
    return $curseur->fetchAll();
}

function updComment(string $commentaire, $num_ticket)
{
    $sql = "UPDATE ticket set Comm=? where Num_tick=?";
    $connexion = getConnexion('root', '');
    $curseur = $connexion->prepare($sql);
    $curseur->execute([$commentaire, $num_ticket]);
    return $curseur->fetchAll();
}

function suppTicket($num_ticket)
{
    $sql = "DELETE from ticket where Num_tick=?";
    $connexion = getConnexion('root', '');
    $curseur = $connexion->prepare($sql);
    $curseur->execute([$num_ticket]);
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


?>