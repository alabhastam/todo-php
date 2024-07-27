<?php
include_once "../bootstrap/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // اعتبارسنجی ورودی‌ها
    if (empty($username) || empty($email) || empty($password)) {
        die("All fields are required.");
    }

    // هش کردن رمز عبور
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // ذخیره اطلاعات کاربر در دیتابیس
    global $conn;
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    
    if ($stmt->execute()) {
        // ریدایرکت به صفحه ورود یا هر صفحه دیگر
        header("Location: ../login.php");
        exit;
    } else {
        die("Failed to register user.");
    }
} else {
    header("Location: ../register.php");
    exit;
}
?>
