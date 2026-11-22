```php
<?php
$page_title = "About Us | Explore Maradankadawala";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo htmlspecialchars($page_title); ?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f8f5;
            color: #333;
        }

        .about-hero {
            background: linear-gradient(rgba(0, 70, 30, 0.75),
                        rgba(0, 70, 30, 0.75)),
                        url('assets/images/maradankadawala1.jpg');

            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 20px;
            text-align: center;
        }

        .about-hero h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .about-hero p {
            font-size: 17px;
            max-width: 750px;
            margin: auto;
            line-height: 1.8;
        }

        .about-section {
            padding: 60px 0;
        }

        .about-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            height: 100%;
            transition: 0.3s;
        }

        .about-card:hover {
            transform: translateY(-5px);
        }

        .about-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .section-title {
            color: #198754;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .feature-list {
            list-style: none;
            padding-left: 0;
        }

        .feature-list li {
            padding: 10px 0;
            border-bottom: 1px solid #eeeeee;
        }

        .feature-list li::before {
            content: "✔ ";
            color: #198754;
            font-weight: bold;
        }

        .highlight-box {
            background: #e7f5ec;
            border-left: 5px solid #198754;
            padding: 25px;
            border-radius: 8px;
        }

        .about-footer {
            background: #198754;
            color: white;
            text-align: center;
            padding: 20px;
        }

        @media (max-width: 768px) {
            .about-hero {
                padding: 70px 15px;
            }

            .about-hero h1 {
                font-size: 30px;
            }

            .about-hero p {
                font-size: 15px;
            }
        }
    </style>
</head>

<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php">
            🌿 Explore Maradankadawala
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu"
                aria-controls="menu"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="places.php">Places</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="planner.php">Planner</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="about.php">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="admin/login.php">🔐 Admin</a>
                </li>

                <li class="nav-item">
                    <button type="button"
                            onclick="darkMode()"
                            class="btn btn-light ms-2">
                        🌙
                    </button>
                </li>

            </ul>

        </div>
    </div>
</nav>

<!-- Space for Fixed Navbar -->
<div style="height: 70px;"></div>

<!-- Hero Section -->
<section class="about-hero">

    <div class="container">

        <h1>About Explore Maradankadawala</h1>

        <p>
            Discover interesting places around Maradankadawala and plan
            your own one-day visit with useful location information,
            travel tips, and a simple trip-planning system.
        </p>

    </div>

</section>

<!-- About Section -->
<section class="about-section">

    <div class="container">

        <div class="row g-4 align-items-stretch">

            <div class="col-lg-6">

                <div class="about-card">

                    <div class="about-icon">🌍</div>

                    <h2 class="section-title">About Our Website</h2>

                    <p>
                        Explore Maradankadawala is a web-based local tourist
                        visit planning application designed to help users
                        discover places within approximately 25 kilometres
                        of Maradankadawala.
                    </p>

                    <p>
                        The website provides information about local
                        attractions, including historical, cultural,
                        religious, and natural places. Users can explore
                        available places and prepare a simple one-day
                        travel plan.
                    </p>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="about-card">

                    <div class="about-icon">🎯</div>

                    <h2 class="section-title">Our Main Objective</h2>

                    <p>
                        The main objective of this project is to make it
                        easier for visitors to find local attractions and
                        organize their visits using a single website.
                    </p>

                    <ul class="feature-list">

                        <li>Discover nearby tourist attractions.</li>

                        <li>Search for places by name.</li>

                        <li>Filter places by category.</li>

                        <li>View useful information about each place.</li>

                        <li>Create a one-day visit plan.</li>

                        <li>Access location and direction information.</li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Website Features -->
<section class="about-section pt-0">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">What Can You Do Here?</h2>

            <p class="text-muted">
                Explore local attractions and organize your visit easily.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="about-card text-center">

                    <div class="about-icon">📍</div>

                    <h4>Explore Places</h4>

                    <p>
                        Browse information about nearby tourist attractions,
                        including their descriptions and locations.
                    </p>

                    <a href="places.php" class="btn btn-success">
                        View Places
                    </a>

                </div>

            </div>

            <div class="col-md-4">

                <div class="about-card text-center">

                    <div class="about-icon">🗺️</div>

                    <h4>Plan Your Visit</h4>

                    <p>
                        Select places you want to visit and organize them
                        into a convenient one-day travel plan.
                    </p>

                    <a href="planner.php" class="btn btn-success">
                        Open Planner
                    </a>

                </div>

            </div>

            <div class="col-md-4">

                <div class="about-card text-center">

                    <div class="about-icon">🌿</div>

                    <h4>Discover Local Beauty</h4>

                    <p>
                        Explore the historical, cultural, religious,
                        and natural attractions around Maradankadawala.
                    </p>

                    <a href="index.php" class="btn btn-success">
                        Explore Now
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Project Information -->
<section class="about-section pt-0">

    <div class="container">

        <div class="highlight-box">

            <h3 class="section-title">About This Project</h3>

            <p class="mb-2">
                Explore Maradankadawala is a web application developed
                as an academic programming project.
            </p>

            <p class="mb-0">
                The system demonstrates the use of web technologies to
                present local tourist information and support one-day
                visit planning.
            </p>

        </div>

    </div>

</section>

<!-- Footer -->
<footer class="about-footer">

    <div class="container">

        <p class="mb-1">
            🌿 Explore Maradankadawala
        </p>

        <p class="mb-0">
            Discover Local Places. Plan Your Visit.
        </p>

        <small>
            &copy; <?php echo date("Y"); ?>
            Explore Maradankadawala. All rights reserved.
        </small>

    </div>

</footer>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JavaScript -->
<script src="js/script.js"></script>

</body>
</html>
```
