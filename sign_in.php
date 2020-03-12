<?php
	$title = "Sign In";
	$log = "Log Out";
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'database.php';
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'header.php';
?>

<?php
	try {
		$pdo = new PDO($DB_DSN, $DB_USER, $DB_PWD);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $error) {
		die("Error query " . $error->getMessage());
	}
	$return = $pdo->query('SELECT * FROM users');
	while ($data = $return->fetch()){
?>
		<div>
			<strong>ID:</strong> <?= $data['id']; ?>
			<strong>Username:</strong> <?= $data['login']; ?>
			<strong>Mail:</strong> <?= $data['mail']; ?>
			<strong>Password:</strong> <?= $data['password']; ?>
		</div>
<?php
	}
	$return->closeCursor();
?>

<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>
