<?php
session_start();

// Redirect logged-in users to the dashboard
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	header("location: customerHome.php");
	exit;
}

$login = false;
$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST['email'];
	$passwordInput = $_POST['passwordInput'];

	// Connect to the database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "IPM";

	$conn = mysqli_connect($servername, $username, $password, $database);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	} else {
		// Use prepared statements to prevent SQL injection
		$sql = "SELECT * FROM `customers` WHERE Email = ?";
		$stmt = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt, "s", $email);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if ($result && mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_assoc($result);

			// Verify the password
			if (password_verify($passwordInput, $row['Password'])) {
				$login = true;
				// Start session and set session variables
				$_SESSION['loggedin'] = true;
				$_SESSION['email'] = $email;
				header("location: customerHome.php");
				exit;
			} else {
				$error = "Invalid password.";
			}
		} else {
			$error = "Invalid email or account does not exist.";
		}

		mysqli_stmt_close($stmt);
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
	<title>Login</title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/login.css">
	
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
					<a class="nav-link active" href="#">
						<button type="button" class="btn btn-primary login-btn">Login</button>
					</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- End Navbar -->

	<!-- Alerts -->
	<?php if ($login): ?>
		<div class="alert alert-success" role="alert">
			You are logged in.
		</div>
	<?php elseif ($error): ?>
		<div class="alert alert-danger" role="alert">
			<?= $error; ?>
		</div>
	<?php endif; ?>
<!-- Login Form -->
<section class="login-section login-body">
		<div class="card">
			<div class="card-body login-card">
				<h2>Login</h2>
				<form class="loginForm" id="loginForm" action="/IPM/login.php" method="post">
					<!-- Email input -->
					<div class="form-outline mb-4">
						<label class="form-label" for="email">Email</label>
						<input type="email" id="email" name="email" class="form-control" required />
					</div>

					<!-- Password input -->
					<div class="form-outline mb-4">
						<label class="form-label" for="password">Password</label>
						<input type="password" id="passwordInput" name="passwordInput" class="form-control" required />
						<label>
                            <input type="checkbox" id="showPassword" onclick="showPasswordFun()"> Show Password
                        </label>
					</div>

					<!-- Checkbox -->
					<div class="form-check d-flex justify-content-center mb-4">
						<label class="form-check-label" for="form2Example33">
							<input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
							Remember Me
						</label>
					</div>

					<!-- Submit button -->
					<button type="submit" class="btn btn-primary btn-block mb-4 login-button">Login</button>

					<!-- Register buttons -->
					<div class="text-center">
						<p>Not a user? <a class="" href="./register.php">Register</a></p>
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

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
</body>

</html>
