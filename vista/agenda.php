<?php

require_once("Modelo/conexion.php");
require_once("Controlador/BuscadorContacto.php");

$buscador = new BuscadorContacto($pdo);
$contactos = $buscador->buscarTodos();

$columnas = ["Id", "Nombre", "Apellido", "Teléfono", "Ciudad", "Dirección", "Notas"];
$total = count($contactos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda telefónica</title>
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
    <div class="contenedor">
        <h1>Agenda telefónica</h1>

        <?php if ($total > 0): ?>
            <table>
                <thead>
                    <tr>
                        <?php foreach ($columnas as $columna): ?>
                            <th><?php echo $columna; ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contactos as $contacto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($contacto["id"]); ?></td>
                            <td><?php echo htmlspecialchars($contacto["nombre"]); ?></td>
                            <td><?php echo htmlspecialchars($contacto["apellido"]); ?></td>
                            <td><?php echo htmlspecialchars($contacto["telefono"]); ?></td>
                            <td><?php echo htmlspecialchars($contacto["ciudad"]); ?></td>
                            <td><?php echo htmlspecialchars($contacto["direccion"]); ?></td>
                            <td><?php echo htmlspecialchars($contacto["notas"]); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p class="total">Total de contactos: <?php echo $total; ?></p>
        <?php else: ?>
            <p class="sin-datos">No hay contactos para mostrar.</p>
        <?php endif; ?>
    </div>
</body>
</html>