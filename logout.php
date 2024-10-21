<?php
session_start();

if (isset($_SESSION['user'])) {
    session_destroy(); 
    header('Location: index.php'); 
} elseif (isset($_SESSION['employee'])) {
    session_destroy(); 
    header('Location: login_employee.php'); 
} else {
    header('Location: index.php'); 
}
exit;
?>
