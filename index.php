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
    <nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
        <a class="navbar-brand" href="#">Gatepass System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Trainers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Employees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Visitors</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container text-center">
        <h1>Welcome to the Gatepass Management System</h1>
        <p>Seamlessly manage your gatepass needs.</p>
        <button class="btn btn-primary" id="getStartedBtn">Get Started</button>
    </div>

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
