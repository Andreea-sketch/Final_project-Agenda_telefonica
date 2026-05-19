<?php

// Conectar con base de datos
$dbtype = "mysql";
$ubicacion = "localhost";
$baseDeDatos = "agenda";
$usuario = "root";
$contrasena = "";
$charset = "utf8mb4";

//direccion completad en la base de datos
$dsn = "$dbtype:host = $ubicacion; dbname = $baseDeDatos; charset = $charset";
    
// PHP data object, object que usamos para conectar con la BD
$pdo = new PDO ($dsn, $usuario, $contrasena,
[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]
);
return $pdo;

?>