<?php
require_once "konexioa.php";

// Clase que gestiona los equipos (tabla Taldeak)
class Taldea
{
    private PDO $db;

    public function __construct()
    {
        $this->db = (new Conexion())->conectar();
    }

    // Devuelve todos los equipos
    public function zerrendatu(): array
    {
        $stmt = $this->db->query("SELECT id, izena, puntuak FROM Taldeak");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        // Crea un equipo nuevo
    public function sortu(string $izena, int $puntuak): void
    {
        $stmt = $this->db->prepare("INSERT INTO Taldeak (izena, puntuak) VALUES (?, ?)");
        $stmt->execute([$izena, $puntuak]);
    }

        // Cambia los puntos de un equipo
    public function aldatu(int $id, int $puntuak): void
    {
        $stmt = $this->db->prepare("UPDATE Taldeak SET puntuak = ? WHERE id = ?");
        $stmt->execute([$puntuak, $id]);
    }

        // Borra un equipo junto con sus miembros
    public function ezabatu(int $id): void
    {
        // Primero los miembros, porque dependen del equipo (clave foránea)
        $stmt = $this->db->prepare("DELETE FROM Partaideak WHERE taldea_id = ?");
        $stmt->execute([$id]);

        $stmt = $this->db->prepare("DELETE FROM Taldeak WHERE id = ?");
        $stmt->execute([$id]);
    }

        // Devuelve un equipo por su id (o null si no existe)
    public function bilatu(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT id, izena, puntuak FROM Taldeak WHERE id = ?");
        $stmt->execute([$id]);
        $emaitza = $stmt->fetch(PDO::FETCH_ASSOC);
        return $emaitza ?: null;
    }

}