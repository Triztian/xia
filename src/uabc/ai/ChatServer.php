<?php
namespace uabc\ai;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class ChatServer implements MessageComponentInterface {

	private static $COMMANDS = array(
		'/^NEW-CLIENT:\s*(\d+)$/',
		'/CLIENT-TYPE:\s*(\w+)/'
	);

	protected $clients;
	private $db;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
		$this->db = new \PDO('mysql:host=localhost;dbname=xia', 'xia', '123456');
    }

	/**
	 * Called when a connection is stablished
	 * @param {ConnectionInterface} conn The stablished connection.
	 */ 
    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        print("New connection ({$conn->resourceId})\n");
        $this->clients->attach($conn);
		foreach ( $this->clients as $client ) {
			if ( $conn !== $client ) {
				print("Sending Connection status to $client->resourceId\n");
				$client->send('NEW-CLIENT: ' . $conn->resourceId);
			} else {
				print("Sending Client status to $conn->resourceId\n");
				$conn->send('NEW-CLIENT: ' . $client->resourceId);
			}
		}
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

		if ( !$this->isCommand($msg) )
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

	/**
	 * Called when an error occurs.
	 */
    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }

	/**
	 * Stores the message in the database.
	 */
	private function storeMessage($msg) {
		$sql = sprintf('INSERT INTO tablafinal (MENSAJE) VALUES ("%s")', $msg);
		$affected = $this->db->exec($sql);
		print('Stored ' . $affected);
	}

	/**
	 * Determine if the message is a command or not.
	 */
	private function isCommand($msg) {
		foreach(self::$COMMANDS as $cmd) {
			if ( preg_match($cmd, $msg) ) 
				return true;
		}
		return false;
	}
}
