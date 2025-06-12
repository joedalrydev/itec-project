<?php
session_start();
include("../database.php");

$username = $_SESSION['username'];
$title = $_POST['title'];
$seat_id = $_POST['seat_id'];
$location = $_POST['location'];
$show_date = $_POST['date'];

$sql = $conn->prepare("INSERT INTO reservations (username, title, seat_id, location, date) VALUES (?, ?, ?, ?, ?)");
$sql->bind_param("sssss", $username, $title, $seat_id, $location, $show_date);
$sql->execute();
    
echo "<script>alert('Reservation successful!');</script>";
header("Location: ../browse.php");

?>