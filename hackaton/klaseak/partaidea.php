<?php
require_once "konexioa.php";

// Clase que gestiona los miembros (tabla Partaideak)
class Partaidea
{
    private PDO $db;

    public function __construct()
    {
        $this->db = (new Conexion())->conectar();
    }

    // Devuelve los miembros de un equipo
    public function zerrendatu(int $taldeaId): array
    {
        $stmt = $this->db->prepare("SELECT id, izena, herrialdea FROM Partaideak WHERE taldea_id = ?");
        $stmt->execute([$taldeaId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        // Crea un miembro nuevo en un equipo
    public function sortu(string $izena, string $herrialdea, int $taldeaId): void
    {
        $stmt = $this->db->prepare("INSERT INTO Partaideak (izena, herrialdea, taldea_id) VALUES (?, ?, ?)");
        $stmt->execute([$izena, $herrialdea, $taldeaId]);
    }
}