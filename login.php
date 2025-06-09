<?php
session_start();
include("database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/login.css">
    <title>Login</title>
</head>

<body>
    <img src="./images/logo.png" alt="logo" id="logo">
    <div class="container">
        <h1>SIGN IN</h1>
        <form action="login.php" method="POST">
            <input type="text" id="username" name="username" placeholder="Username">
            <input type="password" id="password" name="password" placeholder="Password">
            <button type="submit" id="submit">SIGN IN</button>
        </form>
        <p>Not registered? <a href="register.php">Create an account</a></p>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                if ($user['password'] === $password) {
                    $_SESSION['username'] = $username;
                    header("Location: home.php");
                    exit;
                } else {
                    echo "<script>alert('Invalid username or password.')</script>";
                }
            } else {
                echo "<script>alert('Invalid username or password.')</script>";
            }
            $stmt->close();
        }
        ?>
    </div>
</body>

</html>