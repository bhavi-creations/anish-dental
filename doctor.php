<?php include 'header.php'; ?>

<style>
    /* Custom Styles for Doctor Second Section */
    .doctor-second-section {
        background-color: #f8faf9;
        padding: 60px 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Header Styling */
    .doctor-second-section .section-subtitle {
        color: #c89547;
        /* Gold accent */
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .doctor-second-section .section-title {
        color: #0c3832;
        /* Deep Teal */
        font-weight: 700;
        font-size: 2.2rem;
        margin-top: 5px;
        margin-bottom: 35px;
    }

    .doctor-second-section .title-line {
        display: inline-block;
        width: 30px;
        height: 1.5px;
        background-color: #c89547;
        vertical-align: middle;
        margin: 0 8px;
    }

    /* Card Styling */
    .doctor-second-section .doctor-card {
        background: #ffffff;
        border: 1px solid #e2e8e5;
        border-radius: 20px;
        padding: 24px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        height: 100%;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .doctor-second-section .doctor-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .doctor-second-section .doctor-img-box {
        background-color: #f0f3f2;
        border-radius: 14px;
        overflow: hidden;
        height: 100%;
        min-height: 240px;
    }

    .doctor-second-section .doctor-img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Info Text Styling */
    .doctor-second-section .doctor-name {
        color: #0c3832;
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 2px;
    }

    .doctor-second-section .doctor-degree {
        color: #c89547;
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 2px;
    }

    .doctor-second-section .doctor-title {
        color: #555555;
        font-size: 0.85rem;
        margin-bottom: 12px;
    }

    .doctor-second-section .gold-hr {
        width: 40px;
        height: 2px;
        background-color: #c89547;
        border: none;
        margin-bottom: 15px;
    }

    /* Feature List (Top Specs) */
    .doctor-second-section .spec-list {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
    }

    .doctor-second-section .spec-list li {
        font-size: 0.85rem;
        color: #444444;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .doctor-second-section .spec-list li i {
        color: #0c3832;
        font-size: 0.95rem;
    }

    /* Areas of Expertise Box */
    .doctor-second-section .expertise-box {
        background-color: #f5f8f7;
        border-radius: 12px;
        padding: 20px;
        margin-top: 20px;
    }

    .doctor-second-section .expertise-title {
        color: #0c3832;
        font-weight: 700;
        font-size: 0.95rem;
        margin-bottom: 12px;
    }

    .doctor-second-section .expertise-list {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
    }

    .doctor-second-section .expertise-list li {
        font-size: 0.82rem;
        color: #444444;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .doctor-second-section .expertise-list li i {
        color: #0c3832;
        font-size: 0.9rem;
    }

    /* Solid Teal View Profile Button */
    .doctor-second-section .btn-view-profile-solid {
        background-color: #0c3832;
        color: #ffffff;
        border: none;
        padding: 10px 22px;
        font-weight: 600;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        border-radius: 6px;
        transition: all 0.3s ease;
        text-transform: uppercase;
    }

    .doctor-second-section .btn-view-profile-solid:hover {
        background-color: #062b26;
        color: #ffffff;
    }


    /* Custom Styles for Doctor Third Section */
    .doctor-third-section {
        background-color: #ffffff;
        padding: 40px 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* 1. Top Commitment Banner */
    .doctor-third-section .commitment-banner {
        background-color: #062b26;
        /* Deep Dark Green/Teal */
        border-radius: 20px;
        padding: 30px 40px;
        color: #ffffff;
        margin-bottom: 25px;
    }

    .doctor-third-section .tooth-icon-box {
        font-size: 3rem;
        color: #c89547;
        /* Gold Icon */
        line-height: 1;
    }

    .doctor-third-section .commitment-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 0;
        line-height: 1.2;
    }

    .doctor-third-section .commitment-desc {
        color: #e0ece8;
        font-size: 0.88rem;
        line-height: 1.5;
        margin-bottom: 0;
    }

    /* Vertical Separator */
    .doctor-third-section .border-start-banner {
        border-left: 1px solid rgba(255, 255, 255, 0.2);
    }

    /* Virtue Icons */
    .doctor-third-section .virtue-item {
        text-align: center;
    }

    .doctor-third-section .virtue-icon-ring {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 1.5px solid #c89547;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #c89547;
        font-size: 1.4rem;
        margin: 0 auto 8px auto;
    }

    .doctor-third-section .virtue-label {
        font-size: 0.8rem;
        font-weight: 600;
        color: #ffffff;
        margin-bottom: 0;
    }

    /* 2. Bottom CTA Banner */
    .doctor-third-section .cta-banner-light {
        background-color: #f7faf9;
        /* Soft Light Background */
        border-radius: 20px;
        padding: 25px 35px;
        border: 1px solid #e2ebe8;
    }

    .doctor-third-section .cta-icon-square {
        width: 60px;
        height: 60px;
        background-color: #062b26;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #c89547;
        font-size: 1.75rem;
        flex-shrink: 0;
    }

    .doctor-third-section .cta-subtitle-gold {
        color: #c89547;
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 2px;
    }

    .doctor-third-section .cta-main-title {
        color: #062b26;
        font-weight: 700;
        font-size: 1.4rem;
        margin-bottom: 0;
    }

    /* Dark Green Appointment Button */
    .doctor-third-section .btn-cta-dark {
        background-color: #062b26;
        color: #ffffff;
        border: none;
        padding: 12px 26px;
        font-weight: 700;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        border-radius: 8px;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .doctor-third-section .btn-cta-dark:hover {
        background-color: #031815;
        color: #ffffff;
    }

    /* Phone Card Box */
    .doctor-third-section .phone-box-card {
        background-color: #ffffff;
        border: 1px solid #c8d6d2;
        border-radius: 12px;
        padding: 10px 20px;
    }

    .doctor-third-section .phone-icon-dark {
        font-size: 1.8rem;
        color: #062b26;
    }

    .doctor-third-section .phone-num-dark {
        font-size: 1.25rem;
        font-weight: 700;
        color: #062b26;
        line-height: 1.1;
    }

    .doctor-third-section .phone-sub-text {
        font-size: 0.75rem;
        color: #666666;
        margin-bottom: 0;
    }

    /* Responsive Handling */
    @media (max-width: 991px) {
        .doctor-third-section .border-start-banner {
            border-left: none;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 20px;
            margin-top: 20px;
        }
    }
</style>



<!-- TREATMENTS HERO BANNER SECTION -->
<section class="treatments_first_section_wrapper">
    <div class="container-fluid p-0">
        <div class="row g-0 align-items-center treatments_first_section_main_row">
            
            <!-- Left Side Content Area -->
            <div class="col-lg-5 col-12 treatments_first_section_left_col">
                
                <!-- Breadcrumb -->
                <div class="treatments_first_section_breadcrumb">
                    <a href="index.php" class="treatments_first_section_breadcrumb_link">HOME</a>
                    <i class="fa-solid fa-chevron-right treatments_first_section_breadcrumb_sep"></i>
                    <span class="treatments_first_section_breadcrumb_active">TREATMENTS</span>
                </div>

                <!-- Main Heading -->
                <h1 class="treatments_first_section_title">
                    Our Dental<br>Treatments
                </h1>

                <!-- Cursive Gold Subtitle -->
                <div class="treatments_first_section_cursive">
                    Complete Care For Every Smile
                </div>

                <!-- Description -->
                <p class="treatments_first_section_desc">
                    We offer a wide range of advanced dental treatments using the latest technology and techniques to ensure healthy, beautiful and confident smiles.
                </p>

                <!-- Book Appointment Button -->
                <a href="appointment.php" class="treatments_first_section_btn">
                    <i class="fa-regular fa-calendar-check"></i> BOOK APPOINTMENT
                </a>

            </div>

            <!-- Right Side Image Area with Curved Boundary -->
            <div class="col-lg-7 col-12 treatments_first_section_right_col">
                
                <!-- Medical Room Image -->
                <img src="https://images.unsplash.com/photo-1629909613654-28e377c37b09?q=80&w=1400&auto=format&fit=crop" alt="Dental Treatment Room" class="treatments_first_section_bg_img">

                <!-- Smooth Wave Curve with Gold Stroke (Desktop View Overlay) -->
                <svg class="treatments_first_section_curve_svg" viewBox="0 0 130 520" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- White Fill Background -->
                    <path d="M0 0 H35 C90 120, 120 180, 50 320 C10 410, 80 480, 110 520 H0 V0 Z" fill="#ffffff" />
                    <!-- Outer Gold Line -->
                    <path d="M35 0 C90 120, 120 180, 50 320 C10 410, 80 480, 110 520" stroke="#e29b27" stroke-width="4.5" fill="none" />
                    <!-- Inner Dark Green Line Accent -->
                    <path d="M38 0 C93 120, 123 180, 53 320 C13 410, 83 480, 113 520" stroke="#003B32" stroke-width="2" fill="none" opacity="0.8" />
                </svg>

                <!-- Bottom Right Floating Badge -->
                <div class="treatments_first_section_badge">
                    <div class="treatments_first_section_badge_icon">
                        <i class="fa-solid fa-tooth"></i>
                    </div>
                    <div class="treatments_first_section_badge_text">
                        Advanced Care.<br>
                        Comfortable Experience.<br>
                        Beautiful Smiles.
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<section class="doctor-second-section">
    <div class="container">

        <!-- Header -->
        <div class="text-center mb-4">
            <div>
                <span class="title-line"></span>
                <span class="section-subtitle">MEET OUR TEAM</span>
                <span class="title-line"></span>
            </div>
            <h2 class="section-title">Dedicated Professionals. Exceptional Care.</h2>
        </div>

        <!-- Doctors Cards Grid -->
        <div class="row g-4">

            <!-- Doctor 1 (Male Doctor) -->
            <div class="col-lg-6">
                <div class="doctor-card d-flex flex-column justify-content-between">
                    <div>
                        <!-- Top Doctor Info Row -->
                        <div class="row g-4 align-items-center">
                            <div class="col-sm-5">
                                <div class="doctor-img-box">
                                    <img src="male-doctor.jpg" alt="Dr. Your Name" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <h3 class="doctor-name">Dr. Your Name</h3>
                                <div class="doctor-degree">BDS, MDS (Specialization)</div>
                                <div class="doctor-title">Dental Specialist</div>

                                <div class="gold-hr"></div>

                                <ul class="spec-list">
                                    <li><i class="bi bi-check-circle"></i> <span>8+ Years Experience</span></li>
                                    <li><i class="bi bi-check-circle"></i> <span>Specialist in Braces & Aligners</span></li>
                                    <li><i class="bi bi-check-circle"></i> <span>Cosmetic & Aesthetic Dentistry</span></li>
                                    <li><i class="bi bi-check-circle"></i> <span>Patient-Centered Approach</span></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Bottom Areas of Expertise Box -->
                        <div class="expertise-box">
                            <h5 class="expertise-title">Areas of Expertise</h5>
                            <div class="row g-2">
                                <div class="col-6">
                                    <ul class="expertise-list">
                                        <li><i class="bi bi-check-circle"></i> <span>Orthodontic Treatment</span></li>
                                        <li><i class="bi bi-check-circle"></i> <span>Clear Aligners</span></li>
                                        <li><i class="bi bi-check-circle"></i> <span>Smile Makeover</span></li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="expertise-list">
                                        <li><i class="bi bi-check-circle"></i> <span>Digital Orthodontics</span></li>
                                        <li><i class="bi bi-check-circle"></i> <span>Preventive Dentistry</span></li>
                                        <li><i class="bi bi-check-circle"></i> <span>Pediatric Orthodontics</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-view-profile-solid d-inline-flex align-items-center gap-2">
                            VIEW PROFILE <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Doctor 2 (Female Doctor) -->
            <div class="col-lg-6">
                <div class="doctor-card d-flex flex-column justify-content-between">
                    <div>
                        <!-- Top Doctor Info Row -->
                        <div class="row g-4 align-items-center">
                            <div class="col-sm-5">
                                <div class="doctor-img-box">
                                    <img src="female-doctor.jpg" alt="Dr. Your Name" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <h3 class="doctor-name">Dr. Your Name</h3>
                                <div class="doctor-degree">BDS, MDS (Specialization)</div>
                                <div class="doctor-title">Dental Specialist</div>

                                <div class="gold-hr"></div>

                                <ul class="spec-list">
                                    <li><i class="bi bi-check-circle"></i> <span>9+ Years Experience</span></li>
                                    <li><i class="bi bi-check-circle"></i> <span>Root Canal & Laser Dentistry</span></li>
                                    <li><i class="bi bi-check-circle"></i> <span>Painless & Advanced Treatments</span></li>
                                    <li><i class="bi bi-check-circle"></i> <span>Committed to Healthy Smiles</span></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Bottom Areas of Expertise Box -->
                        <div class="expertise-box">
                            <h5 class="expertise-title">Areas of Expertise</h5>
                            <div class="row g-2">
                                <div class="col-6">
                                    <ul class="expertise-list">
                                        <li><i class="bi bi-check-circle"></i> <span>Root Canal Treatment</span></li>
                                        <li><i class="bi bi-check-circle"></i> <span>Laser Dentistry</span></li>
                                        <li><i class="bi bi-check-circle"></i> <span>Restorative Dentistry</span></li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="expertise-list">
                                        <li><i class="bi bi-check-circle"></i> <span>Cosmetic Dentistry</span></li>
                                        <li><i class="bi bi-check-circle"></i> <span>Teeth Whitening</span></li>
                                        <li><i class="bi bi-check-circle"></i> <span>Gum Care</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-view-profile-solid d-inline-flex align-items-center gap-2">
                            VIEW PROFILE <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>



<section class="doctor-third-section">
    <div class="container">

        <!-- Top Banner: Our Commitment to You -->
        <div class="commitment-banner">
            <div class="row g-4 align-items-center">

                <!-- Left: Tooth Icon & Title -->
                <div class="col-lg-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="tooth-icon-box">
                            <i class="bi bi-heart-pulse"></i> <!-- Tooth with Heart icon equivalent -->
                        </div>
                        <h3 class="commitment-title">
                            Our Commitment<br>to You
                        </h3>
                    </div>
                </div>

                <!-- Middle: Description -->
                <div class="col-lg-4">
                    <p class="commitment-desc">
                        We believe in building lasting relationships with our patients by providing honest advice, transparent treatment and outstanding care in a comfortable environment.
                    </p>
                </div>

                <!-- Right: 4 Virtues (Trust, Care, Excellence, Results) -->
                <div class="col-lg-4 ps-lg-4 border-start-banner">
                    <div class="row g-2 justify-content-between">

                        <!-- Virtue 1 -->
                        <div class="col-3 virtue-item">
                            <div class="virtue-icon-ring">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <p class="virtue-label">Trust</p>
                        </div>

                        <!-- Virtue 2 -->
                        <div class="col-3 virtue-item">
                            <div class="virtue-icon-ring">
                                <i class="bi bi-heart"></i>
                            </div>
                            <p class="virtue-label">Care</p>
                        </div>

                        <!-- Virtue 3 -->
                        <div class="col-3 virtue-item">
                            <div class="virtue-icon-ring">
                                <i class="bi bi-award"></i>
                            </div>
                            <p class="virtue-label">Excellence</p>
                        </div>

                        <!-- Virtue 4 -->
                        <div class="col-3 virtue-item">
                            <div class="virtue-icon-ring">
                                <i class="bi bi-check-lg"></i>
                            </div>
                            <p class="virtue-label">Results</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

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


<?php include 'footer.php'; ?>