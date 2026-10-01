<?php
require_once "../klaseak/partaidea.php";

$izena = trim($_POST['izena'] ?? '');
$herrialdea = trim($_POST['herrialdea'] ?? '');
$taldeaId = (int) ($_POST['taldea_id'] ?? 0);

// Comprobar que todos los campos están rellenos
if ($izena === '' || $herrialdea === '' || $taldeaId === 0) {
    header("Location: ../partaideak.php?id=$taldeaId&errorea=Bete+eremu+guztiak");
    exit;
}

$partaidea = new Partaidea();
$partaidea->sortu($izena, $herrialdea, $taldeaId);

header("Location: ../partaideak.php?id=$taldeaId&mezua=Partaidea+sortu+da");
exit;