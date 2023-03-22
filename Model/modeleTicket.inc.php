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
 * Récupère la liste des tickets de la table passée en paramètre
 * @param string $libelle
 * @return array
 */
// function getListeTickets(string $libelle)
// {
//     $sql = "SELECT num_tick FROM " . $libelle;

//     $connexion = getConnexion('root', '');
//     $curseur = $connexion->query($sql);
//     $data = $curseur->fetchAll(PDO::FETCH_NUM);
//     $curseur->closeCursor();
//     $connexion = null;
//     echo "<br/><b>Table $libelle :</b><br/> \n";

//     foreach ($data as list($d)) {
//         echo "Ticket n° $d <br/> \n";
//     }

//     if ($data)
//         return $data;
//     else
//         throw new PDOException("Aucun ticket trouvé dans la table $libelle");

// }

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


    if ($data)
        return $data;
    else
        throw new PDOException("Aucun ticket trouvé");

}


function addTicket($num_ticket, $date_ticket, $id_user, $num_comm, $type_tick)
{
    $sql = "INSERT INTO ticket VALUES (?,?,?,?,?)";
    $connexion = getConnexion('root', '');
    $curseur = $connexion->prepare($sql);

    $curseur->execute([$num_ticket, $date_ticket, $id_user, $num_comm, $type_tick]);
    $data = $curseur->fetchAll();

    $curseur->closeCursor();

    $connexion = null;
    return $data;
}

function updTicket(array $ticket)
{

    $sql = "UPDATE ticket SET Num_tick = :num_tick , Date_tick = :date_tick , Id_user = :id_user , Num_comm = :num_comm, Type_tick = :type_tick";
    $connexion = getConnexion('root', '');
    $curseur = $connexion->prepare($sql);

    $data = $curseur->execute([":num_tick" => $ticket['Num_tick'], ":date_tick" => $ticket['Date_tick'], ":id_user" => $ticket['Id_user'], ":num_comm" => $ticket['Num_comm'], ":type_tick" => $ticket['Type_tick']]);

    // Récupérer le nombre d'enregistrements supprimés

    // Fermer le curseur / resultset
    $curseur->closeCursor();
    // Détruit la connexion
    $connexion = null;

    // Retourner un booléen (VRAI si 1 seul contact supprimé)
    return $data;
}


function searchTicket($num_ticket, $date_ticket, $num_comm, $type_tick, $log_name)
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
?>