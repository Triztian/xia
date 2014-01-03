<?php 
use Ratchet\Server\IoServer;
use xia\XiaServer;

require dirname(__DIR__) . '/vendor/autload.php';
$server= IoServer::factory(new XiaServer(), 8080);
$server->run();