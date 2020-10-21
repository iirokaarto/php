

<!doctype html>
<html lang="en">
<head>

<?php
session_start(); //aloittaa istunnon
//pyynnöt ovat muotoa index.php?action=edit&id=5

if(isset($_GET["action"])) $action = $_GET["action"];
else $action = "index";//mitä tehdään

$method = strtolower($_SERVER["REQUEST_METHOD"]); //onko post vai get
//otetaan kirjastot käyttöön
require "./controllers/tapahtumacontroller.php";


switch($action) {

    case "index":
    indexcontroller(); //funktio, joka hakee etusivun tarvitsemat asiat
    break;

    case "delete":
    deleteEventcontroller();
    break;


    case "buyevent":
    buyEventcontroller();
    break;

    default:
    echo "404";
    
}
?>

</head>
</body>
</html>

