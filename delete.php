<?php
include "DatabaseController.php";
$db = new DatabaseController();
$db->query("DELETE FROM mercedes_amg WHERE id = :id");
$db->bind(':id', $_GET['id']);
$db->execute();
header("LOCATION: ./show");