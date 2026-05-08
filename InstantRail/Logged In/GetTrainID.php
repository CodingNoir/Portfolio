<?php
// Include your existing database connection
include "../common/db_connect.php";

// Get station ID from query parameters
$station_id = $_GET['station_id'] ?? null;

if ($station_id) {
    $sql_train = "SELECT id_tren_pk FROM tren WHERE id_estacion_fk = ? AND estado = 'Activa' LIMIT 1";
    $stmt = $conn->prepare($sql_train);
    $stmt->bind_param("i", $station_id);
    $stmt->execute();
    $stmt->bind_result($train_id);
    $stmt->fetch();
    echo $train_id ?: "No Train Available";
    $stmt->close();
}

$conn->close();
?>