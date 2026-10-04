<?php
require_once "../klaseak/taldea.php";

// Formularioko datuak jasotzen egiten du
$izena = trim($_POST['izena'] ?? '');
$puntuak = trim($_POST['puntuak'] ?? '');

// Eremu guztiak beteta daudela egiaztatzen dira
if ($izena === '' || $puntuak === '') {
    // Errore mezua bidaltzen da orri nagusira
    header("Location: ../index.php?errorea=Bete+eremu+guztiak");
    exit;
}

// Dena ondo badago, taldea sortu (puntuak zenbaki bihurtuta)
$taldea = new Taldea();
$taldea->sortu($izena, (int) $puntuak);

// Konfirmazio mezua bidali orri nagusira
header("Location: ../index.php?mezua=Taldea+sortu+da");
exit;