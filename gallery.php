<?php include 'header.php'; ?>
<style>
    /* Custom Styles for Gallery First Section */
    .gallery-first-section {
        position: relative;
        background-color: #052a25;
        /* Deep Dark Green / Teal */
        overflow: hidden;
        padding: 60px 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Background Image Overlay with Gradient Blend */
    .gallery-first-section .banner-bg-wrapper {
        position: absolute;
        top: 0;
        right: 0;
        width: 60%;
        height: 100%;
        z-index: 1;
    }

    .gallery-first-section .banner-bg-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .gallery-first-section .banner-bg-wrapper::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, #052a25 15%, rgba(5, 42, 37, 0.75) 50%, rgba(5, 42, 37, 0.1) 100%);
        z-index: 2;
    }

    /* Watermark Tooth Icon Background */
    .gallery-first-section .watermark-tooth {
        position: absolute;
        left: 38%;
        top: 50%;
        transform: translateY(-50%);
        font-size: 13rem;
        color: rgba(255, 255, 255, 0.05);
        z-index: 2;
        pointer-events: none;
        line-height: 1;
    }

    /* Content Container Styling */
    .gallery-first-section .content-container {
        position: relative;
        z-index: 3;
    }

    /* Breadcrumb Styling */
    .gallery-first-section .breadcrumb-item,
    .gallery-first-section .breadcrumb-item a {
        color: #ffffff;
        opacity: 0.8;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .gallery-first-section .breadcrumb-item.active {
        color: #c89547;
        /* Gold accent */
        opacity: 1;
    }

    /* Headings & Text */
    .gallery-first-section .main-title {
        color: #ffffff;
        font-size: 3.2rem;
        font-weight: 700;
        margin-top: 10px;
        margin-bottom: 15px;
        line-height: 1.1;
    }

    /* Custom Divider Line with Diamond */
    .gallery-first-section .divider-container {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .gallery-first-section .divider-line {
        height: 1.5px;
        width: 45px;
        background-color: #c89547;
    }

    .gallery-first-section .divider-diamond {
        width: 6px;
        height: 6px;
        background-color: #c89547;
        transform: rotate(45deg);
        margin: 0 4px;
    }

    .gallery-first-section .sub-description {
        color: #e0ece8;
        font-size: 1.1rem;
        font-weight: 400;
        line-height: 1.5;
        max-width: 480px;
        margin-bottom: 0;
    }

    /* Responsive Styles for Mobile & Tablets */
    @media (max-width: 991px) {
        .gallery-first-section {
            padding: 50px 0;
        }

        .gallery-first-section .banner-bg-wrapper {
            width: 100%;
            opacity: 0.3;
        }

        .gallery-first-section .banner-bg-wrapper::before {
            background: #052a25;
            opacity: 0.75;
        }

        .gallery-first-section .main-title {
            font-size: 2.4rem;
        }

        .gallery-first-section .sub-description {
            font-size: 0.95rem;
        }

        .gallery-first-section .watermark-tooth {
            display: none;
        }
    }


    /* Custom Styles for Gallery Second Section */
    .gallery-second-section {
        background-color: #f8faf9;
        padding: 60px 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Filter Navigation Bar */
    .gallery-second-section .filter-nav {
        background-color: #ffffff;
        border-radius: 12px;
        padding: 8px 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        display: inline-flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 8px;
        margin-bottom: 40px;
        border: 1px solid #e5ebe8;
    }

    .gallery-second-section .filter-btn {
        background-color: transparent;
        border: none;
        padding: 10px 20px;
        font-size: 0.88rem;
        font-weight: 600;
        color: #444444;
        border-radius: 8px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }

    .gallery-second-section .filter-btn i {
        font-size: 1rem;
        color: #666666;
        transition: all 0.3s ease;
    }

    /* Active Filter Button */
    .gallery-second-section .filter-btn.active {
        background-color: #062b26;
        /* Deep Dark Green */
        color: #ffffff;
    }

    .gallery-second-section .filter-btn.active i {
        color: #ffffff;
    }

    .gallery-second-section .filter-btn:hover:not(.active) {
        background-color: #f0f4f3;
        color: #062b26;
    }

    /* Gallery Item Box */
    .gallery-second-section .gallery-item {
        transition: transform 0.4s ease, opacity 0.4s ease;
    }

    .gallery-second-section .gallery-card {
        border-radius: 16px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        background-color: #eef2f1;
        height: 240px;
    }

    .gallery-second-section .gallery-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .gallery-second-section .gallery-card:hover img {
        transform: scale(1.05);
    }

    /* Hide Filtered Items Smoothly */
    .gallery-second-section .gallery-item.hide {
        display: none !important;
    }

    /* Responsive Grid Adjustments */
    @media (max-width: 767px) {
        .gallery-second-section .filter-nav {
            width: 100%;
        }

        .gallery-second-section .filter-btn {
            padding: 8px 12px;
            font-size: 0.8rem;
            width: 100%;
            justify-content: center;
        }

        .gallery-second-section .gallery-card {
            height: 200px;
        }
    }
</style>

<section class="gallery-first-section">

    <!-- Background Right Image with Gradient Blend -->
    <div class="banner-bg-wrapper">
        <img src="reception-bg.jpg" alt="Anish Dental Hospital Reception">
    </div>

    <!-- Tooth Watermark Icon in Center Background -->
    <div class="watermark-tooth">
        <i class="bi bi-heart-pulse"></i> <!-- Replace with Tooth SVG/Icon -->
    </div>

    <!-- Main Content -->
    <div class="container content-container">
        <div class="row">
            <div class="col-lg-6">

                <!-- Breadcrumb Nav -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase mb-2">
                        <li class="breadcrumb-item"><a href="#">HOME</a></li>
                        <li class="breadcrumb-item active" aria-current="page">GALLERY</li>
                    </ol>
                </nav>

                <!-- Main Section Title -->
                <h1 class="main-title">Our Gallery</h1>

                <!-- Decorative Divider Line -->
                <div class="divider-container">
                    <div class="divider-line"></div>
                    <div class="divider-diamond"></div>
                    <div class="divider-line"></div>
                </div>

                <!-- Exact Text Description -->
                <p class="sub-description">
                    A glimpse of our clinic, advanced technology, and the smiles we create every day.
                </p>

            </div>
        </div>
    </div>

</section>



<section class="gallery-second-section">
    <div class="container">

        <!-- Filter Bar -->
        <div class="text-center">
            <div class="filter-nav">
                <button class="filter-btn active" data-filter="all">
                    <i class="bi bi-grid-fill"></i> All
                </button>
                <button class="filter-btn" data-filter="clinic">
                    <i class="bi bi-building"></i> Clinic
                </button>
                <button class="filter-btn" data-filter="treatment">
                    <i class="bi bi-door-open"></i> Treatment Rooms
                </button>
                <button class="filter-btn" data-filter="equipment">
                    <i class="bi bi-display"></i> Equipment
                </button>
                <button class="filter-btn" data-filter="sterilization">
                    <i class="bi bi-shield-check"></i> Sterilization
                </button>
                <button class="filter-btn" data-filter="team">
                    <i class="bi bi-people"></i> Our Team
                </button>
                <button class="filter-btn" data-filter="smiles">
                    <i class="bi bi-emoji-smile"></i> Happy Smiles
                </button>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="row g-3" id="gallery-grid">

            <!-- Row 1 -->
            <div class="col-md-5 col-sm-6 gallery-item" data-category="clinic">
                <div class="gallery-card">
                    <img src="reception-1.jpg" alt="Clinic Reception">
                </div>
            </div>

            <div class="col-md-3 col-sm-6 gallery-item" data-category="treatment">
                <div class="gallery-card">
                    <img src="treatment-room-1.jpg" alt="Treatment Room">
                </div>
            </div>

            <div class="col-md-4 col-sm-6 gallery-item" data-category="clinic">
                <div class="gallery-card">
                    <img src="waiting-lounge.jpg" alt="Waiting Area">
                </div>
            </div>

            <!-- Row 2 -->
            <div class="col-md-3 col-sm-6 gallery-item" data-category="treatment">
                <div class="gallery-card">
                    <img src="dental-chair-1.jpg" alt="Dental Chair Setup">
                </div>
            </div>

            <div class="col-md-4 col-sm-6 gallery-item" data-category="team">
                <div class="gallery-card">
                    <img src="consultation-room.jpg" alt="Consultation Room">
                </div>
            </div>

            <div class="col-md-5 col-sm-6 gallery-item" data-category="equipment">
                <div class="gallery-card">
                    <img src="dental-tools.jpg" alt="Advanced Equipment">
                </div>
            </div>

            <!-- Row 3 -->
            <div class="col-md-4 col-sm-6 gallery-item" data-category="sterilization">
                <div class="gallery-card">
                    <img src="autoclave-machine.jpg" alt="Sterilization Unit">
                </div>
            </div>

            <div class="col-md-4 col-sm-6 gallery-item" data-category="equipment">
                <div class="gallery-card">
                    <img src="ct-scan-machine.jpg" alt="3D Dental CT Scanner">
                </div>
            </div>

            <div class="col-md-4 col-sm-6 gallery-item" data-category="sterilization">
                <div class="gallery-card">
                    <img src="lab-sterilization.jpg" alt="Lab Sterilization">
                </div>
            </div>

            <!-- Row 4 (Happy Smiles Category) -->
            <div class="col-lg-2-4 col-md-4 col-sm-6 gallery-item" data-category="smiles">
                <div class="gallery-card">
                    <img src="smile-kid.jpg" alt="Happy Kid Patient">
                </div>
            </div>

            <div class="col-lg-2-4 col-md-4 col-sm-6 gallery-item" data-category="smiles">
                <div class="gallery-card">
                    <img src="smile-lady-1.jpg" alt="Happy Lady Patient">
                </div>
            </div>

            <div class="col-lg-2-4 col-md-4 col-sm-6 gallery-item" data-category="smiles">
                <div class="gallery-card">
                    <img src="smile-senior.jpg" alt="Happy Senior Patient">
                </div>
            </div>

            <div class="col-lg-2-4 col-md-4 col-sm-6 gallery-item" data-category="smiles">
                <div class="gallery-card">
                    <img src="smile-girl.jpg" alt="Happy Young Patient">
                </div>
            </div>

            <div class="col-lg-2-4 col-md-4 col-sm-6 gallery-item" data-category="smiles">
                <div class="gallery-card">
                    <img src="smile-lady-2.jpg" alt="Happy Patient Smile">
                </div>
            </div>

        </div>

    </div>
</section>



<section class="doctor-third-section">
    <div class="container">

      

        <!-- Bottom Banner: Call To Action -->
        <div class="cta-banner-light">
            <div class="row g-4 align-items-center justify-content-between">

                <!-- Left: Calendar Icon + Title -->
                <div class="col-lg-5">
                    <div class="d-flex align-items-center gap-3">
                        <div class="cta-icon-square">
                            <i class="bi bi-calendar-event"></i>
                        </div>
                        <div>
                            <div class="cta-subtitle-gold">Ready for a Healthier Smile?</div>
                            <h4 class="cta-main-title">Book an appointment with our experts today!</h4>
                        </div>
                    </div>
                </div>

                <!-- Middle: Dark Green Button -->
                <div class="col-lg-3 text-lg-center">
                    <a href="#" class="btn btn-cta-dark d-inline-flex align-items-center gap-2">
                        <i class="bi bi-calendar-check"></i> BOOK APPOINTMENT NOW
                    </a>
                </div>

                <!-- Right: Phone Box -->
                <div class="col-lg-4 text-lg-end">
                    <div class="phone-box-card d-inline-flex align-items-center gap-3">
                        <i class="bi bi-telephone phone-icon-dark"></i>
                        <div class="text-start">
                            <div class="phone-num-dark">+91 81234 56789</div>
                            <p class="phone-sub-text">Call Us Anytime</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>



<script>
document.addEventListener("DOMContentLoaded", function () {
    const filterButtons = document.querySelectorAll(".gallery-second-section .filter-btn");
    const galleryItems = document.querySelectorAll(".gallery-second-section .gallery-item");

    filterButtons.forEach(button => {
        button.addEventListener("click", function () {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove("active"));
            
            // Add active class to clicked button
            this.classList.add("active");

            const filterValue = this.getAttribute("data-filter");

            // Filter items
            galleryItems.forEach(item => {
                if (filterValue === "all" || item.getAttribute("data-category") === filterValue) {
                    item.classList.remove("hide");
                } else {
                    item.classList.add("hide");
                }
            });
        });
    });
});
</script>

<?php include 'footer.php'; ?>