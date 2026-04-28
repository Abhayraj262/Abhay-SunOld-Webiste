<?php
ob_start();
session_start();

$servername = "localhost";
$username = "sungovind";
$password = "o=~wV+C4Zjl]"; // Enter your MySQL password
$dbname = "notification_sunconsultants";//"notification_sunconsultants";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>