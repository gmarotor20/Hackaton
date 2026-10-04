<?php
session_start();
require_once "klaseak/taldea.php";
require_once "klaseak/partaidea.php";

// Equipo que llega por la URL (partaideak.php?id=2)
$taldeaId = (int) ($_GET['id'] ?? 0);
$taldea = (new Taldea())->bilatu($taldeaId);

// Si el equipo no existe, volvemos a la página principal
if (!$taldea) {
    header("Location: index.php?errorea=Ez+da+taldea+aurkitu");
    exit;
}

$partaideak = (new Partaidea())->zerrendatu($taldeaId);
$gogokoena = null;
if (isset($_SESSION['gogokoena'])) {
    $gogokoena = (new Taldea())->bilatu($_SESSION['gogokoena']);
}

?>
<h1><?= htmlspecialchars($taldea['izena']) ?> - Partaideak</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Izena</th>
        <th>Herrialdea</th>
    </tr>
    <?php foreach ($partaideak as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= htmlspecialchars($p['izena']) ?></td>
            <td><?= htmlspecialchars($p['herrialdea']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php if (isset($_GET['errorea'])): ?>
    <p style="color:red"><?= htmlspecialchars($_GET['errorea']) ?></p>
<?php endif; ?>
<?php if (isset($_GET['mezua'])): ?>
    <p style="color:green"><?= htmlspecialchars($_GET['mezua']) ?></p>
<?php endif; ?>

<h2>Gehitu partaidea</h2>
<form action="prozesuak/partaideaSortu.php" method="post">
    <input type="hidden" name="taldea_id" value="<?= $taldeaId ?>">
    <p>Izena: <input type="text" name="izena"></p>
    <p>Herrialdea: <input type="text" name="herrialdea"></p>
    <button type="submit">Sortu</button>
</form>

<p><a href="index.php">Itzuli</a></p>
<?php if ($gogokoena): ?>
    <p style="color:blue">Zure talde favoritoa: <?= htmlspecialchars($gogokoena['izena']) ?></p>
<?php endif; ?>