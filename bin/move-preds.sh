#!/bin/bash
#!/bin/bash
URL=http://162.243.225.145/posiciones.php;

function query() {
	mysql -u xia --password=123456 -h162.243.225.145 -Dxia -e "$1";
}

query "UPDATE posiciones SET posicion = (TRUNCATE(RAND() * 99, 0));";
query "UPDATE tablafinal as tf, (SELECT MAX(ID) as ID FROM tablafinal LIMIT 1) as t SET D1 = NULL, D2 = NULL, D3 = NULL, D4 = NULL WHERE t.ID = tf.ID;";
query "SELECT * FROM tablafinal";

for p in {1..4}; do
	curl -X POST --data "id=$p&mov=u&pos=$p" $URL;
	printf "\n";
done