<?php include 'header.php'; ?>


<section class="gallery-first-section">

    <!-- Background Right Image with Gradient Blend -->
    <div class="banner-bg-wrapper">
        <img src="./assets/img/img-img.png" alt="Anish Dental Hospital Reception">
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
                        <li class="breadcrumb-item"><a href="home.php">HOME</a></li>
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
                <!-- <button class="filter-btn" data-filter="team">
                    <i class="bi bi-people"></i> Our Team
                </button> -->
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
                    <img src="./assets/img/g4.png" alt="Clinic Reception">
                </div>
            </div>

            <div class="col-md-3 col-sm-6 gallery-item" data-category="treatment">
                <div class="gallery-card">
                    <img src="./assets/img/g6.png" alt="Treatment Room" class="img-fluid">
                </div>
            </div>

            <div class="col-md-4 col-sm-6 gallery-item" data-category="clinic">
                <div class="gallery-card">
                    <img src="./assets/img/waiting-hall.png" alt="Waiting Area">
                </div>
            </div>

            <!-- Row 2 -->
            <div class="col-md-3 col-sm-6 gallery-item" data-category="treatment">
                <div class="gallery-card">
                    <img src="./assets/img/g10.png" alt="Dental Chair Setup" class="img-fluid">
                </div>
            </div>

            <!-- <div class="col-md-4 col-sm-6 gallery-item" data-category="team">
                <div class="gallery-card">
                    <img src="" alt="Consultation Room">
                </div>
            </div> -->

            <div class="col-md-5 col-sm-6 gallery-item" data-category="equipment">
                <div class="gallery-card">
                    <img src="./assets/img/g3.png" alt="Advanced Equipment" class="img-fluid">
                </div>
            </div>

            <!-- Row 3 -->
            <div class="col-md-3 col-sm-6 gallery-item" data-category="sterilization">
                <div class="gallery-card">
                    <img src="./assets/img/g7.png" alt="Sterilization Unit">
                </div>
            </div>

            <div class="col-md-3 col-sm-6 gallery-item" data-category="equipment">
                <div class="gallery-card">
                    <img src="./assets/img/g2.png" alt="3D Dental CT Scanner">
                </div>
            </div>

            <div class="col-md-3 col-sm-6 gallery-item" data-category="sterilization">
                <div class="gallery-card">
                    <img src="./assets/img/g8.png" alt="Lab Sterilization">
                </div>
            </div>

            <div class="col-md-3 col-sm-6 gallery-item" data-category="sterilization">
                <div class="gallery-card">
                    <img src="./assets/img/g9.png" alt="Lab Sterilization">
                </div>
            </div>

            <!-- Row 4 (Happy Smiles Category) -->
            <div class="col-lg-2-4 col-md-4 col-sm-6 gallery-item" data-category="smiles">
                <div class="gallery-card">
                    <img src="./assets/img/hc-1.png" alt="Happy Kid Patient">
                </div>
            </div>

            <div class="col-lg-2-4 col-md-4 col-sm-6 gallery-item" data-category="smiles">
                <div class="gallery-card">
                    <img src="./assets/img/hc-2.png" alt="Happy Lady Patient">
                </div>
            </div>

            <div class="col-lg-2-4 col-md-4 col-sm-6 gallery-item" data-category="smiles">
                <div class="gallery-card">
                    <img src="./assets/img/hc-3.png" alt="Happy Senior Patient">
                </div>
            </div>

            <div class="col-lg-2-4 col-md-4 col-sm-6 gallery-item" data-category="smiles">
                <div class="gallery-card">
                    <img src="./assets/img/hc-4.png" alt="Happy Young Patient">
                </div>
            </div>

            <div class="col-lg-2-4 col-md-4 col-sm-6 gallery-item" data-category="smiles">
                <div class="gallery-card">
                    <img src="./assets/img/hc-5.png" alt="Happy Patient Smile">
                </div>
            </div>

        </div>

    </div>
</section>



<!-- <section class="doctor-third-section">
    <div class="container">

      

        Bottom Banner: Call To Action
        <div class="cta-banner-light">
            <div class="row g-4 align-items-center justify-content-between">

                Left: Calendar Icon + Title
                <div class="col-lg-5">
                    <div class="d-flex align-items-center gap-3">
                        <div class="cta-icon-square">
                            <i class="bi bi-calendar-event"></i>
                              <i class="fa-regular fa-calendar-check "></i>
                        </div>
                        <div>
                            <div class="cta-subtitle-gold">Ready for a Healthier Smile?</div>
                            <h4 class="cta-main-title">Book an appointment with our experts today!</h4>
                        </div>
                    </div>
                </div>

                Middle: Dark Green Button
                <div class="col-lg-3 text-lg-center">
                    <a href="appointment.php" class="btn btn-cta-dark d-inline-flex align-items-center gap-2">
                        <i class="bi bi-calendar-check"></i> BOOK APPOINTMENT NOW
                    </a>
                </div>

                Right: Phone Box
                <div class="col-lg-4 text-lg-end">
                    <div class="phone-box-card d-inline-flex align-items-center gap-3">
                        <i class="bi bi-telephone phone-icon-dark"></i>
                        <div class="text-start">
                            <div class="phone-num-dark">+91 73962 56474</div>
                            <p class="phone-sub-text">Call Us Anytime</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section> -->

<section class="about-fourth-section">
    <div class="container">
       <!-- Bottom Call To Action Banner -->
        <div class="cta-banner">
            <div class="row g-4 align-items-center justify-content-between">
                
                <!-- Left: Icon + Text -->
                <div class="col-lg-6">
                    <div class="d-flex align-items-center gap-3">
                        <div class="cta-icon-box">
                              <i class="fa-regular fa-calendar-check treatments_fifth_section_badge_icon"></i>
                        </div>
                        <div>
                            <div class="cta-subtitle">READY FOR A HEALTHIER SMILE?</div>
                            <h3 class="cta-title">Book Your Appointment Today!</h3>
                            <p class="cta-desc">We're here to help you smile brighter every day.</p>
                        </div>
                    </div>
                </div>

                <!-- Middle: Appointment Button -->
                <div class="col-lg-3 text-lg-center">
                    <a href="appointment.php" class="btn btn-cta-appointment d-inline-flex align-items-center gap-2">
                        <i class="bi bi-calendar-plus"></i> BOOK APPOINTMENT NOW
                    </a>
                </div>

                <!-- Right: Phone Number -->
                <div class="col-lg-3 text-lg-end">
                    <div class="d-flex align-items-center justify-content-lg-end gap-3">
                        <i class="bi bi-telephone-outbound phone-icon"></i>
                        <div class="text-start">
                            <div class="phone-number">+91 73962 56474</div>
                            <div class="phone-label">Call Us Anytime</div>
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