<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PolicyPortal</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Custom JS & CSS -->
    <script src="./js/home.js"></script>
    <script src="js/showpassword.js"></script>
    <link rel="stylesheet" href="css/home.css">

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary dark-navbar">
        <div class="container-fluid">
            <a class="navbar-brand brand-name" href="./index.php">PolicyGuru</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav space-around">
                    <li class="nav-item">
                        <a class="nav-link active" href="./index.php">Home</a>
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
                    <a class="nav-link" href="./pages/login.php">
                        <button type="button" class="btn btn-primary login-btn">Login</button>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Hero Section -->
    <div class="container-fluid home">
        Protect your family with insurance
        <div class="container hero">
            <p class="lead mb-4">We provide a secure and simple platform to manage your insurance policies online.</p>
            <a href="signup.php" class="btn btn-success btn-lg">Get Started</a>
        </div>
    </div>

    <!-- Services Section -->
    <div class="container text-center py-5">
        <h2 class="mb-4">Our Services</h2>
        <div class="row">
            <div class="col-lg-4">
                <i class="fa fa-shield fa-3x mb-3 text-primary"></i>
                <h4>Secure Policy Management</h4>
                <p>Manage your insurance policies securely with real-time updates and alerts.</p>
            </div>
            <div class="col-lg-4">
                <i class="fa fa-money fa-3x mb-3 text-success"></i>
                <h4>Affordable Plans</h4>
                <p>Choose from a variety of insurance plans that fit your needs and budget.</p>
            </div>
            <div class="col-lg-4">
                <i class="fa fa-support fa-3x mb-3 text-warning"></i>
                <h4>24/7 Support</h4>
                <p>Our customer support team is available around the clock to assist you.</p>
            </div>
        </div>
    </div>

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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Include Bootstrap JS files and jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</body>

</html>
