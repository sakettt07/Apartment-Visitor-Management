<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $phone = $_POST['phone'];

    $query = "UPDATE visitors SET exit_time=NOW() WHERE username='$username' AND phone='$phone' AND exit_time IS NULL";
    if (mysqli_query($conn, $query)) {
        if (mysqli_affected_rows($conn) > 0) {
            $message = "Visitor exit time has been recorded.";
        } else {
            $message = "No matching visitor found or exit time already recorded.";
        }
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
    <title>Visitor Exit</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <h1>Visitor Exit</h1>
        <?php if (!empty($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form action="visitor_exit.php" method="POST">
            <div class="form-group">
                <input type="text" name="username" placeholder="Name" required>
            </div>
            <div class="form-group">
                <input type="text" name="phone" placeholder="Phone Number" required>
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>
