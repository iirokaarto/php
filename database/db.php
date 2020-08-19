<?php
require_once './connection.php';

$config = require './config.php'; 
$db = Connection::make($config['database']);

?>