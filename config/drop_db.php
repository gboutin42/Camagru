<?php
    require_once 'database.php';

//DESTROY DB
try {
    $pdo = new PDO($DB_DSN_LIGHT, $DB_USER, $DB_PWD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $DB_DROP . "IF EXISTS " . $DB_NAME;
    $pdo->exec($sql);
    echo "Database DROP successfully<br/>";
    }
catch (PDOException $error) {
    die("ERROR DROP DB:" . $error->getMessage() . "Aborting process");
    }
?>