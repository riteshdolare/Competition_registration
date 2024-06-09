<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = $_POST["user_type"];
    if ($user_type === "student") {
        header("Location: register.html"); // Redirect to register page for students
        exit();
    } elseif ($user_type === "admin") {
        header("Location: admin_page.php"); // Redirect to admin page for admins
        exit();
    }
}
?>
