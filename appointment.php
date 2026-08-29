 <?php
    session_start();
    $_SESSION['form_time'] = time();
    ?>

 <?php
    include './db.connection/db_connection.php';


    $selected_date = date('Y-m-d');
    $slots = [
        "9:00 AM - 10:00 AM",
        "10:00 AM - 11:00 AM",
        "11:00 AM - 12:00 PM",
        "12:00 PM - 01:00 PM",
        "01:00 PM - 02:00 PM",
        "02:00 PM - 03:00 PM",
        "03:00 PM - 04:00 PM",
        "04:00 PM - 05:00 PM",
        "05:00 PM - 06:00 PM",
        "06:00 PM - 07:00 PM",
        "07:00 PM - 08:00 PM",
        "08:00 PM - 09:00 PM"
    ];
    ?>
 <?php include  'header.php'; ?>

<!-- ==========================================================
     BOOK APPOINTMENT - FIRST SECTION
=========================================================== -->
 <section class="blog-first-section">

     <!-- Background Image Overlay with Soft Gradient -->
     <div class="blog-banner-bg">
         <img src="./assets/img/appointment-page.png" alt="Dental Health Insights Banner">
     </div>

     <!-- Main Content -->
     <div class="container content-container">
         <div class="row">
             <div class="col-lg-6">

                 <!-- Breadcrumb Nav -->
                 <nav aria-label="breadcrumb">
                     <ol class="breadcrumb text-uppercase mb-2">
                         <li class="breadcrumb-item">HOME</li>
                         <li class="breadcrumb-item active" aria-current="page">BOOK APOINTMENT</li>
                     </ol>
                 </nav>

                 <!-- Main Heading -->
                 <h1 class="blog-title">
                     Book Your<br>
                     Appointment
                 </h1>

                 <!-- Gold Divider with Diamonds -->
                 <div class="divider-container">
                     <div class="divider-line"></div>
                     <div class="divider-diamond"></div>
                     <div class="divider-line"></div>
                 </div>

                 <!-- Exact Text Description -->
                 <p class="blog-description">
                     We're here to make your dental experience comfortable and convenient.
                 </p>

             </div>
         </div>
     </div>

 </section>

<!-- ==========================================================
     CONTACT SECOND SECTION - APPOINTMENT DETAILS
=========================================================== -->

