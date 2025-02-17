<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration - Gatepass Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Assets/css/styles.css"> <!-- Updated path to the CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg custom-navbar">
        <a class="navbar-brand text-light" href="#">Gatepass System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Admin</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container my-5">
        <h2 class="text-center">Student Registration</h2>
        <form id="registrationForm">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" id="fullName" required>
            </div>
            <div class="form-group">
                <label for="admissionNumber">Admission Number</label>
                <input type="text" class="form-control" id="admissionNumber" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" class="form-control" id="phoneNumber" required>
            </div>
            <div class="form-group">
                <label for="nationalID">National ID</label>
                <input type="text" class="form-control" id="nationalID" required>
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <select class="form-control" id="department" required>
                    <option value="">Select Department</option>
                    <option value="ICT">ICT Department</option>
                    <option value="Business">Business Department</option>
                    <option value="Engineering">Engineering Department</option>
                </select>
            </div>
            <div class="form-group">
                <label for="course">Course</label>
                <select class="form-control" id="course" required>
                    <option value="">Select Course</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Certificate">Certificate</option>
                    <option value="Artisan">Artisan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
    </div>

    <footer class="bg-dark text-white text-center py-4">
        <h5>Contact Us</h5>
        <p>Email: support@gatepasssystem.com</p>
        <p>Phone: +1 (555) 123-4567</p>
        <p class="mt-3">© 2025 Gate Pass System. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission
            Swal.fire({
                title: 'Registration Successful!',
                text: 'You have been registered successfully.',
                icon: 'success',
                confirmButtonText: 'Okay'
            });
        });
    </script>
</body>

</html> 