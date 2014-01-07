<?php
ini_set('display_errors', 1);
require '/home/xia/vendor/autoload.php';
use \PDO;

$db = new PDO('mysql:host=localhost;dbname=xia', 'xia', '123456');
$status = $db->query('SELECT id, estado FROM posiciones ORDER BY id DESC');
$agent = $status->fetch();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>PresaDepredador</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="css/index.css" />
    </head>
	<body>
		<div class="container">
			<header>
				<h1><span class="color_blanco">Presa</span> <span class="color_rojo">Depredador</span></h1></a>
			</header>

			<h3>Elija un rol</h3>
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-4">
					<h4 class="text-warning">Agente</h4>
					<?php if ( !(bool)$agent['estado'] ): ?>
						<a title="Agente" href="clienteAg.php" class="agent">1</a>
					<?php else: ?>
						<h5>El agente ya esta connectado</h5>
					<?php endif; ?>
				</div>
				<div class="col-sm-4">
					<h4 class="text-warning">Depredador</h4>
					<?php foreach($status as $st): ?>
						<?php if ( $st['id'] !== 5 && !(bool)$st['estado']): ?>
							<a title="Depredador <?=$st['id']?>"  href="cliente.php?id=<?=$st['id']?>" class="predator"><?=$st['id']?></a>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
				<div class="col-sm-2"></div>
			</div>
		</div>
    </body>
</html>

