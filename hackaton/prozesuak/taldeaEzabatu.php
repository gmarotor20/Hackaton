<?php
require_once "../klaseak/taldea.php";

// Ezabatu nahi den taldearen id-a jaso
$id = trim($_POST['id'] ?? '');

// Id-a ez bada iristen, errore mezua bidali
if ($id === '') {
    header("Location: ../index.php?errorea=Ez+da+taldea+aurkitu");
    exit;
}

// Taldea ezabatu (bere partaideekin batera)
$taldea = new Taldea();
$taldea->ezabatu((int) $id);

// Konfirmazio mezua bidali orri nagusira
header("Location: ../index.php?mezua=Taldea+ezabatu+da");
exit;