<?php
require_once "konexioa.php";

// Partaideak taula (taldeen kideak) kudeatzen duen klasea
class Partaidea
{
    private PDO $db;

    // Objektua sortzean datu-basearekin konektatzen da
    public function __construct()
    {
        $this->db = (new Conexion())->conectar();
    }

    // Talde baten partaide guztiak itzultzen ditu
    public function zerrendatu(int $taldeaId): array
    {
        // prepare eta ? erabiltzen dira SQL injekzioa saihesteko
        $stmt = $this->db->prepare("SELECT id, izena, herrialdea FROM Partaideak WHERE taldea_id = ?");
        $stmt->execute([$taldeaId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Partaide berri bat sortzen du talde batean
    public function sortu(string $izena, string $herrialdea, int $taldeaId): void
    {
        $stmt = $this->db->prepare("INSERT INTO Partaideak (izena, herrialdea, taldea_id) VALUES (?, ?, ?)");
        $stmt->execute([$izena, $herrialdea, $taldeaId]);
    }
}