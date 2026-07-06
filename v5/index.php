<?php

$_ENV['ADMINER_SERVERS'] = json_encode([]);

/*
$_ENV['ADMINER_SERVERS'] = json_encode([
    "Local MySQL" => [
        "driver" => "server",
        "server" => "127.0.0.1:3306",
        "username" => "root",
        "password" => "",
        "db" => "",
    ],
	 "Local MySQL1" => [
        "driver" => "server",
        "server" => "127.0.0.1:3306",
        "username" => "root",
        "password" => "",
        "db" => "",
    ],
]);
*/

function adminer_object() {
    include_once __DIR__ . "/plugins/plugin.php";
    include_once __DIR__ . "/plugins/login-servers.php";

    return new AdminerPlugin([
        new AdminerLoginServers(),
    ]);
}

// include __DIR__ . "/adminer-5.0.5.php";
include __DIR__ . "/adminer-5.4.2.php";
