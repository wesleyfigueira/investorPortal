<?php 
session_start();

// Redirect if not logged in
if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}

$errors = [
    'register' => $_SESSION['register_error'] ?? ''
];

function showError($error) {
    return !empty($error) ? "<div class='error-message'>{$error}</div>" : '';
}

unset($_SESSION['register_error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbleVu Admin Dashboard</title>
    <link rel="stylesheet" href="styles/admin_dashboard.css">
</head>
<body>
        <?php
        if (isset($_SESSION['register_success'])) {
            echo '<div class="success-message">' . $_SESSION['register_success'] . '</div>';
            unset($_SESSION['register_success']);
        }

        if (isset($_SESSION['register_error'])) {
            echo '<div class="error-message">' . $_SESSION['register_error'] . '</div>';
            unset($_SESSION['register_error']);
        }
        ?>


    <!-- HEADER -->
    <header>
        <h1>Welcome, <span><?= htmlspecialchars($_SESSION['name']); ?></span></h1>
        <nav>
            <button onclick="window.location.href='logout.php'">Logout</button>
        </nav>
    </header>

    <main>
        <!-- Overview Section -->
        <section id="overview">
            <h2>Dashboard Overview</h2>
            <p>Here you can manage users, monitor platform activity, and update system configurations.</p>
        </section>

        <!-- Registration Section -->
        <section id="user-registration">
            <h2>Register New User</h2>
            <?= showError($errors['register']); ?>
            <form action="Login_register.php" method="post" class="register-form">
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="">--Select Role--</option>
                    <option value="User">User</option>
                    <option value="Admin" disabled>Admin</option>
                </select>
                <button type="submit" name="register">Register</button>
            </form>
        </section>

        <!-- Info Section -->
        <section id="info">
            <h2>Information & Updates</h2>
            <p>This section will display important information, news, or updates for administrators.</p>
        </section>

        <section id="anchors">
            <h2>Quick Access Links</h2>
            <p>Use these shortcuts to access important admin tools and sections.</p>

            <div class="anchors-grid">
                <a href="manage_users.php" class="anchor-box">
                    <h3>Manage Users</h3>
                    <p>View, edit, or remove user accounts.</p>
                </a>

                <a href="reports.php" class="anchor-box">
                    <h3>Reports</h3>
                    <p>View platform statistics and activity logs.</p>
                </a>

                <a href="settings.php" class="anchor-box">
                    <h3>System Settings</h3>
                    <p>Configure permissions and update system preferences.</p>
                </a>
            </div>
        </section>


        <!-- Settings Section -->
        <section id="settings">
            <h2>Settings</h2>
            <p>Manage platform configurations, permissions, and other admin options.</p>
        </section>
    </main>

    <footer>
        <p>&copy; <?= date("Y") ?> AbleVu Admin Dashboard</p>
    </footer>

    <script src="script/admin_dashboard.js"></script>
</body>
</html>
