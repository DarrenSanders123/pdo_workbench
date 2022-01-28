<?php
include "DatabaseController.php";
$db = new DatabaseController();
if (isset($_POST['trekhaak'])) {
    if ($_POST['trekhaak'] == "on" ) {
        $trekhaak = 1;
    } else {
        $trekhaak = 0;
    }
} else {
    $trekhaak = 0;
}

if (isset($_POST['model'])) {
    $db->query("UPDATE mercedes_amg SET model = :model WHERE id = :id");
    $db->bind(':id', $_POST['id']);
    $db->bind(':model', $_POST['model']);
    $db->execute();
} if (isset($_POST['optie'])) {
    $db->query("UPDATE mercedes_amg SET optie = :optie WHERE id = :id");
    $db->bind(':id', $_POST['id']);
    $db->bind(':optie', $_POST['optie']);
    $db->execute();
} if (isset($_POST['color'])) {
    $db->query("UPDATE mercedes_amg SET color = :color WHERE id = :id");
    $db->bind(':id', $_POST['id']);
    $db->bind(':color', $_POST['color']);
    $db->execute();
} if (isset($trekhaak)) {
    $db->query("UPDATE mercedes_amg SET trekhaak = :trekhaak WHERE id = :id");
    $db->bind(':id', $_POST['id']);
    $db->bind(':trekhaak', $trekhaak);
    $db->execute();
} if (isset($_POST['max_vermogen'])) {
    $db->query("UPDATE mercedes_amg SET max_vermogen = :max_vermogen WHERE id = :id");
    $db->bind(':id', $_POST['id']);
    $db->bind(':max_vermogen', $_POST['max_vermogen']);
    $db->execute();
} if (isset($_POST['max_koppel'])) {
    $db->query("UPDATE mercedes_amg SET max_koppel = :max_koppel WHERE id = :id");
    $db->bind(':id', $_POST['id']);
    $db->bind(':max_koppel', $_POST['max_koppel']);
    $db->execute();
}
header("LOCATION: ./show");