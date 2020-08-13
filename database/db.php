<?php
require_once './database/connection.php';

$config = require './iiroproject/storybook/config.php'; 
$db = connection::make($config['database']);

?>