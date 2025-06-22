<?php
require_once '_inc/autoload.php';
include('partials/header.php');



$db = new Database();
$pdo = $db->getConnection();
$appointment = new Appointment($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id      = $_POST['id']     ?? null;
    $name    = $_POST['name']   ?? '';
    $email   = $_POST['email']  ?? '';
    $phone   = $_POST['phone']  ?? '';
    $date    = $_POST['date']   ?? '';
    $message = $_POST['message'] ?? '';

    if ($id && $appointment->updateAppointment($id, $name, $phone, $email, $date, $message)) {
        header("Location: admin.php");
        exit;
    } else {
        echo "<div class='error'>Failed to update the appointment.</div>";
    }
}

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "<div class='error'>Missing ID.</div>";
    exit;
}

$data = $appointment->getAppointmentById($id);
if (!$data) {
    echo "<div class='error'>Appointment not found.</div>";
    exit;
}
?>
<link rel="stylesheet" href="css/EditAppointment.css">
<div class="edit-form-container">
    <h2>Edit Appointment #<?= htmlspecialchars($data['id']) ?></h2>
    <form method="post" action="edit_appointment.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">
        
        <input type="text" name="name" value="<?= htmlspecialchars($data['full_name']) ?>" required placeholder="Full name">
        <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required placeholder="Email">
        <input type="text" name="phone" value="<?= htmlspecialchars($data['phone']) ?>" required placeholder="Phone">
        <input type="date" name="date" value="<?= htmlspecialchars($data['date']) ?>" required>
        <textarea name="message" rows="4" placeholder="Message"><?= htmlspecialchars($data['add_message']) ?></textarea>
        
        <button type="submit">Save</button>
        <a href="admin.php"><button type="button">Cancel</button></a>
    </form>
</div>

<?php include('partials/footer.php'); ?>