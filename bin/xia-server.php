<?php 
require '/home/xia/vendor/autoload.php';

use Ratchet\Server\IoServer;
use uabc\ai\XiaServer;

$server = IoServer::factory(
        new HttpServer(
            new WsServer(
                new XiaServer()
            )
        ),
        8081
    );
$server->run();