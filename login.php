<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Penggajian</title>
</head>
<body>
    <h2>Login Sistem Penggajian</h2>
    <?php if (isset($_SESSION['error'])): ?>
        <p style="color:red;"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>
    <form method="post" action="proses_login.php">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
