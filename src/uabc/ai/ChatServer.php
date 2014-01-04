<?php
namespace uabc\ai;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class ChatServer implements MessageComponentInterface {
	protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

	/**
	 * Called when a connection is stablished
	 * @param {ConnectionInterface} conn The stablished connection.
	 */ 
    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

	/**
	 * Called when the server receives a message.
	 * This should persist the.
	 *
	 * @param {ConnectionInterface} from The connection that sent the message
	 * @param {string} msg The message sent.
	 */
    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;

		$fh = fopen('/home/xia/www/log.txt', 'a+');
		fwrite($fh, time() . ':' . $msg . "\n");

        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
