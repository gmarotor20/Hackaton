<?php
// Clase que gestiona la conexión con la base de datos
class Conexion
{
    private string $host = "localhost";
    private string $bd = "hackaton";
    private string $usuario = "wesuser";
    private string $clave = "123456";

    // Devuelve un objeto PDO listo para usar
    public function conectar(): PDO
    {
        $pdo = new PDO(
            "mysql:host={$this->host};dbname={$this->bd};charset=utf8mb4",
            $this->usuario,
            $this->clave
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}