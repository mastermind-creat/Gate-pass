<?php
session_start(); // Start a session

// Include database connection
include 'includes/dbconn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT password FROM students WHERE email = ? UNION SELECT password FROM trainers WHERE email = ? UNION SELECT password FROM visitors WHERE email = ?");
    $stmt->bind_param("sss", $email, $email, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables
            $_SESSION['email'] = $email;
            echo "<script>
                    Swal.fire({
                        title: 'Success!',
                        text: 'Login successful!',
                        icon: 'success'
                    }).then(() => {
                        window.location.href='dashboard.php';
                    });
                  </script>";
        } else {
            // Password is incorrect
            echo "<script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Invalid password. Please try again.',
                        icon: 'error'
                    }).then(() => {
                        window.location.href='login.php';
                    });
                  </script>";
        }
    } else {
        // User not found
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'No user found with that email. Please register.',
                    icon: 'error'
                }).then(() => {
                    window.location.href='registration.php';
                });
              </script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?> 