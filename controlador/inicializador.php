<?php
require_once("controlador/base-de-datos.php");

//controlador
require_once("controlador/contacto/buscador.php");
require_once("controlador/contacto/consultador.php");
require_once("controlador/contacto/insertador.php");

if (!isset($buscadorDeContacto))
{
    $buscadorDeContacto = new BuscadorContacto($pdo);
}
if (!isset($consultadorDeContacto))
{
    $consultadorDeContacto = new ConsultadorContacto($pdo);
}
if (!isset($insertadorDeContacto))
{
    $insertadorDeContacto = new InsertadorContacto($pdo);
}

?>