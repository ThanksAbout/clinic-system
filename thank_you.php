<?php
  include 'partials/header.php';
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Booking!</title>
</head>
<body>
    <h2>Thank You for Your Booking!</h2>
    
    <?php
    $name = $_GET['name'];
    $date = $_GET['date'];
    echo "<p>Thank you, $name! Your appointment has been successfully booked for <strong>$date</strong>.</p>";
    ?>
    
    <p>We will contact you shortly to confirm your appointment.</p>

    <a href="index.php">
        <button>Back to Home</button>
    </a>
</body>
</html>
<?php
  include 'partials/footer.php';
?>