<?php
session_start();

$id = trim($_POST['id'] ?? '');

if ($id === '') {
    header("Location: ../index.php?errorea=Ez+da+taldea+aurkitu");
    exit;
}

// Cookie con el id del equipo favorito
setcookie("gogokoena", $id, time() + 60 * 60 * 24 * 30, "/");

$_SESSION['gogokoena'] = (int) $id;

header("Location: ../index.php?mezua=Gogokoena+aukeratu+da");
exit;