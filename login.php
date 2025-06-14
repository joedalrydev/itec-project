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

            //kinukuha yung data sa database
            $sql = $conn->prepare("SELECT * FROM users WHERE username = ?");
            $sql->bind_param("s", $username);
            $sql->execute();
            $result = $sql->get_result();

            if ($result->num_rows === 1) {
                //tinitingnan kung yung password na nilagay ng user ay kaparehas ng password sa database
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
            $sql->close();
        }
        ?>
    </div>
    <script>
        const originalColors = {
            '--color-main-bg1': 'rgba(5, 24, 52, 1)',
            '--color-main-bg2': 'rgb(46, 21, 109)',
            '--color-blue': '#67ebff',
            '--color-gradient-start': '#0fb5ce',
            '--color-gradient-end': '#6d3ee4',
            '--color-bg1': '#281558',
            '--color-bg2': '#043a42',
            '--color-login-1': '#275961',
            '--color-login-2': '#092c4e',
            '--color-purple-accent': '#a259ff',
            '--color-bg-gradient1': '#0a6a79',
            '--color-bg-gradient2': '#3c237c'
        };
        const redColors = {
            '--color-main-bg1': '#661d1d',
            '--color-main-bg2': '#4e1818',
            '--color-blue': '#ff864a',
            '--color-gradient-start': '#ff3131',
            '--color-gradient-end': '#ff914d',
            '--color-bg1': '#ff3131',
            '--color-bg2': '#ff914d',
            '--color-login-1': '#6e1713',
            '--color-login-2': '#532d19',
            '--color-purple-accent': '#eb3328',
            '--color-bg-gradient1': '#8f2828',
            '--color-bg-gradient2': '#692402'
        };
        const greenColors = {
            '--color-main-bg1': '#1e490b',
            '--color-main-bg2': '#5aab70',
            '--color-blue': '#7ed957',
            '--color-gradient-start': '#0097b2',
            '--color-gradient-end': '#7ed957',
            '--color-bg1': '#0097b2',
            '--color-bg2': '#7ed957',
            '--color-login-1': 'rgb(39, 66, 27)',
            '--color-login-2': '#233b18',
            '--color-purple-accent': '#5aab70',
            '--color-bg-gradient1': '#204d0d',
            '--color-bg-gradient2': '#305a3b'
        };

        const colorSchemes = {
            original: originalColors,
            red: redColors,
            green: greenColors
        };

        function applyColors(colors) {
            for (const [key, value] of Object.entries(colors)) {
                document.documentElement.style.setProperty(key, value);
            }
        }

        let currentScheme = localStorage.getItem('colorScheme') || 'original';
        applyColors(colorSchemes[currentScheme]);
    </script>
</body>

</html>