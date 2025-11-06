<?php
session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$active_form = $_SESSION['active_form'] ?? 'login';

// Clear only after reading them
unset($_SESSION['login_error'], $_SESSION['register_error'], $_SESSION['active_form']);

function showError($error) {
    return !empty($error) ? "<div class='error-message'>{$error}</div>" : '';
}

function isActiveForm($form_name, $active_form) {
    return $form_name === $active_form ? 'active' : '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbleVu Investor Login</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <div class="container">
        <div class="form-box <?= isActiveForm('login', $active_form); ?>" id="login-form">

            <form action="Login_register.php" method="post">
                <h2>Login</h2>

                <?= showError($errors['login']); ?>

                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
                <p>Contact Us <a href="#">Here</a></p>
            </form>
        </div>
    </div>
    <script src="script/script.js"></script>
</body>
</html>
