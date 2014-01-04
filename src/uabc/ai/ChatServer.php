<?php
namespace uabc\ai;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class ChatServer implements MessageComponentInterface {
	protected $clients;

	private function storeMessage($msg) {
		$db = new \PDO('mysql:host=localhost;dbname=xia', 'xia', '123456');
		$sql = sprintf('INSERT INTO tablafinal (MENSAJE) VALUES ("%s")', $msg);
		print("Executing: $sql\n");
		$affected = $db->exec($sql);
		print('Stored ' . $affected);
	}

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

        print("New connection ({$conn->resourceId})\n");
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

        print(sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n" , 
				$from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's')); 

		$this->storeMessage($msg);

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
