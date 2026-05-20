<?php

class InsertadorContacto
{
    public string $nombreTabla = "contactos";
    public PDO $pdo;
    public $columnnNames =
    [
        "id",
        "contacto_nombre",
        "contacto_apellido",
        "contacto_telefono",
        "contacto_ciudad",
        "contacto_direccion",
        "contacto_notas"
    ];

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function InsertarContacto (contacto $contacto)
    {
        $id = $contacto->id;
        $nombre = $contacto-> nombre;
        $apellido = $contacto-> apellido;
        $telefono = $contacto->telefono;
        $ciudad = $contacto-> ciudad;
        $direccion = $contacto->direccion;
        $notas =  $contacto->notas;

        $sql = "INSERT INTO $this->nombreTabla 
                                   ($this->nombreTabla[0], 
                                    $this->nombreTabla[1], 
                                    $this->nombreTabla[2],
                                    $this->nombreTabla[3],
                                    $this->nombreTabla[4],
                                    $this->nombreTabla[5],
                                    $this->nombreTabla[6])".
        "VALUES (\"$id\", \"$nombre\", \"$apellido\", \"$telefono\", \"$ciudad\", \"$direccion\", \"$notas\")";

        $respuesta = $this->pdo->exec($sql);
    }
}
?>