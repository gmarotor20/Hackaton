<?php
require_once "konexioa.php";

// Taldeak taula (taldeak) kudeatzen duen klasea
class Taldea
{
    private PDO $db;

    // Objektua sortzean datu-basearekin konektatzen da
    public function __construct()
    {
        $this->db = (new Conexion())->conectar();
    }

    // Talde guztiak itzultzen ditu
    public function zerrendatu(): array
    {
        $stmt = $this->db->query("SELECT id, izena, puntuak FROM Taldeak");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Talde berri bat sortzen du
    public function sortu(string $izena, int $puntuak): void
    {
        $stmt = $this->db->prepare("INSERT INTO Taldeak (izena, puntuak) VALUES (?, ?)");
        $stmt->execute([$izena, $puntuak]);
    }

    // Talde baten puntuak aldatzen ditu
    public function aldatu(int $id, int $puntuak): void
    {
        $stmt = $this->db->prepare("UPDATE Taldeak SET puntuak = ? WHERE id = ?");
        $stmt->execute([$puntuak, $id]);
    }

    // Taldea ezabatzen du, bere partaideekin batera
    public function ezabatu(int $id): void
    {
        // Lehenengo partaideak, kanpoko gakoa (FK) dagoelako
        $stmt = $this->db->prepare("DELETE FROM Partaideak WHERE taldea_id = ?");
        $stmt->execute([$id]);

        $stmt = $this->db->prepare("DELETE FROM Taldeak WHERE id = ?");
        $stmt->execute([$id]);
    }

    // Talde bat bilatzen du id-aren arabera (null badago ez badago)
    public function bilatu(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT id, izena, puntuak FROM Taldeak WHERE id = ?");
        $stmt->execute([$id]);
        $emaitza = $stmt->fetch(PDO::FETCH_ASSOC);
        return $emaitza ?: null;
    }
}