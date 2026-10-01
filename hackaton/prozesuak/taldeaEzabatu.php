<?php
require_once "../klaseak/taldea.php";

$id = trim($_POST['id'] ?? '');

if ($id === '') {
    header("Location: ../index.php?errorea=Ez+da+taldea+aurkitu");
    exit;
}

$taldea = new Taldea();
$taldea->ezabatu((int) $id);

header("Location: ../index.php?mezua=Taldea+ezabatu+da");
exit;