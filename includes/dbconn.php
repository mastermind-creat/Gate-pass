<?php
$ServerName = "localhost";
$Username = "root";
$Password = "";
$DatabaseName = "gatepass";

$conn = new mysqli($ServerName, $Username, $Password, $DatabaseName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
