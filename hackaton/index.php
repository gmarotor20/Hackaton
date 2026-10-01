<?php
session_start();
require_once "klaseak/taldea.php";

$taldea = new Taldea();
$taldeak = $taldea->zerrendatu();
$gogokoena = null;
if (isset($_SESSION['gogokoena'])) {
    $gogokoena = $taldea->bilatu($_SESSION['gogokoena']);
}
?>
<h1>Sailkapena</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Izena</th>
        <th>Puntuak</th>
        <th>Ezabatu</th>
        <th>Gogokoena</th>    
    </tr>
    <?php foreach ($taldeak as $t): ?>
        <tr>
            <td><?= $t['id'] ?></td>
            <td><a href="partaideak.php?id=<?= $t['id'] ?>"><?= htmlspecialchars($t['izena']) ?></a></td>
            <td>
                <form action="prozesuak/taldeaAldatu.php" method="post">
                    <input type="hidden" name="id" value="<?= $t['id'] ?>">
                    <input type="number" name="puntuak" value="<?= $t['puntuak'] ?>">
                    <button type="submit">Aldatu</button>
                </form>
            </td>
            <td>
                <form action="prozesuak/taldeaEzabatu.php" method="post">
                    <input type="hidden" name="id" value="<?= $t['id'] ?>">
                    <button type="submit">Ezabatu</button>
                </form>
            </td>
            <td>
                <form action="prozesuak/taldeaGogokoena.php" method="post">
                    <input type="hidden" name="id" value="<?= $t['id'] ?>">
                    <button type="submit">Gogokoena</button>
                </form>
            </td>    
        </tr>
    <?php endforeach; ?>
</table>

<?php if (isset($_GET['errorea'])): ?>
    <p style="color:red"><?= htmlspecialchars($_GET['errorea']) ?></p>
<?php endif; ?>
<?php if (isset($_GET['mezua'])): ?>
    <p style="color:green"><?= htmlspecialchars($_GET['mezua']) ?></p>
<?php endif; ?>

<h2>Gehitu taldea</h2>
<form action="prozesuak/taldeaSortu.php" method="post">
    <p>Izena: <input type="text" name="izena"></p>
    <p>Puntuak: <input type="number" name="puntuak"></p>
    <button type="submit">Sortu</button>
</form>
<?php if ($gogokoena): ?>
    <p style="color:blue">Zure talde favoritoa: <?= htmlspecialchars($gogokoena['izena']) ?></p>
<?php endif; ?>