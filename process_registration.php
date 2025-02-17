<?php
session_start(); // Start a session

// Include database connection
include 'includes/dbconn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $userType = $_POST['userType'];
    $fullName = $_POST['fullName'];
    $admissionNumber = $userType === 'student' ? $_POST['admissionNumber'] : null;
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $nationalID = $_POST['nationalID'];
    $department = $userType === 'student' ? $_POST['department'] : null;
    $course = $userType === 'student' ? $_POST['course'] : null;
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Validate input (you can add more validation as needed)
    if (empty($fullName) || empty($email) || empty($phoneNumber) || empty($nationalID)) {
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'All fields are required.',
                    icon: 'error'
                }).then(() => {
                    window.location.href='registration.php';
                });
              </script>";
        exit;
    }

    // Check for existing email or admission number
    if ($userType === 'student' && !empty($admissionNumber) && !empty($email)) {
        // Ensure department is provided for students
        if (empty($department)) {
            echo "<script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Department is required for students.',
                        icon: 'error'
                    }).then(() => {
                        window.location.href='registration.php';
                    });
                  </script>";
            exit;
        }
        $stmt = $conn->prepare("SELECT * FROM students WHERE email = ? OR admission_number = ?");
        $stmt->bind_param("ss", $email, $admissionNumber);
    } elseif ($userType === 'trainer') {
        // Ensure department is provided for trainers
        if (empty($department)) {
            echo "<script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Department is required for trainers.',
                        icon: 'error'
                    }).then(() => {
                        window.location.href='registration.php';
                    });
                  </script>";
            exit;
        }
        $stmt = $conn->prepare("SELECT * FROM trainers WHERE email = ?");
        $stmt->bind_param("s", $email);
    } else {
        $stmt = $conn->prepare("SELECT * FROM visitors WHERE email = ?");
        $stmt->bind_param("s", $email);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Email or Admission Number already exists.',
                    icon: 'error'
                }).then(() => {
                    window.location.href='registration.php';
                });
              </script>";
        exit;
    }

    // Check if the password and confirm password match
    if ($_POST['password'] !== $_POST['confirmPassword']) {
        echo "<script>Swal.fire('Error', 'Passwords do not match.', 'error');</script>";
        exit;
    }

    // Prepare SQL statement to prevent SQL injection
    if ($userType === 'student') {
        $stmt = $conn->prepare("INSERT INTO students (full_name, admission_number, email, phone_number, national_id, department, course, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $fullName, $admissionNumber, $email, $phoneNumber, $nationalID, $department, $course, $password);
    } elseif ($userType === 'trainer') {
        $stmt = $conn->prepare("INSERT INTO trainers (full_name, email, phone_number, national_id, department, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $fullName, $email, $phoneNumber, $nationalID, $department, $password);
    } else {
        $stmt = $conn->prepare("INSERT INTO visitors (full_name, email, phone_number, national_id, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fullName, $email, $phoneNumber, $nationalID, $password);
    }

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Registration successful!',
                    icon: 'success'
                }).then(() => {
                    window.location.href='login.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Error: " . $stmt->error . "',
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