<section class="contact-second-section">

    <div class="container">

        <div class="row g-4 align-items-stretch">


            <!-- ==================================================
                 LEFT SIDEBAR
            =================================================== -->
            <div class="col-lg-4">

                <div class="contact-second-sidebar-wrap">

                    <!-- Dark Green Background Cap -->
                    <div class="contact-second-sidebar-bg"></div>

                    <div class="info-sidebar-card">


                        <!-- ==================================================
                             SIDEBAR HEADER
                        =================================================== -->
                        <div class="contact-second-help-header">

                            <div class="contact-second-help-icon">
                                <i class="fa-regular fa-tooth"></i>
                            </div>

                            <div>

                                <h3 class="section-card-title">
                                    We're Here To Help
                                </h3>

                                <p class="section-subtitle">
                                    Have questions? Need assistance in booking?<br>
                                    Reach out to us anytime.
                                </p>

                            </div>

                        </div>


                        <!-- Gold Line -->
                        <div class="contact-second-header-divider">

                            <span></span>

                            <i></i>

                            <span></span>

                        </div>


                        <!-- ==================================================
                             LOCATION
                        =================================================== -->
                        <div class="contact-info-item">

                            <div class="info-icon-box">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>

                            <div class="info-content">

                                <h6>Our Location</h6>

                                <p>
                                    1st floor, Kokila junction, RTC Complex Rd,<br>
                                    above Vantillu, beside carewell hospital,<br>
                                    G O Colony, Kakinada, Andhra Pradesh 533003
                                </p>

                            </div>

                        </div>


                        <!-- CALL -->
                        <div class="contact-info-item">

                            <div class="info-icon-box">
                                <i class="fa-solid fa-phone"></i>
                            </div>

                            <div class="info-content">

                                <h6>Call Us</h6>

                                <p>
                                    <a href="tel:+917396256474">
                                        +91 73962 56474
                                    </a>
                                </p>

                            </div>

                        </div>


                        <!-- WHATSAPP -->
                        <div class="contact-info-item">

                            <div class="info-icon-box">
                                <i class="fa-brands fa-whatsapp"></i>
                            </div>

                            <div class="info-content">

                                <h6>WhatsApp Us</h6>

                                <p>
                                    <a href="https://wa.me/917396256474">
                                        +91 73962 56474
                                    </a>
                                </p>

                            </div>

                        </div>


                        <!-- EMAIL -->
                        <div class="contact-info-item">

                            <div class="info-icon-box">
                                <i class="fa-regular fa-envelope"></i>
                            </div>

                            <div class="info-content">

                                <h6>Email Us</h6>

                                <p>
                                    <a href="mailto:anishdentalhospital@gmail.com">
                                        anishdentalhospital@gmail.com
                                    </a>
                                </p>

                            </div>

                        </div>


                        <!-- WORKING HOURS -->
                        <div class="contact-info-item contact-second-last-info">

                            <div class="info-icon-box">
                                <i class="fa-regular fa-clock"></i>
                            </div>

                            <div class="info-content">

                                <h6>Working Hours</h6>

                                <p>
                                    Mon - Sat: 9:00 AM - 9:00 PM<br>
                                    Sunday: 10:00 AM - 12:00 PM
                                </p>

                            </div>

                        </div>


                        <!-- ==================================================
                             WHY CHOOSE US
                        =================================================== -->
                        <div class="contact-second-why-header">

                            <h4 class="section-card-title">
                                Why Choose Us?
                            </h4>

                            <div class="gold-divider">

                                <div class="line"></div>

                                <div class="diamond"></div>

                                <div class="line"></div>

                            </div>

                        </div>


                        <ul class="why-choose-list">

                            <li>
                                <i class="fa-regular fa-circle-check"></i>
                                Experienced &amp; Caring Professionals
                            </li>

                            <li>
                                <i class="fa-regular fa-circle-check"></i>
                                Advanced Technology &amp; Equipment
                            </li>

                            <li>
                                <i class="fa-regular fa-circle-check"></i>
                                Personalized Treatment Plans
                            </li>

                            <li>
                                <i class="fa-regular fa-circle-check"></i>
                                Comfortable &amp; Hygienic Environment
                            </li>

                        </ul>


                        <!-- ==================================================
                             EMERGENCY CARD
                        =================================================== -->
                        <div class="emergency-card">

                            <div class="emergency-phone-circle">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>

                            <div class="emergency-content">

                                <span>Have an emergency?</span>

                                <h4>
                                    We're here for you!
                                </h4>

                                <a href="tel:+917396256474"
                                   class="btn-emergency-call">

                                    CALL NOW

                                </a>

                            </div>

                            <div class="emergency-dots"></div>

                        </div>


                    </div>

                </div>

            </div>



            <!-- ==================================================
                 RIGHT APPOINTMENT FORM
            =================================================== -->
            <div class="col-lg-8">

                <div class="appointment-form-card">


                    <!-- Decorative Tooth Top Right -->
                    <div class="appointment-form-tooth">
                        <i class="fa-solid fa-tooth"></i>
                        <span class="appointment-form-sparkle sparkle-1">✦</span>
                        <span class="appointment-form-sparkle sparkle-2">✦</span>
                    </div>


                    <!-- ==================================================
                         FORM HEADER
                    =================================================== -->
                    <div class="appointment-form-heading">

                        <div class="appointment-heading-icon">

                            <i class="fa-regular fa-calendar-check"></i>

                        </div>


                        <div>

                            <h3 class="section-card-title">
                                Appointment Details
                            </h3>


                            <div class="gold-divider">

                                <div class="line"></div>

                                <div class="diamond"></div>

                                <div class="line"></div>

                            </div>

                        </div>

                    </div>



                    <!-- ==================================================
                         FORM
                    =================================================== -->
                    <form id="appointmentForm"
                          method="POST"
                          action="save_appointment.php"
                          class="row appointment-form">


                        <!-- FULL NAME -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                Full Name
                            </label>

                            <div class="input-icon-group">

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    required
                                    placeholder="Enter your name"
                                >

                                <i class="fa-regular fa-user input-icon"></i>

                            </div>

                        </div>


                        <!-- EMAIL -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                Email Address
                            </label>

                            <div class="input-icon-group">

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    required
                                    placeholder="example@email.com"
                                >

                                <i class="fa-regular fa-envelope input-icon"></i>

                            </div>

                        </div>


                        <!-- CONTACT NUMBER -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                Contact Number
                            </label>

                            <div class="input-icon-group">

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    required
                                    placeholder="+91 10000 00000"
                                >

                                <i class="fa-solid fa-phone input-icon"></i>

                            </div>

                        </div>


                        <!-- DATE -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                Select Date
                            </label>

                            <div class="input-icon-group date-input-group">

                                <input
                                    type="date"
                                    id="appointment_date"
                                    name="appointment_date"
                                    min="<?= date('Y-m-d') ?>"
                                    class="form-control"
                                    required
                                >

                            </div>

                        </div>


                        <!-- TIME SLOT -->
                        <div id="slotContainer"
                             class="col-12 mb-4">

                            <label class="form-label">
                                Select Time Slot
                            </label>

                            <div class="input-icon-group select-input-group">

                                <select
                                    id="time_slot"
                                    name="time_slot"
                                    class="form-select"
                                    required
                                >

                                    <option value="">
                                        -- First Select Date --
                                    </option>

                                </select>

                            </div>

                        </div>


                        <!-- MESSAGE -->
                        <div class="col-12 mb-4">

                            <label class="form-label">
                                Message (Optional)
                            </label>

                            <div class="input-icon-group textarea-icon-group">

                                <textarea
                                    name="message"
                                    class="form-control"
                                    rows="5"
                                    placeholder="Any additional information..."
                                ></textarea>

                                <i class="fa-solid fa-pen input-icon"></i>

                            </div>

                        </div>



                        <!-- ==================================================
                             CAPTCHA
                        =================================================== -->
                        <div class="col-12 appointment-captcha-wrap">

                            <div class="g-recaptcha mb-3"
                                 data-sitekey="6Ldws0ktAAAAAD1Y2Q8PZa6aKCMKeqiHAK86IBhr">
                            </div>

                        </div>


                        <!-- Honeypot -->
                        <div style="display:none;">
                            <input
                                type="text"
                                name="website"
                                autocomplete="off"
                            >
                        </div>



                        <!-- ==================================================
                             SUBMIT BUTTON
                        =================================================== -->
                        <div class="col-12">

                            <button
                                type="submit"
                                class="btn btn-continue w-100"
                            >

                                <i class="fa-regular fa-calendar-check"></i>

                                <span>
                                    Book Appointment
                                </span>

                            </button>

                        </div>


                        <!-- ==================================================
                             SECURITY LINE
                        =================================================== -->
                        <div class="col-12">

                            <div class="appointment-security">

                                <span class="security-line"></span>

                                <i class="fa-solid fa-shield-halved"></i>

                                <span>
                                    Your information is secure and will never be shared.
                                </span>

                                <span class="security-line"></span>

                            </div>

                        </div>


                    </form>

                </div>

            </div>


        </div>

    </div>

