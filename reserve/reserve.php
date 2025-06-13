<?php
session_start();
include("../database.php");

$username = $_SESSION['username'];
$title = $_POST['title'];
$seat_id = $_POST['seat_id'];
$location = $_POST['location'];
$date = $_POST['date'];

//nilalagay yung reservation details sa database
$sql = $conn->prepare("INSERT INTO reservations (username, title, seat_id, location, date) VALUES (?, ?, ?, ?, ?)");
$sql->bind_param("sssss", $username, $title, $seat_id, $location, $date);
$sql->execute();
    
echo "<script>alert('Reservation successful!');</script>";
header("Location: ../browse.php");

?>