#!/bin/bash
URL=http://162.243.225.145/posiciones.php;

function query() {
	mysql -u xia --password=123456 -h162.243.225.145 -Dxia -e "$1";
}

query "UPDATE posiciones SET posicion = (TRUNCATE(RAND() * 99, 0));";
query "UPDATE tablafinal as tf, (SELECT MAX(ID) as ID FROM tablafinal LIMIT 1) as t SET D1 = NULL, D2 = NULL, D3 = NULL, D4 = NULL WHERE t.ID = tf.ID;";
query "SELECT * FROM tablafinal";

declare -a positions;
positions[0]=1;
positions[1]=12;
positions[2]=21;
positions[3]=10;

for p in {0..3}; do
	curl -X POST --data "id=$((p + 1))&mov=p&pos=${positions[p]}" $URL;
	printf "\n";
done

# Put the prey in the center
curl -X POST --data "id=5&mov=u&pos=11" $URL;