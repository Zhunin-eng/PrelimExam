<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Simple static login
    $correct_username = "admin";
    $correct_password = "12345";

    if ($username === $correct_username && $password === $correct_password) {
        $_SESSION["username"] = $username;

        header("Location: main.php");
        exit();
    } else {
        $message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="login-container">

    <h2>Login</h2>

    <?php if ($message != ""): ?>
        <p class="error"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST" action="">

        <label for="username">Username</label>
        <input 
            type="text" 
            id="username" 
            name="username" 
            placeholder="Enter username"
            required
        >

        <label for="password">Password</label>
        <input 
            type="password" 
            id="password" 
            name="password" 
            placeholder="Enter password"
            required
        >

        <button type="submit">Login</button>

    </form>

    <p>
        Don't have an account?
        <a href="register.php">Register</a>
    </p>

</div>

</body>
</html>



