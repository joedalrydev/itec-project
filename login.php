<<<<<<< HEAD
<?php
session_start();
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
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];

                if (isset($_SESSION['users'])) {
                    $isValid = false;
                    foreach ($_SESSION['users'] as $user) {
                        if ($user['username'] === $username && $user['password'] === $password) {
                            $isValid = true;
                            $_SESSION['username'] = $username;
                            header("Location: home.php");
                            exit;
                        }
                    }

                    if (!$isValid) {
                        echo "<script>alert('Invalid username or password.')</script>";
                    }
                } else {
                    echo "<script>alert('No registered users found. Please register first.')</script>";
                }
            }
        ?>
        <p>Not registered? <a href="register.php">Create an account</a></p>
    </div>
</body>
=======
<?php
session_start();
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
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];

                if (isset($_SESSION['users'])) {
                    $isValid = false;
                    foreach ($_SESSION['users'] as $user) {
                        if ($user['username'] === $username && $user['password'] === $password) {
                            $isValid = true;
                            $_SESSION['username'] = $username;
                            header("Location: home.php");
                            exit;
                        }
                    }

                    if (!$isValid) {
                        echo "<p>Invalid username or password.</p>";
                    }
                } else {
                    echo "<p>No registered users found. Please register first.</p>";
                }
            }
        ?>
        <p>Not registered? <a href="register.php">Create an account</a></p>
    </div>
</body>
>>>>>>> 41f726397fd0129db99b02b14066303beaac1e93
</html>