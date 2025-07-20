<?php
session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? '',
    'success' => $_SESSION['success'] ?? ''
];
$activeform = $_SESSION['active_form'] ?? 'login';

// Don't clear session fully or you'll lose login data
unset($_SESSION['login_error'], $_SESSION['register_error'], $_SESSION['success'], $_SESSION['active_form']);

function showError($error) {
    return !empty($error) ? "<p class='text-danger'>$error</p>" : '';
}function showSuccess($msg) {
    return !empty($msg) ? "<p class='text-success'>$msg</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Property Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .form-box { display: none; } .form-box.active { display: block; }
    </style>
</head>
<body>
<div class="container mt-5">
    <?= showSuccess($errors['success']); ?>
    
    <div class="form-box <?= isActiveForm('login', $activeform); ?>" id="login-form">
        <form action="login_reg.php" method="POST">
            <h2>Login</h2>
            <?= showError($errors['login']); ?>
            <input type="email" name="reg-email" placeholder="Email" class="form-control mb-2" required>
            <input type="password" name="reg-password" placeholder="Password" class="form-control mb-3" required>
            <button type="submit" name="Login" class="btn btn-primary">Login</button>
            <p class="mt-2">Don't have an account? <a href="#" onclick="showForm('reg-form')">Register</a></p></form>
    </div>

    <div class="form-box <?= isActiveForm('register', $activeform); ?>" id="reg-form">
        <form action="login_reg.php" method="POST">
            <h2>Register</h2>
            <?= showError($errors['register']); ?>
            <input type="text" name="reg-name" placeholder="Full Name" class="form-control mb-2" required>
            <input type="email" name="reg-email" placeholder="Email" class="form-control mb-2" required>
            <input type="password" name="reg-password" placeholder="Password" class="form-control mb-2" required>
            <input type="text" name="reg-cnic" placeholder="CNIC" class="form-control mb-2">
            <input type="text" name="reg-ph" placeholder="Phone #" class="form-control mb-2">
            <input type="text" name="reg-address" placeholder="Address" class="form-control mb-2"> <input type="text" name="reg-occupation" placeholder="Occupation" class="form-control mb-2">
            <input type="number" name="reg-SOI" placeholder="Source of Income (Monthly)" class="form-control mb-2">

            <select name="reg-role" class="form-select mb-2" required>
                <option value="" disabled selected>Select Category</option>
                <option value="landlord">Landlord</option>
                <option value="admin">Admin</option>
                <option value="buyer">Buyer</option>
                <option value="tenant">Tenant</option>
            </select>

            <div class="mb-3">
                <label>Gender:</label><br>
                <input type="radio" id="male" name="reg-gender" value="male"><label for="male"> Male</label>
                <input type="radio" id="female" name="reg-gender" value="female"><label for="female"> Female</label> <input type="radio" id="other" name="reg-gender" value="other"><label for="other"> Other</label>
            </div>

            <button type="submit" name="register" class="btn btn-success">Register</button>
            <p class="mt-2">Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
        </form>
    </div>
</div>

<script>
    function showForm(formId) {
        document.querySelectorAll('.form-box').forEach(box => box.classList.remove('active'));
        document.getElementById(formId).classList.add('active');
    }
</script>
</body>
</html>