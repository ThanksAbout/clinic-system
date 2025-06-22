<?php
require_once '_inc/classes/Database.php';
require_once '_inc/classes/Appointment.php';
require_once '_inc/classes/BookingController.php';

$db = new Database();
$pdo = $db->getConnection();

$appointment = new Appointment($pdo);
$controller = new BookingController($appointment);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($controller->process($_POST)) {
        header("Location: thank_you.php?name=" . urlencode($_POST['name']) . "&date=" . urlencode($_POST['date']));
        exit;
    } else {
        echo "Error saving the appointment.";
    }
} else {
    echo "Invalid request. Please submit the form.";
}?>