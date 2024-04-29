<?php
require_once __DIR__ . '/db_connection.php';

$uri = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$uri_db = $db->prepare('SELECT * FROM uri WHERE short_uri = ?');
$uri_db->execute([$uri]);
$uri_db = $uri_db->fetch(PDO::FETCH_ASSOC);
if ($uri_db){
    header("Location:{$uri_db['long_uri']}");
}
else {
    require __DIR__ . '/view.php';
}

?>