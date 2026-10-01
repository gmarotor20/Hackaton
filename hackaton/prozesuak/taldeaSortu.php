<?php
require_once "../klaseak/taldea.php";

$izena = trim($_POST['izena'] ?? '');
$puntuak = trim($_POST['puntuak'] ?? '');

// Comprobar que todos los campos están rellenos
if ($izena === '' || $puntuak === '') {
    header("Location: ../index.php?errorea=Bete+eremu+guztiak");
    exit;
}

$taldea = new Taldea();
$taldea->sortu($izena, (int) $puntuak);

header("Location: ../index.php?mezua=Taldea+sortu+da");
exit;