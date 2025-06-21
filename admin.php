<?php
session_start(); 
require_once '_inc/autoload.php';

$db = new Database();
$pdo = $db->getConnection();
$user = new User($pdo);

if (!$user->isLoggedIn()) {
    header('Location: login.php');
    exit;
}

include('partials/header.php');
$appointment = new Appointment($pdo);
$review = new Review($pdo);

if (isset($_GET['delete_appointment'])) {
    $id = $_GET['delete_appointment'];
    $appointment->deleteAppointment($id);
}

if (isset($_GET['delete_review'])) {
    $id = $_GET['delete_review'];
    $review->deleteReview($id);
}

$appointments = $appointment->getAllAppointments();
$reviews = $review->getAllReviews();
?>

<section class="container">
    <h1>Admin Panel</h1>

    <h2>Appointments</h2>
    <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid #000;">
        <tr style="background-color: #f2f2f2; font-weight: bold;">
            <th>ID</th><th>Full Name</th><th>Phone</th><th>Email</th>
            <th>Date</th><th>Time</th><th>Message</th><th>Actions</th>
        </tr>
        <?php foreach ($appointments as $app): ?>
        <tr>
            <td><?= htmlspecialchars($app['id']) ?></td>
            <td><?= htmlspecialchars($app['full_name']) ?></td>
            <td><?= htmlspecialchars($app['phone']) ?></td>
            <td><?= htmlspecialchars($app['email']) ?></td>
            <td><?= htmlspecialchars($app['date']) ?></td>
            <td><?= htmlspecialchars($app['time']) ?></td>
            <td><?= htmlspecialchars($app['add_message']) ?></td>
            <td>
                <a href="edit_appointment.php?id=<?= $app['id'] ?>">Edit</a> |
                <a href="?delete_appointment=<?= $app['id'] ?>" onclick="return confirm('Delete this appointment?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <hr>

    <h2>Reviews</h2>
    <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid #000;">
        <tr style="background-color: #f2f2f2; font-weight: bold;">
            <th>ID</th><th>Full Name</th><th>Rating</th><th>Comment</th><th>Created At</th><th>Delete</th>
        </tr>
        <?php foreach ($reviews as $rev): ?>
        <tr>
            <td><?php echo $rev['id'] ?></td>
            <td><?php echo $rev['full_name'] ?></td>
            <td><?php echo $rev['rating'] ?></td>
            <td><?php echo $rev['comment'] ?></td>
            <td><?php echo $rev['created_at'] ?></td>
            <td><a href="?delete_review=<?php echo $rev['id'] ?>" onclick="return confirm('Delete this review?')">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</section>

<?php include('partials/footer.php'); ?>