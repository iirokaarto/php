<?php
require "C:/xampp/htdocs/sirkusharj/database/models/tapahtumat.php";


function indexcontroller()
{
    $events = getAllevents();
    require "./views/index.view.php";
}


function deleteEventcontroller()
    {

    if(isset($_GET["tapahtumaID"])) {
        $tapahtumaID = $_GET["tapahtumaID"];
        if(deleteEvent($tapahtumaID)) $message="Pelaaja on poistettu";
        else $message="Pelaaja ei poistunut";
        $events = getAllevents();
        require "./views/index.view.php";
    }
    else{
        echo "kusi";
    }
}
function buyEventcontroller()
 {
    require "./views/buy.view.php";
    $events = getAllevents();
    if(isset($_POST["esitysID"])){
        $esitysID = $_GET["esitysID"];
        if(buyEvent($esitysID)) $message="osto onnistui";
    

  
  
    }
}




?>