<?php
session_start();

$conn = new mysqli('sql303.infinityfree.com', 'if0_37549380', 'terenceadmin123', 'if0_37549380_XXX');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    $result = $conn->query("SELECT * FROM employees WHERE email='$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user['email'];
        header('Location: dashboard_employee.php');
        exit;
    } else {
        $error = "Employee not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Employee Login</h2>
        
        <?php if (isset($error)): ?>
            <p style="color:red;"><?= htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form action="login_employee.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register_employee.php">Register here</a></p>
    </div>
</body>
</html>
