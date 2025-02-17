<?php
session_start(); // Start a session

// Include database connection
include 'includes/dbconn.php';

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Get user details from the database
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT * FROM students WHERE email = ? UNION SELECT * FROM trainers WHERE email = ? UNION SELECT * FROM visitors WHERE email = ?");
$stmt->bind_param("sss", $email, $email, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'User not found.',
                icon: 'error'
            }).then(() => {
                window.location.href='login.php';
            });
          </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gatepass Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg custom-navbar">
        <a class="navbar-brand text-light" href="#">Gatepass System</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container my-5">
        <h2 class="text-center">User Dashboard</h2>
        <form id="updateForm" action="process_update.php" method="POST">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo htmlspecialchars($user['phone_number']); ?>" required>
            </div>
            <div class="form-group">
                <label for="nationalID">National ID</label>
                <input type="text" class="form-control" id="nationalID" name="nationalID" value="<?php echo htmlspecialchars($user['national_id']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update Details</button>
        </form>
    </div>

    <footer class="bg-dark text-white text-center py-4">
        <h5>Contact Us</h5>
        <p>Email: support@gatepasssystem.com</p>
        <p>Phone: +1 (555) 123-4567</p>
        <p class="mt-3">© 2025 Gate Pass System. All rights reserved.</p>
    </footer>
</body>
</html> 