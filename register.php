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
        <p>Already have an account? <a href="login.php">Login here</a></p>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            
            //tinitingnan kung may kaparehas na username sa database
            $sql = $conn->prepare("SELECT * FROM users WHERE username = ?");
            $sql->bind_param("s", $username);
            $sql->execute();
            $result = $sql->get_result();

            if ($result->num_rows > 0) {
                echo "<script>alert('Username is already taken. Please choose another one.')</script>";
                exit;
            }

            //tinitingnan kung magkaparehas ang password at confirm password
            if ($password !== $cpassword) {
                echo "<script>alert('Passwords do not match.')</script>";
                exit;
            }

            //nilalagay sa database ang login details ng user
            $sql = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $sql->bind_param("ss", $username, $password);
            $sql->execute();

            echo "<script>alert('Registration successful!')</script>";
            echo "<script>window.location.href = 'login.php'</script>";
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
            '--color-login-1': '#67ebff',
            '--color-login-2': '#1e90ff',
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
            '--color-login-1': '#eb3328',
            '--color-login-2': '#ff864a',
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
            '--color-login-1': '#5aab70',
            '--color-login-2': '#7ed957',
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