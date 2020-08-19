<?php
$salasana = "salasana";
$hashattu = password_hash($salasana,PASSWORD_DEFAULT);
echo $hashattu;