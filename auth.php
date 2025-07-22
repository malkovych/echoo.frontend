<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Echoo – Login / Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Echoo</h1>
        <div id="form-toggle">
            <button id="show-login" class="active">Login</button>
            <button id="show-register">Register</button>
        </div>
        <!-- Login Form -->
        <form id="login-form">
            <input type="email" id="login-email" placeholder="Email" required>
            <input type="password" id="login-password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <!-- Register Form -->
        <form id="register-form" style="display:none;">
            <input type="email" id="register-email" placeholder="Email" required>
            <input type="password" id="register-password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <div id="error-msg"></div>
    </div>
    <script src="assets/crypto-js.min.js"></script>
    <script src="assets/main.js"></script>
    <script>
        // Перехід на форму реєстрації, якщо #register у URL
        if (window.location.hash === '#register') {
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('show-register').click();
            });
        }
        if (localStorage.getItem('jwt')) {
            window.location.href = 'dashboard.php';
        }
    </script>
</body>
</html> 