</section>






 <section class="mb-4">
     <div class="container">


         <!-- Bottom CTA Appointment Box -->
         <div class="index_fifth_section_cta_box">
             <div class="row align-items-center g-3">

                 <!-- Left: Title & Subtitle -->
                 <div class="col-xl-6 col-lg-5 col-12">
                     <div class="d-flex align-items-center gap-3">
                         <div class="index_fifth_section_cta_icon_box d-none d-sm-flex">
                             <i class="fa-regular fa-calendar-days"></i>
                         </div>
                         <div>
                             <span class="index_fifth_section_cta_tag">READY FOR A HEALTHIER SMILE?</span>
                             <h3 class="index_fifth_section_cta_title">Book Your Appointment Today!</h3>
                             <p class="index_fifth_section_cta_desc">We're here to help you smile brighter every day.</p>
                         </div>
                     </div>
                 </div>

                 <!-- Middle: Book Button -->
                 <div class="col-xl-3 col-lg-3 col-sm-6 col-12 text-lg-center">
                     <a href="appointment.php" class="index_fifth_section_cta_btn">
                         <i class="fa-regular fa-calendar-check"></i> BOOK APPOINTMENT NOW
                     </a>
                 </div>

                 <!-- Right: Call Phone Section -->
                 <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                     <div class="index_fifth_section_cta_phone_container">
                         <div class="index_fifth_section_cta_phone_icon">
                             <i class="fa-solid fa-phone-volume"></i>
                         </div>
                         <div>
                             <a href="tel:+918123456789" class="index_fifth_section_cta_phone_num">+91 81234 56789</a>
                             <div class="index_fifth_section_cta_phone_sub">Call Us Anytime</div>
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>
 </section>





 <script>
     document.getElementById('appointment_date').addEventListener('change', function() {
         const date = this.value;
         const slotSelect = document.getElementById('time_slot');
         slotSelect.innerHTML = '<option>Loading...</option>';

         fetch('get_slots.php?date=' + date)
             .then(r => r.json())
             .then(data => {

                 if (data.isHoliday && data.type == 'fullday') {
                     alert("Holiday: " + data.reason);
                     slotSelect.innerHTML = '<option>No Slots Available</option>';
                     return;
                 }

                 if (data.isHoliday) {
                     alert("Note: " + data.reason);
                 }

                 let html = '<option value="">--Select Slot--</option>';

                 data.slots.forEach(s => {
                     let dis = s.available <= 0 ? 'disabled' : '';
                     let text = s.available <= 0 ?
                         `${s.time} (FULL)` :
                         `${s.time} (${s.available} Slots Available)`;

                     html += `<option ${dis} value="${s.time}">${text}</option>`;
                 });

                 slotSelect.innerHTML = html;
             })
             .catch(() => {
                 slotSelect.innerHTML = '<option>Error loading slots</option>';
             });
     });
 </script>



 <?php include 'footer.php'; ?>