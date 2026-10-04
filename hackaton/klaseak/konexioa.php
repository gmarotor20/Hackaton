<?php
// Datu-basearekin konexioa kudeatzen duen klasea
class Conexion
{
    // MariaDB konektatzeko erabili dugun datuak
    private string $host = "localhost";
    private string $bd = "hackaton";
    private string $usuario = "wesuser";
    private string $clave = "123456";

    // PDO objektua itzuli
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