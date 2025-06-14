<?php
session_start();
include("database.php");

$username = $_SESSION['username'];
$sql = $conn->prepare("SELECT pfp FROM users WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();
$result = $sql->get_result();
$row = $result->fetch_assoc();
$pfpPath = $row['pfp'];
$pfp = "." . $pfpPath;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Lilita One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet'>
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/settings.css">
    <title>Settings</title>
</head>

<body>
    <nav>
        <a href="home.php"><img src="./images/logo.png" alt="Logo" id="logo"></a>
        <ul>
            <li><a href="home.php" class="blue-text">Home</a></li>
            <li><a href="profile.php" class="blue-text">Profile</a></li>
            <li><a href="profile_animeList.php" class="blue-text">List</a></li>
            <li><a href="browse.php" class="blue-text">Reserve</a></li>
        </ul>
        <div class="avatar">
            <img src="<?php echo $pfp; ?>" alt="Logo" width="50px" height="50px" id="profilepic">
            <div id="avatarHover">
                <button class="color-toggle original" data-scheme="original"></button>
                <button class="color-toggle red" data-scheme="red"></button>
                <button class="color-toggle green" data-scheme="green"></button>
                <a href="settings.php">Settings</a>
                <a href="index.php">Logout</a>
            </div>
        </div>
    </nav>

    <div id="menu">
        <i class="fa fa-bars"></i>
    </div>

    <div id="menu-sidebar">
        <div class="menu-content">
            <div class="menu-header">
                <img src="./images/logo.png" alt="Logo" class="logo">
                <img src="<?php echo $pfp; ?>" alt="Logo" width="75px" height="75px">
                <h2><?php echo $username ?></h2>
            </div>
            <ul>
                <li><a href="home.php"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
                <li><a href="profile_animeList.php"><i class="fa fa-list"></i>List</a></li>
                <li><a href="browse.php"><i class="fa fa-ticket"></i>Reserve</a></li>
            </ul>
            <div class="menu-footer">
                <div class="buttons">
                    <button class="color-toggle original" data-scheme="original"></button>
                    <button class="color-toggle red" data-scheme="red"></button>
                    <button class="color-toggle green" data-scheme="green"></button>
                </div>
                <a href="settings.php"><i class="fa fa-cog"></i>Settings</a>
                <a href="index.php"><i class="fa fa-sign-out"></i>Logout</a>
            </div>
        </div>
    </div>

    <main>
        <div class="container">
            <form action="settings.php" method="POST">
                <h1>Change Username</h1>
                <input type="text" id="username" name="username" placeholder="Enter old username" required>
                <input type="text" id="newUsername" name="newUsername" placeholder="Enter new username" required>
                <button type="submit" name="change_username">Change it</button>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_username'])) {
                $oldUsername = $_POST['username'];
                $newUsername = $_POST['newUsername'];

                if ($oldUsername === $username) {
                    //tinitingnan kung meron nang username sa database na kaparehas ng newUsername
                    $sql = $conn->prepare("SELECT * FROM users WHERE username = ?");
                    $sql->bind_param("s", $newUsername);
                    $sql->execute();
                    $result = $sql->get_result();
                    if ($result->num_rows > 0) {
                        echo "<script>alert('Username is already taken. Please choose another one.')</script>";
                        exit;
                    }

                    //inu-update ang username sa database
                    $sql = $conn->prepare("UPDATE users SET username = ? WHERE username = ?");
                    $sql->bind_param("ss", $newUsername, $oldUsername);
                    $sql->execute();
                    $_SESSION['username'] = $newUsername;
                    $username = $newUsername;
                    echo "<script>alert('Username changed successfully!');</script>";
                } else {
                    echo "<script>alert('Old username is wrong');</script>";
                }
            }
            ?>

            <div class="text">
                <p>
                    To maintain the integrity and security of user accounts, changes to usernames and profile pictures are carefully monitored and recorded.
                    Unauthorized or suspicious attempts to modify these details may result in temporary account restrictions or verification checks.
                </p>
                <button type="submit" id="deleteAcc">Delete Account</button>

                <div class="deleteModal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Are you sure you want to delete your account?</h2>
                        <p style="color: #eb3328;">This action cannot be undone.</p>
                        <form action="settings.php" method="POST">
                            <button type="submit" name="confirm" id="confirm">Yes</button>
                            <button type="button" nmae="cancel" id="cancel">No</button>
                        </form>

                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm'])) {
                            //ide-delete ang user sa database
                            $sql = $conn->prepare("DELETE FROM users WHERE username = ?");
                            $sql->bind_param("s", $username);
                            $sql->execute();

                            echo "<script>alert('Account deleted successfully!');</script>";
                            echo "<script>window.location.href = 'index.php';</script>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <form action="settings.php" method="POST" enctype="multipart/form-data">
                <h1>Change Profile</h1>
                <label for="pfp" id="pfpLabel">Upload your new photo here</label>
                <input type="file" id="pfp" name="pfp" accept="image/*" required>
                <button type="submit" name="change_pfp">Change Photo</button>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_pfp'])) {
                //chine-check kung na-upload yung image nang walang error
                if (isset($_FILES['pfp']) && $_FILES['pfp']['error'] == 0) {
                    //kung saang folder ilalagay yung image
                    $uploadDir = 'uploads/';

                    //kinukuha yung file extension ng image
                    $ext = pathinfo($_FILES['pfp']['name'], PATHINFO_EXTENSION);

                    //gumagawa ng filename gamit ang username ng user
                    $filename = $username . '_pfp.' . $ext;
                    $uploadFile = $uploadDir . $filename;

                    if (move_uploaded_file($_FILES['pfp']['tmp_name'], $uploadFile)) {
                        //path ng image na ilalagay sa database
                        $webPath = '/' . $uploadDir . $filename;

                        //inu-update ang profile picture sa database
                        $sql = $conn->prepare("UPDATE users SET pfp = ? WHERE username = ?");
                        $sql->bind_param("ss", $webPath, $username);
                        $sql->execute();

                        echo "<script>alert('Profile picture updated!')</script>";
                    }
                } else {
                    echo "<script>alert('No file uploaded.')</script>";
                }
            }
            ?>
        </div>
    </main>

    <footer>
        <div class="logo-wrapper">
            <img src="./images/logo.png" alt="Logo" width="75px" height="75px" class="logo">
            <p>&copy; JAJ.AniMate</p>
        </div>
        <div class="footer-content">
            <p class="blue-text">AniMate is your free anime and movie companion—no ads, no hassle.</p>
            <p>
                Watch trailers, track your favorite anime series and movies, and manage your personal watchlist—all in one place.
                You can also book cinema or theatre tickets for upcoming anime shows and reserve your seats in advance.
                With thousands of anime titles to explore, AniMate makes it easy to stay connected to what you love.
            </p>
        </div>
    </footer>

    <script src="./scripts/script.js"></script>
    <script>
        const deleteAccButton = document.getElementById('deleteAcc');
        const deleteModal = document.querySelector('.deleteModal');
        const closeModal = document.querySelector('.close');
        const cancelButton = document.getElementById('cancel');

        deleteAccButton.addEventListener('click', function(e) {
            e.preventDefault();

            deleteModal.style.display = 'block';
        });

        closeModal.addEventListener('click', function() {
            deleteModal.style.display = 'none';
        });

        cancelButton.addEventListener('click', function() {
            deleteModal.style.display = 'none';
        });

        window.onclick = function(event) {
            if (event.target === deleteModal) {
                deleteModal.style.display = "none";
            }
        };
    </script>
</body>

</html>