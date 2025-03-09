<?php
// Incluir conexión a la base de datos
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $startDate = $_POST['start-date'];
    $endDate = $_POST['end-date'];
    $peopleCount = $_POST['people-count'];
    $paymentMethod = $_POST['payment-method'];

    // Validar y procesar la reserva
    if (empty($startDate) || empty($endDate) || empty($peopleCount) || empty($paymentMethod)) {
        die('Por favor complete todos los campos.');
    }

    $query = "INSERT INTO reservas (start_date, end_date, people_count, payment_method) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssis', $startDate, $endDate, $peopleCount, $paymentMethod);

    if ($stmt->execute()) {
        // Redirigir a la vista de listar fincas
        header('Location: ../views/listar_fincas.php');
        exit();
    } else {
        die('Error al procesar la reserva.');
    }
}
?>
