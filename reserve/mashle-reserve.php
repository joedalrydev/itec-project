<?php
session_start();
include("../database.php");

$username = $_SESSION['username'];
$sql = $conn->prepare("SELECT pfp FROM users WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();
$result = $sql->get_result();
$row = $result->fetch_assoc();
$pfpPath = $row['pfp'];
$pfp = ".." . $pfpPath;

$title = 'MASHLE';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/reserve.css">
    <style>
        .top {
            height: 100vh;
            background: linear-gradient(to right,
                    rgba(0, 0, 0, 0) 0%,
                    rgba(0, 0, 0, 1) 50%,
                    rgba(0, 0, 0, 1) 70%,
                    var(--color-bg1) 100%),
                url(../images/mashle.png) left top no-repeat;
            background-size: cover, 50% 100%;
            background-position: center center, left top;
            background-repeat: no-repeat, no-repeat;
        }

        @media only screen and (max-width: 480px) {
            .top {
                background:
                    linear-gradient(rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1) 70%, var(--color-bg1) 100%),
                    url(../images/mashle.png) center center no-repeat;
                background-size: cover;
            }
        }
    </style>
    <title>MASHLE</title>
</head>

<body>
    <main>
        <div class="top">
            <nav>
                <ul>
                    <li><a href="../home.php" class="blue-text">Home</a></li>
                    <li><a href="../profile_animeList.php" class="blue-text">List</a></li>
                </ul>
                <div class="avatar">
                    <img src="<?php echo $pfp; ?>" alt="Logo" width="50px" height="50px" id="profilepic">
                    <div id="avatarHover">
                        <button class="color-toggle original" data-scheme="original"></button>
                        <button class="color-toggle red" data-scheme="red"></button>
                        <button class="color-toggle green" data-scheme="green"></button>
                        <a href="../settings.php">Settings</a>
                        <a href="../index.php">Logout</a>
                    </div>
                </div>
            </nav>

            <div id="menu">
                <i class="fa fa-bars"></i>
            </div>

            <div id="menu-sidebar">
                <div class="menu-content">
                    <div class="menu-header">
                        <img src="../images/logo.png" alt="Logo" class="logo">
                        <img src="<?php echo $pfp; ?>" alt="Logo" width="75px" height="75px">
                        <h2><?php echo $username ?></h2>
                    </div>
                    <ul>
                        <li><a href="../home.php"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="../profile.php"><i class="fa fa-user"></i>Profile</a></li>
                        <li><a href="../profile_animeList.php"><i class="fa fa-list"></i>List</a></li>
                        <li><a href="../browse.php"><i class="fa fa-ticket"></i>Reserve</a></li>
                    </ul>
                    <div class="menu-footer">
                        <div class="buttons">
                            <button class="color-toggle original" data-scheme="original"></button>
                            <button class="color-toggle red" data-scheme="red"></button>
                            <button class="color-toggle green" data-scheme="green"></button>
                        </div>
                        <a href="../settings.php"><i class="fa fa-cog"></i>Settings</a>
                        <a href="../index.php"><i class="fa fa-sign-out"></i>Logout</a>
                    </div>
                </div>
            </div>

            <div class="anime">
                <div class="banner"></div>
                <div class="anime-description">
                    <h1>MASHLE</h1>
                    <p class="genre">Action, Comedy, Fantasy</p>
                    <p>
                        This is a world of magic. This is a world in which magic is casually used by everyone.

                        In a deep, dark forest in this world of magic, there is a boy who is singlemindedly working out.
                        His name is Mash Burnedead, and he has a secret. He can’t use magic.

                        All he wanted was to live a quiet life with his family, but people suddenly start trying to kill him one day and he somehow finds himself enrolled in Magic School.
                    </p>
                    <button type="submit" id="bookModalBtn" name="bookbtn" class="button bookTickets">Book Tickets <i class="fa fa-arrow-down"></i></a>
                </div>
            </div>
        </div>

        <div class="book-modal">
            <div class="book-modal-content">
                <span class="close">&times;</span>
                <div class="info">
                    <p>Price: <span class="gradient-text">₱250</span></p>
                    <p>Runtime: <span class="gradient-text">2hrs</span></p>
                    <p>Rating: <span class="gradient-text">SPG</span></p>
                </div>

                <div class="select-options">
                    <div class="option">
                        <p>Select Location:</p>
                        <select name="location" id="location">
                            <option value="smdasma">SM City Dasmarinas</option>
                            <option value="smbacoor">SM City Bacoor</option>
                            <option value="smtanza">SM City Tanza</option>
                            <option value="smimus">SM Center Imus</option>
                            <option value="smrosario">SM City Rosario</option>
                            <option value="smgentri">SM General Trias</option>
                        </select>
                    </div>
                    <div class="option">
                        <p>Select Date:</p>
                        <select name="date" id="date">
                            <option value="june17">June 17, 2025</option>
                            <option value="june18">June 18, 2025</option>
                            <option value="june19">June 19, 2025</option>
                            <option value="june20">June 20, 2025</option>
                            <option value="june21">June 21, 2025</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="select-main">
                    <h2>Select your seat</h2>
                    <div class="select-seat">
                        <div class="legend">
                            <div class="legend-wrapper">
                                <div class="user-seat legend-seat"></div>
                                <p>Your seat</p>
                            </div>
                            <div class="legend-wrapper">
                                <div class="available-seat legend-seat"></div>
                                <p>Available seat</p>
                            </div>
                            <div class="legend-wrapper">
                                <div class="sold legend-seat"></div>
                                <p>Sold</p>
                            </div>
                        </div>
                        <h2 id="screen">Screen</h2>
                        <div class="seats-container">
                            <div class="rows">
                                <p>A</p>
                                <p>B</p>
                                <p>C</p>
                                <p>D</p>
                                <p>E</p>
                            </div>
                            <div class="left-side">
                                <div class="available-seat" id="a16">16</div>
                                <div class="available-seat" id="a15">15</div>
                                <div class="available-seat" id="a14">14</div>
                                <div class="available-seat" id="a13">13</div>
                                <div class="available-seat" id="b16">16</div>
                                <div class="available-seat" id="b15">15</div>
                                <div class="available-seat" id="b14">14</div>
                                <div class="available-seat" id="b13">13</div>
                                <div class="available-seat" id="c16">16</div>
                                <div class="available-seat" id="c15">15</div>
                                <div class="available-seat" id="c14">14</div>
                                <div class="available-seat" id="c13">13</div>
                                <div class="available-seat" id="d16">16</div>
                                <div class="available-seat" id="d15">15</div>
                                <div class="available-seat" id="d14">14</div>
                                <div class="available-seat" id="d13">13</div>
                                <div class="available-seat" id="e16">16</div>
                                <div class="available-seat" id="e15">15</div>
                                <div class="available-seat" id="e14">14</div>
                                <div class="available-seat" id="e13">13</div>
                            </div>

                            <div class="middle-section">
                                <div class="available-seat" id="a12">12</div>
                                <div class="available-seat" id="a11">11</div>
                                <div class="available-seat" id="a10">10</div>
                                <div class="available-seat" id="a9">9</div>
                                <div class="available-seat" id="a8">8</div>
                                <div class="available-seat" id="a7">7</div>
                                <div class="available-seat" id="a6">6</div>
                                <div class="available-seat" id="a5">5</div>
                                <div class="available-seat" id="b12">12</div>
                                <div class="available-seat" id="b11">11</div>
                                <div class="available-seat" id="b10">10</div>
                                <div class="available-seat" id="b9">9</div>
                                <div class="available-seat" id="b8">8</div>
                                <div class="available-seat" id="b7">7</div>
                                <div class="available-seat" id="b6">6</div>
                                <div class="available-seat" id="b5">5</div>
                                <div class="available-seat" id="c12">12</div>
                                <div class="available-seat" id="c11">11</div>
                                <div class="available-seat" id="c10">10</div>
                                <div class="available-seat" id="c9">9</div>
                                <div class="available-seat" id="c8">8</div>
                                <div class="available-seat" id="c7">7</div>
                                <div class="available-seat" id="c6">6</div>
                                <div class="available-seat" id="c5">5</div>
                                <div class="available-seat" id="d12">12</div>
                                <div class="available-seat" id="d11">11</div>
                                <div class="available-seat" id="d10">10</div>
                                <div class="available-seat" id="d9">9</div>
                                <div class="available-seat" id="d8">8</div>
                                <div class="available-seat" id="d7">7</div>
                                <div class="available-seat" id="d6">6</div>
                                <div class="available-seat" id="d5">5</div>
                                <div class="available-seat" id="e12">12</div>
                                <div class="available-seat" id="e11">11</div>
                                <div class="available-seat" id="e10">10</div>
                                <div class="available-seat" id="e9">9</div>
                                <div class="available-seat" id="e8">8</div>
                                <div class="available-seat" id="e7">7</div>
                                <div class="available-seat" id="e6">6</div>
                                <div class="available-seat" id="e5">5</div>
                            </div>

                            <div class="right-side">
                                <div class="available-seat" id="a4">4</div>
                                <div class="available-seat" id="a3">3</div>
                                <div class="available-seat" id="a2">2</div>
                                <div class="available-seat" id="a1">1</div>
                                <div class="available-seat" id="b4">4</div>
                                <div class="available-seat" id="b3">3</div>
                                <div class="available-seat" id="b2">2</div>
                                <div class="available-seat" id="b1">1</div>
                                <div class="available-seat" id="c4">4</div>
                                <div class="available-seat" id="c3">3</div>
                                <div class="available-seat" id="c2">2</div>
                                <div class="available-seat" id="c1">1</div>
                                <div class="available-seat" id="d4">4</div>
                                <div class="available-seat" id="d3">3</div>
                                <div class="available-seat" id="d2">2</div>
                                <div class="available-seat" id="d1">1</div>
                                <div class="available-seat" id="e4">4</div>
                                <div class="available-seat" id="e3">3</div>
                                <div class="available-seat" id="e2">2</div>
                                <div class="available-seat" id="e1">1</div>
                            </div>
                            <div class="rows">
                                <p>A</p>
                                <p>B</p>
                                <p>C</p>
                                <p>D</p>
                                <p>E</p>
                            </div>
                        </div>

                        <div class="save-button">
                            <button type="submit" name="reservebtn">Save it</button>
                        </div>
                    </div>

                    <div class="reserveModal">
                        <div class="modal-content">
                            <form action="reserve.php" method="POST">
                                <input type="hidden" name="title" value="<?php echo $title; ?>">
                                <input type="hidden" name="seat_id" id="seat_id">
                                <input type="hidden" name="location" id="selected_location">
                                <input type="hidden" name="date" id="selected_date">
                                <span class="close">&times;</span>
                                <p>Location: <span id="location-display"></span></p>
                                <p>Date: <span id="date-display"></span></p>
                                <p>Seat: <span id="seat-id-display"></span></p>
                                <button type="submit" name="confirmbtn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    $reserved_seats = [];
    $sql = $conn->prepare("SELECT seat_id FROM reservations WHERE title=?");
    $sql->bind_param("s", $title);
    $sql->execute();
    $result = $sql->get_result();
    while ($row = $result->fetch_assoc()) {
        $reserved_seats[] = $row['seat_id'];
    }

    $user_seats = [];
    $sql = $conn->prepare("SELECT seat_id FROM reservations WHERE title=? AND username=?");
    $sql->bind_param("ss", $title, $username);
    $sql->execute();
    $result = $sql->get_result();
    while ($row = $result->fetch_assoc()) {
        $user_seats[] = $row['seat_id'];
    }
    ?>
    <script>
        const reservedSeats = <?php echo json_encode($reserved_seats); ?>;
        const userSeats = <?php echo json_encode($user_seats); ?>;
    </script>
    <script src="../scripts/reserve.js"></script>
    <script src="../scripts/script.js"></script>
</body>

</html>