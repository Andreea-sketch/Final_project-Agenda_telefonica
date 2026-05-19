<?php
class Contacto
{
    public int $id;
    public string $nombre;
    public string $apellido;
    public string $telefono;
    public string $ciudad;
    public string $direccion;
    public string $notas;

    public function __construct(
                                int $id,
                                string $nombre,
                                string $apellido,
                                string $telefono,
                                string $ciudad,
                                string $direccion,
                                string $notas)
    {
        
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->ciudad = $ciudad;
        $this->direccion = $direccion;
        $this->notas = $notas;
    }
}
?>