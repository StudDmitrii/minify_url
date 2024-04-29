<?php

$host = '127.0.0.1';
$port = '3306';
$db_name = 'uri_db';

$dsn = "mysql:host={$host};dbname={$db_name};port={$port}";

$db = new PDO($dsn, "root", "" );

?>