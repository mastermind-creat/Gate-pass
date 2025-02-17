<?php
session_start(); // Start a session

// Include database connection
include 'includes/dbconn.php';

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $fullName = $_POST['fullName'];
    $phoneNumber = $_POST['phoneNumber'];
    $nationalID = $_POST['nationalID'];

    // Prepare SQL statement to update user details
    $stmt = $conn->prepare("UPDATE students SET full_name = ?, phone_number = ?, national_id = ? WHERE email = ? 
                             UNION 
                             SELECT * FROM trainers WHERE email = ? 
                             UNION 
                             SELECT * FROM visitors WHERE email = ?");
    $stmt->bind_param("sssss", $fullName, $phoneNumber, $nationalID, $email, $email, $email);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Details updated successfully.',
                    icon: 'success'
                }).then(() => {
                    window.location.href='dashboard.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Error updating details.',
                    icon: 'error'
                }).then(() => {
                    window.location.href='dashboard.php';
                });
              </script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?> 