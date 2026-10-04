<?php
require_once "../klaseak/partaidea.php";

// Formularioko datuak jaso; hutsik badaude, string hutsa gelditzen da
$izena = trim($_POST['izena'] ?? '');
$herrialdea = trim($_POST['herrialdea'] ?? '');
$taldeaId = (int) ($_POST['taldea_id'] ?? 0);

// Eremu guztiak beteta daudela egiaztatu
if ($izena === '' || $herrialdea === '' || $taldeaId === 0) {
    // Errore mezua bidali partaideak orrira
    header("Location: ../partaideak.php?id=$taldeaId&errorea=Bete+eremu+guztiak");
    exit;
}

// Dena ondo badago, partaidea sortu egiten du
$partaidea = new Partaidea();
$partaidea->sortu($izena, $herrialdea, $taldeaId);

// Konfirmazio mezua bidali partaideak orrira
header("Location: ../partaideak.php?id=$taldeaId&mezua=Partaidea+sortu+da");
exit;