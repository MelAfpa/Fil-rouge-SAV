<?php
/**
 * Summary of getListClients
 * @return array
 */
 function getListClients() // Permet de récupérer la liste des clients
{
   
    $connexion = dbCon::getConnexion();
     
    $sql = "SELECT * FROM client";
    $curseur = $connexion->query($sql);
    $records = $curseur->fetchAll();
    $curseur->closeCursor();
    $connexion = null;
    return $records;
} 
/**
 * Summary of ajoutClient
 * @param string $nom
 * @param string $prenom
 * @param string $adresse
 * @param string $codePostal
 * @param string $ville
 * @return array
 */
function ajoutClient(
    string $nom, string $prenom, string $adresse, string $codePostal,
    string $ville, string $telephone
) // Permet d'ajouter un client
{
    $connexion = dbCon::getConnexion();
        
    $sql = "INSERT INTO client (nom_cli, prenom, adr_cli, code_postal, ville, tel) VALUES (?,?,?,?,?,?)";
    $curseur = $connexion->prepare($sql);
    try {
        $res = $curseur->execute([$nom, $prenom, $adresse, $codePostal, $ville, $telephone]);
    } catch (PDOException $e) {
        $res = false;
    }
    $curseur->closeCursor();
    $connexion = null;
    return $res;
}