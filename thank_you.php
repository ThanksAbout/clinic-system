<?php
  include 'header.php';
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Booking!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <link href="css/templatemo-medic-care.css" rel="stylesheet">
   
</head>
<body>
    <h2>Thank You for Your Booking!</h2>
    
    <?php
    $name = htmlspecialchars($_GET['name']);
    $date = htmlspecialchars($_GET['date']);
    echo "<p>Thank you, $name! Your appointment has been successfully booked for <strong>$date</strong>.</p>";
    ?>
    
    <p>We will contact you shortly to confirm your appointment.</p>

    <a href="index.php">
        <button>Back to Home</button>
    </a>
</body>
</html>
<?php
  include 'footer.php';
?>