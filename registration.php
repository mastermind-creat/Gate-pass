<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - Gatepass Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Assets/css/styles.css"> <!-- Updated path to the CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        .password-strength {
            display: none;
            font-size: 0.9em;
            height: 5px;
            transition: width 0.5s;
            margin-top: 5px;
        }
        .weak {
            background-color: red;
            width: 0%;
        }
        .medium {
            background-color: yellow;
            width: 0%;
        }
        .strong {
            background-color: green;
            width: 0%;
        }
        .btn-small {
            width: 100px;
            margin: 0 auto;
        }
        .btn-center {
            display: flex;
            justify-content: center;
        }
        /* Loading spinner styles */
        .loading {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }
    </style>
</head>

<body>
    <?php include 'includes/dbconn.php'; ?>

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
        <h2 class="text-center">Registration</h2>
        <form id="registrationForm" action="process_registration.php" method="POST" onsubmit="showLoading()">
            <div class="form-group">
                <label for="userType">User Type</label>
                <select class="form-control" id="userType" name="userType" required>
                    <option value="">Select User Type</option>
                    <option value="student">Student</option>
                    <option value="trainer">Trainer</option>
                    <option value="visitor">Visitor</option>
                </select>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fullName">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="admissionNumber">Admission Number</label>
                    <input type="text" class="form-control" id="admissionNumber" name="admissionNumber">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="nationalID">National ID</label>
                    <input type="text" class="form-control" id="nationalID" name="nationalID" required>
                </div>
            </div>
            <div class="form-group" id="departmentGroup" style="display: none;">
                <label for="department">Department</label>
                <select class="form-control" id="department" name="department" required>
                    <option value="">Select Department</option>
                    <option value="ICT">ICT Department</option>
                    <option value="Business">Business Department</option>
                    <option value="Engineering">Engineering Department</option>
                </select>
            </div>
            <div class="form-group" id="courseGroup">
                <label for="course">Course</label>
                <select class="form-control" id="course" name="course">
                    <option value="">Select Course</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Certificate">Certificate</option>
                    <option value="Artisan">Artisan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="togglePassword()">
                            <i id="eyeIcon" class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
                <div class="password-strength" id="passwordStrength"></div>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="toggleConfirmPassword()">
                            <i id="confirmEyeIcon" class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="btn-center">
                <button type="submit" class="btn btn-primary btn-small">Register</button>
            </div>
        </form>
    </div>

    <div class="loading">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
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
        // Show loading spinner
        function showLoading() {
            document.querySelector('.loading').style.display = 'block';
        }

        // Show/Hide fields based on user type
        document.getElementById('userType').addEventListener('change', function() {
            const userType = this.value;
            const admissionNumberGroup = document.getElementById('admissionNumber').parentElement;
            const departmentGroup = document.getElementById('departmentGroup');
            const courseGroup = document.getElementById('courseGroup');

            if (userType === 'student') {
                admissionNumberGroup.style.display = 'block';
                departmentGroup.style.display = 'block';
                courseGroup.style.display = 'block';
            } else if (userType === 'trainer') {
                admissionNumberGroup.style.display = 'none';
                departmentGroup.style.display = 'block';
                courseGroup.style.display = 'none';
            } else if (userType === 'visitor') {
                admissionNumberGroup.style.display = 'none';
                departmentGroup.style.display = 'none';
                courseGroup.style.display = 'none';
            }
        });

        // Toggle password visibility
        function togglePassword() {
            const passwordField = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }

        // Toggle confirm password visibility
        function toggleConfirmPassword() {
            const confirmPasswordField = document.getElementById("confirmPassword");
            const confirmEyeIcon = document.getElementById("confirmEyeIcon");
            if (confirmPasswordField.type === "password") {
                confirmPasswordField.type = "text";
                confirmEyeIcon.classList.remove("fa-eye");
                confirmEyeIcon.classList.add("fa-eye-slash");
            } else {
                confirmPasswordField.type = "password";
                confirmEyeIcon.classList.remove("fa-eye-slash");
                confirmEyeIcon.classList.add("fa-eye");
            }
        }

        // Password strength validation
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthText = document.getElementById("passwordStrength");
            strengthText.style.display = 'block';

            let strength = "Weak";
            let width = "0%";
            if (password.length >= 8 && /[A-Z]/.test(password) && /[0-9]/.test(password)) {
                strength = "Strong";
                width = "100%";
                strengthText.className = "password-strength strong";
            } else if (password.length >= 6) {
                strength = "Medium";
                width = "50%";
                strengthText.className = "password-strength medium";
            } else {
                strengthText.className = "password-strength weak";
            }
            strengthText.innerText = `Password Strength: ${strength}`;
            strengthText.style.width = width;
        });
    </script>
</body>

</html> 