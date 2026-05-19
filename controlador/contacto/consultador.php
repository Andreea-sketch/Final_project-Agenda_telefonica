<?php
class ConsultadorContacto
{
    public string $nombreTabla = "contactos";
    public PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function ConsultarContacto(int $id)
    {
        $sql = "SELECT * FROM $this->nombreTabla WHERE id = $id";
        $respuesta = $this->pdo->query($sql)->fetchAll();
        return $respuesta;
    }
}
?>