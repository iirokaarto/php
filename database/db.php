<?php
require_once './database/connection.php';

$config = require 'config.php'; 
$db = connection::make($config['database']);

?>