<?php
require_once __DIR__ . '/db_connection.php';

$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

$long_uri = $_POST['long_uri'];

$uri_db = $db->prepare('SELECT * FROM uri WHERE long_uri = ?');
$uri_db->execute([$long_uri]);
$uri_db=$uri_db->fetch(PDO::FETCH_ASSOC);

if ($uri_db == false){

    $new_short_uri;
    do {
        $new_short_uri = $_SERVER['HTTP_HOST'] . '/' . get_rnd_str(5, $chars);
    
        $uri_short_check = $db->prepare('SELECT * FROM uri WHERE short_uri = ?');
        $uri_short_check->execute([$new_short_uri]);
        $uri_short_check=$uri_short_check->fetch(PDO::FETCH_ASSOC);
    } while ($uri_short_check != false);

    try{
        $new_uri = $db->prepare('INSERT INTO uri (long_uri, short_uri) VALUES (:long_uri, :short_uri)');
        $new_uri->execute([
            'long_uri'=>$long_uri,
            'short_uri'=>$new_short_uri,
        ]);
        echo $new_short_uri;
    }
    catch(PDOException $e) {
        echo $e;
    }
}
else{
    echo $uri_db['short_uri'];
}

function get_rnd_str($len, $chars){

    $rnd_str = '';

    for ($i=0; $i<$len; $i++){
        $rnd_str .= $chars[rand(0,mb_strlen($chars)-1)];
    }

    return $rnd_str;
}
?>