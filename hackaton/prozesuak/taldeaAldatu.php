<?php
require_once "../klaseak/taldea.php";

$id = trim($_POST['id'] ?? '');
$puntuak = trim($_POST['puntuak'] ?? '');

// Comprobar que los puntos están rellenos
if ($id === '' || $puntuak === '') {
    header("Location: ../index.php?errorea=Bete+eremu+guztiak");
    exit;
}

$taldea = new Taldea();
$taldea->aldatu((int) $id, (int) $puntuak);

header("Location: ../index.php?mezua=Puntuak+aldatu+dira");
exit;