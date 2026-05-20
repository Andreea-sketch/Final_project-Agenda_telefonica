<?php

class buscadorContacto
{
    public PDO $pdo;
    private string $tableName = "contactos";

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarTodos(): array
    {
        $sql = "SELECT * FROM " . $this->tableName . " ORDER BY id ASC";
        $consulta = $this->pdo->query($sql);
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarConFiltros(string $nombre, string $apellido, string $ciudad): array
    {
        $sql = "SELECT * FROM " . $this->tableName . "
                WHERE nombre   LIKE :nombre
                AND apellido LIKE :apellido
                AND ciudad   LIKE :ciudad
                ORDER BY id ASC";

        $consulta = $this->pdo->prepare($sql);

        $consulta->bindValue(':nombre',   '%' . $nombre   . '%', PDO::PARAM_STR);
        $consulta->bindValue(':apellido', '%' . $apellido . '%', PDO::PARAM_STR);
        $consulta->bindValue(':ciudad',   '%' . $ciudad   . '%', PDO::PARAM_STR);

        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>