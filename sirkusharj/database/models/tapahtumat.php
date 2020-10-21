<?php
require "C:/xampp/htdocs/sirkusharj/database/connection.php";

function getAllevents()
{
    global $pdo;
    $sql = "SELECT esitysID, nimi, esityspaikka, kaupunki, pvm, paikat, vapaitapaikkoja FROM esitys";
    $stm = $pdo->query($sql); 
    
    $events = $stm->fetchAll(PDO::FETCH_CLASS);
    return $events;
}



function addEvent($data)
{
    global $pdo;
    $sql = "INSERT INTO h6_tapahtumat(nimi, paivays) VALUES (?,?)";

    $stm = $pdo->prepare($sql);
   
    $ok = $stm->execute($data); //palauttaa true tai false
    return $ok;
}

function buyEvent($id)
{
    global $pdo;
    $sql = "UPDATE esitys SET vapaitapaikkoja = ? WHERE esitysID = ?";

    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $id);

    $ok = $stm->execute();
    return $ok;

}


?>