<?php
if (!isset($_POST)) {
    header("LOCATION: index.php");
} else {
    include "DatabaseController.php";
    $db = new DatabaseController();

    $db->query('INSERT INTO mercedes_amg VALUES (null, :model, :optie, :color, :trekhaak, :max_vermogen, :max_koppel)');
    $db->bind(':model', $_POST['model']);
    $db->bind(':optie', $_POST['options']);
    $db->bind(':color', $_POST['color']);
    $db->bind(':trekhaak', $_POST['trekhaak'] ?? 0);
    $db->bind(':max_vermogen', $_POST['max_vermogen']);
    $db->bind(':max_koppel', $_POST['max_koppel']);

    var_dump($db->print_query());

    if ($db->execute()) {
        header('Location: index.php?msg=success');
    }
}