<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gatepass Management System</title>
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
                <li class="nav-item active">
                    <a class="nav-link text-light" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="login.php">Login</a>
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

    <header class="hero bg-primary text-white text-center py-5">
        <h1>Welcome to the Gate Pass Management System</h1>
        <p>Efficiently manage entries and exits with QR code technology.</p>
        <a href="registration.php" class="btn btn-light btn-lg">Get Started</a>
    </header>

    <div class="container my-5">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card mb-4 equal-card">
                    <div class="card-body">
                        <i class="fas fa-user-graduate fa-3x mb-3"></i>
                        <h5 class="card-title">For Students & Teachers</h5>
                        <p class="card-text">Register once and use your QR code for daily access.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 equal-card">
                    <div class="card-body">
                        <i class="fas fa-user-plus fa-3x mb-3"></i>
                        <h5 class="card-title">For Visitors</h5>
                        <p class="card-text">Register daily and get a temporary QR code for access.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 equal-card">
                    <div class="card-body">
                        <i class="fas fa-chart-line fa-3x mb-3"></i>
                        <h5 class="card-title">Admin Dashboard</h5>
                        <p class="card-text">Manage users, view logs, and generate reports.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-4">
        <h5>Contact Us</h5>
        <p>Email: support@gatepasssystem.com</p>
        <p>Phone: +1 (555) 123-4567</p>
        <div>
            <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <p class="mt-3">© 2025 Gate Pass System. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.getElementById('getStartedBtn').addEventListener('click', function() {
            Swal.fire({
                title: 'Welcome!',
                text: 'Let\'s get started with your gatepass management.',
                icon: 'success',
                confirmButtonText: 'Okay'
            });
        });
    </script>
</body>

</html>