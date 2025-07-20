<?php
session_start();
require_once "config.php";

// ------------------- REGISTER -------------------
if (isset($_POST['register'])) {
    $name = $_POST['reg-name'];
    $email = $_POST['reg-email'];
    $password = $_POST['reg-password'];
    $role = $_POST['reg-role'];
    $cnic = $_POST['reg-cnic'] ?? '';
    $phone = $_POST['reg-ph'] ?? '';
    $address = $_POST['reg-address'] ?? '';
    $occupation = $_POST['reg-occupation'] ?? '';
    $soi = $_POST['reg-SOI'] ?? 0;
    $gender = $_POST['reg-gender'] ?? '';

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $stmt = $conn->prepare("SELECT `reg-email` FROM register WHERE `reg-email` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['register_error'] = "Email is already registered";
        $_SESSION['active_form'] = "register";
    } else {
        // Insert new user with all fields
        $insert = $conn->prepare("INSERT INTO register (`reg-name`, `reg-email`, `reg-password`, `reg-role`, `reg-cnic`, `reg-ph`, `reg-address`, `reg-occupation`, `reg-SOI`, `reg-gender`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->bind_param("ssssssssss", $name, $email, $hashedPassword, $role, $cnic, $phone, $address, $occupation, $soi, $gender);
        
        if ($insert->execute()) {
            $_SESSION['success'] = "Registration successful! Please login.";
            $_SESSION['active_form'] = "login";
        } else {
            $_SESSION['register_error'] = "Registration failed. Please try again.";
            $_SESSION['active_form'] = "register";
        }
    }

    header("Location: index.php");
    exit();
}

// ------------------- LOGIN -------------------
if (isset($_POST['Login'])) {
    $email = $_POST['reg-email'];
    $password = $_POST['reg-password'];

    // Debug: Check if email and password are received
    error_log("Login attempt - Email: " . $email);
    
    $stmt = $conn->prepare("SELECT * FROM register WHERE `reg-email` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Debug: Log the stored hash (remove this in production)
        error_log("Stored hash: " . $user['reg-password']);
        error_log("Input password: " . $password);

        // Verify password
        if (password_verify($password, $user['reg-password'])) {
            $_SESSION['reg-name'] = $user['reg-name'];
            $_SESSION['reg-email'] = $user['reg-email'];
            $_SESSION['reg-role'] = $user['reg-role'];

            // Redirect based on role
            if ($user['reg-role'] === 'admin' || $user['reg-role'] === 'landlord') {
                header("Location: admin-page.php");
            } else {
                header("Location: user-page.php");
            }
            exit();
        } else {
            $_SESSION['login_error'] = 'Incorrect password';
            error_log("Password verification failed for email: " . $email);
        }
    } else {
        $_SESSION['login_error'] = 'Email not found';
        error_log("Email not found: " . $email);
    }
$_SESSION['active_form'] = 'login';
    header("Location: index.php");
    exit();
}?>