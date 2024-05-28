<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the submitted credentials match the default admin credentials
    if ($_POST["username"] === "saket" && $_POST["password"] === "12345") {
        // Redirect to the admin dashboard or perform other admin-specific actions
        header("Location: admin_dashboard.php");
        exit;
    } else {
        // Incorrect credentials, display an error message
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Dashboard</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container">
    <h1>Login - Admin Dashboard</h1>
    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group">
            <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Login</button>
    </form>
    </div>
</body>

</html>