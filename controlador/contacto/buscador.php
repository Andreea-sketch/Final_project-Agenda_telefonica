<?php

class buscadorContacto 
{
    public PDO $pdo;
    private string $tableName = "contactos";

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarTodos ():array
    {
        $consulta = $this->pdo->prepare("SELECT * FROM $this->tableName ORDER BY id ASC");
        $consulta ->execute();
        return $consulta->fetchAll();             
    }  
}
?>