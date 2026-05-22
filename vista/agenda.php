<?php
require_once("modelo/contacto.php");
require_once("controlador/contacto/buscador.php");

$nombre   = $_GET["nombre"]   ?? "";
$apellido = $_GET["apellido"] ?? "";
$ciudad   = $_GET["ciudad"]   ?? "";

$buscador = new buscadorContacto($pdo);

if ($nombre === "" && $apellido === "" && $ciudad === "") {
    // sin filtros -> todos los contactos
    $contactos = $buscador->buscarTodos();
} else {
    // con filtros -> buscar
    $contactos = $buscador->buscarConFiltros($nombre, $apellido, $ciudad);
}

$columnas = ["Id", "Nombre", "Apellido", "Teléfono", "Ciudad", "Dirección", "Notas"];
$total = count($contactos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda telefónica</title>
    <link rel="stylesheet" href="../estilo.css">
<style>
body 
{
  background-image: url("/fondo-telefonos.jpeg");
}
</style>
</head>
<body>
    <div class="contenedor">
        <h1>Agenda telefónica</h1>
        <h2>Registro de contactos</h2>

        <form method="get" action="index.php" class="formulario-filtros">
            <div class="campo-filtro campo-nombre">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre"placeholder="Filtrar por nombre">
            </div>

            <div class="campo-filtro campo-apellido">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido"placeholder="Filtrar por apellido">
            </div>

            <div class="campo-filtro campo-ciudad">
                <label for="ciudad">Ciudad</label>
                <input type="text" id="ciudad" name="ciudad"placeholder="Filtrar por ciudad">
            </div>

            <div class="boton-filtro">
                <button type="submit">Buscar contacto</button>
            </div>
        </form>

        <?php if ($total > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Ciudad</th>
                        <th>Direccion</th>
                        <th>Notas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contactos as $contacto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($contacto["Id"]); ?></td>
                            <td><?php echo htmlspecialchars($contacto["Nombre"]); ?></td>
                            <td><?php echo htmlspecialchars($contacto["Apellido"]); ?></td>
                            <td><?php echo htmlspecialchars($contacto["Telefono"]); ?></td>
                            <td><?php echo htmlspecialchars($contacto["Ciudad"]); ?></td>
                            <td><?php echo htmlspecialchars($contacto["Direccion"]); ?></td>
                            <td><?php echo htmlspecialchars($contacto["Notas"]); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p class="total">Total de contactos: <?php echo $total; ?></p>
        <?php else: ?>
            <p class="sin-datos">No se encontraron contactos.</p>
        <?php endif; ?>
    </div>
</body>
</html>