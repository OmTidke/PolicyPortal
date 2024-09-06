<?php
$trigger = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $mobileNumber = $_POST['mobileNumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $passwordInput = $_POST['passwordInput'];
    $confirmPasswordInput = $_POST['confirmPasswordInput'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "IPM";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Sorry, we failed to connect: " . mysqli_connect_error());
    } else {
        // Validate passwords
        if ($confirmPasswordInput == $passwordInput) {
            try {
                // Use prepared statements to prevent SQL injection
                $sql = "INSERT INTO `customers` (`FirstName`, `LastName`, `Email`, `Address`, `Phone`, `Password`, `Date`) 
                        VALUES (?, ?, ?, ?, ?, ?, current_timestamp())";
                $stmt = mysqli_prepare($conn, $sql);
                $hashedPassword = password_hash($passwordInput, PASSWORD_DEFAULT); // Hash the password
                mysqli_stmt_bind_param($stmt, "ssssss", $FirstName, $LastName, $email, $address, $mobileNumber, $hashedPassword);
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    echo '<div class="alert alert-success" role="alert">Registered Successfully. Please login.</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Registration failed. Please try again.</div>';
                }

                mysqli_stmt_close($stmt);
            } catch (mysqli_sql_exception $e) {
                $error_message = $e->getMessage();
                if (strpos($error_message, "Phone number must be exactly 10 digits long") !== false) {
                    $trigger = true;
                } else {
                    echo "An error occurred: " . $error_message;
                }
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Passwords do not match.</div>';
        }
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register New User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/home.css"> <!-- Add your custom style -->
    <link rel="stylesheet" href="../css/login.css"> <!-- Add your custom style -->
    
    <script src="../js/showpassword.js"></script>
</head>

<body>
   <!-- Navbar -->
	<nav class="navbar navbar-expand-lg bg-body-tertiary dark-navbar">
		<div class="container-fluid">
			<a class="navbar-brand brand-name" href="../index.php">PolicyGuru</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav space-around">
					<li class="nav-item">
						<a class="nav-link" href="../index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="homepage.php">About</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="managerLogin.php">Manager Login</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="adminLogin.php">Admin Login</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<ul class="navbar-nav login-button">
				<li class="nav-item">
					<a class="nav-link active" href="./login.php">
						<button type="button" class="btn btn-primary login-btn">Login</button>
					</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- End Navbar -->

    <!-- Error Message for invalid phone number -->
    <?php if ($trigger == true): ?>
        <div class='alert alert-danger' role='alert'>
            Mobile Number should be exactly 10 digits long. Please register again.
        </div>
    <?php endif; ?>

    <!-- Registration Form Section -->
    <section class="login-section login-body">
        <div class="card">
            <div class="card-body login-card mx-5">
                <h2>Register</h2>
                <form class="registerForm" id="registerForm" action="/IPM/register.php" method="post">
                    <div class="form-outline mb-4">
                                <label class="form-label" for="FirstName">First name</label>
                                <input type="text" name="FirstName" id="FirstName" class="form-control" required />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="LastName">Last name</label>
                        <input type="text" name="LastName" id="LastName" class="form-control" required />
                    </div>
                

            
                    <div class="form-outline mb-4">
                        <label class="form-label" for="mobileNumber">Mobile Number</label>
                        <input type="text" name="mobileNumber" id="mobileNumber" class="form-control" required />
                    </div>
                
                    <div class="form-outline mb-4">
                        <label class="form-label" for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" required />
                    </div>
                    

                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="passwordInput">Password</label>
                        <input type="password" name="passwordInput" id="passwordInput" class="form-control" required />
                        <label>
                            <input type="checkbox" id="showPassword" onclick="showPasswordFun()"> Show Password
                        </label>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="confirmPasswordInput">Confirm Password</label>
                        <input type="password" name="confirmPasswordInput" id="confirmPasswordInput" class="form-control" required />
                        <label>
                            <input type="checkbox" id="showConfirmPassword" onclick="showConfirmPasswordFun()"> Show Password
                        </label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>

                    <!-- Login redirect -->
                    <div class="text-center">
                        <p>Already a user? <a href="./login.php">Login Here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
     <!-- Footer -->
   <footer class="footer bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2023 PolicyGuru. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-end">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="#" class="text-white">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="#" class="text-white">Terms of Use</a></li>
                        <li class="list-inline-item"><a href="#" class="text-white">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JS and custom JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
    <script src="javascript/showpassword.js"></script> <!-- For show/hide password functionality -->
</body>

</html>
