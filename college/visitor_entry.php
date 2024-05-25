<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $query = "INSERT INTO visitors (username, phone, email) VALUES ('$username', '$phone', '$email')";
    if (mysqli_query($conn, $query)) {
        $message = "Visitor entry recorded successfully.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Entry</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <h1>Visitor Entry</h1>
        <?php if (!empty($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form action="visitor_entry.php" method="POST">
            <div class="form-group">
                <input type="text" name="username" placeholder="Name" required>
            </div>
            <div class="form-group">
                <input type="text" name="phone" placeholder="Phone Number" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>