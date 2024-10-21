<?php
$conn = new mysqli('sql303.infinityfree.com', 'if0_37549380', 'terenceadmin123', 'if0_37549380_XXX');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $conn->query("INSERT INTO employees (name, email) VALUES ('$name', '$email')");
    header('Location: login_employee.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Employee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Register Employee</h2>
        <form action="register_employee.php" method="POST">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit">Register</button>
        </form>
        <a href="login_employee.php">Already have an account? Login</a>
    </div>
</body>
</html>
