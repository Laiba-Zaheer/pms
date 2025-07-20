<?php
include 'config.php';
$id = $_GET['id'];
$conn->query("DELETE FROM properties WHERE id=$id");
header("Location: index.php");
exit();
?>
