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
    <title>Register</title>
</head>
<body>
    <img src="./images/logo.png" alt="logo" id="logo">
    <div class="container">
        <h1>Register</h1>
        <form action="register.php" method="POST">
            <input type="text" id="username" name="username" placeholder="Username">
            <input type="password" id="password" name="password" placeholder="Password">
            <input type="password" id="password" name="cpassword" placeholder="Confirm Password" required>
            <button type="submit" id="submit">Register</button>
        </form>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];

                if (isset($_SESSION['users'])) {
                    foreach ($_SESSION['users'] as $user) {
                        if ($user['username'] === $username) {
                            echo "<script>alert('Username is already taken. Please choose another one.')</script>";
                            exit;
                        }
                    }
                }

                if ($password !== $cpassword) {
                    echo "<script>alert('Passwords do not match.')</script>";
                    exit;
                }

                if (!isset($_SESSION['users'])) {
                    $_SESSION['users'] = [];
                }

                $_SESSION['users'][$username] = [
                    'username' => $username,
                    'password' => $password,
                    'profile' => [
                        'anime_list' => [],
                        'manga_list' => [],
                    ]
                ];
            }
        ?>
        <p>Already have an account? <a href="login.php">Login here</a></p>
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
    <title>Register</title>
</head>
<body>
    <img src="./images/logo.png" alt="logo" id="logo">
    <div class="container">
        <h1>Register</h1>
        <form action="register.php" method="POST">
            <input type="text" id="username" name="username" placeholder="Username">
            <input type="password" id="password" name="password" placeholder="Password">
            <input type="password" id="password" name="cpassword" placeholder="Confirm Password" required>
            <button type="submit" id="submit">Register</button>
        </form>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];

                if (isset($_SESSION['users'])) {
                    foreach ($_SESSION['users'] as $user) {
                        if ($user['username'] === $username) {
                            echo "<p>Username is already taken. Please choose another one.</p>";
                            exit;
                        }
                    }
                }

                if ($password !== $cpassword) {
                    echo "<p>Passwords do not match.</p>";
                    exit;
                }

                if (!isset($_SESSION['users'])) {
                    $_SESSION['users'] = [];
                }

                $_SESSION['users'][$username] = [
                    'username' => $username,
                    'password' => $password,
                    'profile' => [
                        'anime_list' => [],
                        'manga_list' => [],
                    ]
                ];
            }
        ?>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
>>>>>>> 41f726397fd0129db99b02b14066303beaac1e93
</html>