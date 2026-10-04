<?php
// Saioa abiarazi, $_SESSION erabili ahal izateko
session_start();

// Gogokoena izango den taldearen id-a jaso
$id = trim($_POST['id'] ?? '');

// Id-a ez bada iristen, errore mezua bidali
if ($id === '') {
    header("Location: ../index.php?errorea=Ez+da+taldea+aurkitu");
    exit;
}

// Cookie bat sortu talde gogokoenaren id-arekin 30 egun.
setcookie("gogokoena", $id, time() + 60 * 60 * 24 * 30, "/");

// Id-a saioan ere gorde, orri guztietan erakusteko
$_SESSION['gogokoena'] = (int) $id;

// Konfirmazio mezua bidali orri nagusira
header("Location: ../index.php?mezua=Gogokoena+aukeratu+da");
exit;