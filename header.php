<!DOCTYPE html>
<html lang="te">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anish Dental Hospital</title>
    <link rel="stylesheet" href="./assets/style.css">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 6 Icons (For Phone, Mail, Location, Clock, Social Icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="icon" href="./assets/img/favicon-logo.png" type="image/x-icon">
    <!-- Google Fonts for Hero Section -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Playfair+Display:wght@700;800&family=Plus+Jakarta+Sans:wght@500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Font Awesome -->
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


</head>

<body>

   <!-- 1. TOP INFORMATION BAR -->
<div class="top-bar-bg d-none d-lg-block">
    <div class="container-fluid px-lg-5">
        <div class="d-flex flex-wrap align-items-center justify-content-between top-bar-content">

            <!-- Left Details (Location, Phone, Email) -->
            <div class="d-flex flex-wrap align-items-center justify-content-center gap-3 gap-lg-4">
                <a href="https://share.google/fEYS5GnsmuhLRFoaB" target="_blank">
                    <div class="top-info-item">
                        <i class="fa-solid fa-location-dot icon-gold"></i>
                        <span>Kokila center, kakinada</span>
                    </div>
                </a>
                <div class="top-info-item">
                    <i class="fa-solid fa-phone"></i>
                    <a href="tel:+917396256474">+91 7396256474</a>
                </div>
                <div class="top-info-item">
                    <i class="fa-regular fa-envelope"></i>
                    <a href="mailto:anishdentalhospital@gmail.com">anishdentalhospital@gmail.com</a>
                </div>
            </div>

            <!-- Right Details (Timing & Social Icons) -->
            <div class="d-flex align-items-center justify-content-center gap-3 mt-1 mt-lg-0">
                <div class="top-info-item">
                    <i class="fa-regular fa-clock"></i>
                    <span>Mon - Sat: 9:00 AM - 9:00 PM</span>
                </div>
                <div class="social-icons d-flex align-items-center">
                     <a href="https://www.facebook.com/p/Anish-Dental-100071175949729/" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/anish_dental/" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://api.whatsapp.com/send?phone=917396256474" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="marquee-section">
    <marquee behavior="" direction="" class="top-info-item d-block d-lg-none">
        <div class="top-info-item">
            <i class="fa-solid fa-location-dot icon-gold"></i>
            <span>Kokila center, Kakinada</span>
        </div>
        &nbsp; &nbsp; / &nbsp; &nbsp;
        <div class="top-info-item">
            <i class="fa-solid fa-phone"></i>
            <a href="tel:+917396256474" style="color:white">+91 7396256474</a>
        </div>
        &nbsp; &nbsp; / &nbsp; &nbsp;
        <div class="top-info-item">
            <i class="fa-regular fa-envelope"></i>
            <a href="mailto:anishdentalhospital@gmail.com" style="color:white">anishdentalhospital@gmail.com</a>
        </div>
    </marquee>
</div>

<!-- 2. MAIN NAVIGATION BAR -->
<nav class="navbar navbar-expand-lg main-header-navbar sticky-top">
    <div class="container-fluid px-lg-5">

        <!-- Brand Logo & Title
        <a class="brand-logo-container" href="#">
            <div class="d-flex align-items-center logo-section">
                <img src="./assets/img/Anish Logo 1224 X 260@3x.png" alt="logo" height="48">
            </div>
        </a> -->
        <div class="anish_reusable_logo anish_reusable_logo_header">

        <img
            src="./assets/img/Anish Logo 1224 X 260@3x.png"
            alt="Anish Dental"
            class="anish_reusable_logo_source"
        >

        <canvas
            class="anish_reusable_logo_canvas">
        </canvas>

    </div>

         
        <!-- Mobile Responsive Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#anishHeaderNav" aria-controls="anishHeaderNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse justify-content-end" id="anishHeaderNav">
            <ul class="navbar-nav align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">ABOUT US</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="treatments.php">TREATMENTS</a>
                    <!-- <ul class="dropdown-menu border-0 shadow" aria-labelledby="treatmentsMenu">
                        <li><a class="dropdown-item" href="root-canal.php">Root Canal Treatment</a></li>
                        <li><a class="dropdown-item" href="dental-implants.php">Dental Implants</a></li>
                        <li><a class="dropdown-item" href="teeth-whitening.php">Teeth Whitening</a></li>
                        <li><a class="dropdown-item" href="aligners.php">Aligners</a></li>
                    </ul> -->
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="doctor.php">DOCTORS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php">GALLERY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.php">BLOGS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="happy-smile.php">HAPPY SMILE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">CONTACT US</a>
                </li>
            </ul>

            <!-- Book Appointment Button -->
            <a href="appointment.php" class="btn-appointment-custom">
                <i class="fa-regular fa-calendar-days"></i> BOOK APPOINTMENT
            </a>
        </div>

    </div>
</nav>