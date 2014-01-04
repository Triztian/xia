<?php 
require '/home/xia/vendor/autoload.php';

use Ratchet\Server\IoServer;
use uabc\ai\ChatServer;

$server = IoServer::factory(
        new HttpServer(
            new WsServer(
                new ChatServer()
            )
        ),
        8080
    );
$server->run();
