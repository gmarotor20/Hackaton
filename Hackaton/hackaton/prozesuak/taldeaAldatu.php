<?php
require_once "../klaseak/taldea.php";

// Formularioko datuak jaso
$id = trim($_POST['id'] ?? '');
$puntuak = trim($_POST['puntuak'] ?? '');

// Puntuak beteta daudela egiaztatu
if ($id === '' || $puntuak === '') {
    // Errore mezua bidali orri nagusira
    header("Location: ../index.php?errorea=Bete+eremu+guztiak");
    exit;
}

// Taldearen puntuak aldatu (zenbaki bihurtuta)
$taldea = new Taldea();
$taldea->aldatu((int) $id, (int) $puntuak);

// Konfirmazio mezua bidali orri nagusira
header("Location: ../index.php?mezua=Puntuak+aldatu+dira");
exit;