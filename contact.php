<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="form.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet" />

</head>

<body>
    <!-- Navbar Starts -->
    <nav class="navbar navbar-expand-lg custom-navbar navbar-dark">
        <div class="container-fluid">
            <a id="logo" href="index.html">
                <div id="nav-left">
                    <h5>R</h5>
                    <h4>RENOL</h4>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Price</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Testimonial</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-0 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="contact.html">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Contact Section Starts -->

    <section class="contact-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">

                    <!-- AUTH BOX -->
                    <div class="auth-box">

                        <h2 class="text-center mb-2">Welcome To Renol</h2>
                        <p class="text-center text-muted mb-4">
                            Please login or create an account
                        </p>

                        <!-- Tabs -->
                        <ul class="nav nav-tabs justify-content-center mb-4" id="authTabs">
                            <li class="nav-item">
                                <button class="nav-link active" id="login-tab" data-bs-toggle="tab"
                                    data-bs-target="#login">
                                    Login
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signup">
                                    Sign Up
                                </button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content">

                            <?php if (isset($_SESSION['message'])): ?>
                                <div class="alert alert-info text-center">
                                    <?php 
                                        echo $_SESSION['message']; 
                                        unset($_SESSION['message']); 
                                    ?>
                                </div>
                            <?php endif; ?>

                            <!-- LOGIN -->
                            <div class="tab-pane fade show active" id="login">
                                <form method="post" action="login_process.php">

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter email"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Enter password" required>
                                    </div>

                                    <button class="btn btn-primary w-100">Login</button>

                                    <p class="text-center text-muted mt-4">
                                        Don’t have an account?
                                        <button type="button" class="btn btn-link p-0" onclick="showTab('signup')">
                                            Sign Up
                                        </button>
                                    </p>

                                </form>
                            </div>

                            <!-- SIGNUP -->
                            <div class="tab-pane fade" id="signup">
                                <form method="post" action="signup_process.php">


                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="fullName" placeholder="Enter name"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter email"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Phone No</label>
                                        <input type="tel" class="form-control" name="phoneNo"
                                            placeholder="Enter phone number" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Enter password" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirmPassword"
                                            placeholder="Confirm password" required>
                                    </div>

                                    <button class="btn btn-primary w-100">Sign Up</button>

                                    <p class="text-center text-muted mt-4">
                                        Already have an account?
                                        <button type="button" class="btn btn-link p-0" onclick="showTab('login')">
                                            Login
                                        </button>
                                    </p>

                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- END AUTH BOX -->

                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section Ends -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>