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

 <section class="contact-second-section">
     <div class="container">
         <div class="row g-4">


             <div class="col-lg-4">
                 <div class="info-sidebar-card">


                     <h3 class="section-card-title">We're Here To Help</h3>
                     <p class="section-subtitle">Have questions? Need assistance in booking? Reach out to us anytime.</p>


                     <div class="contact-info-item">
                         <div class="info-icon-box">

                             <img src="./assets/img/location.png" alt="" class="img-fluid" style="width: 30px;">
                         </div>
                         <div class="info-content">
                             <h6>Our Location</h6>
                             <p>Kothapet, Guntur,<br>Andhra Pradesh - 522001</p>
                         </div>
                     </div>


                     <div class="contact-info-item">
                         <div class="info-icon-box">

                             <img src="./assets/img/call.png" alt="" class="img-fluid" style="width: 30px;">
                         </div>
                         <div class="info-content">
                             <h6>Call Us</h6>
                             <p>+91 81234 56789<br>+91 86391 23456</p>
                         </div>
                     </div>


                     <div class="contact-info-item">
                         <div class="info-icon-box">

                             <img src="./assets/img/whatsapp.png" alt="" class="img-fluid" style="width: 30px;">
                         </div>
                         <div class="info-content">
                             <h6>WhatsApp Us</h6>
                             <p>+91 81234 56789</p>
                         </div>
                     </div>


                     <div class="contact-info-item">
                         <div class="info-icon-box">

                             <img src="./assets/img/email.png" alt="" class="img-fluid" style="width: 30px;">
                         </div>
                         <div class="info-content">
                             <h6>Email Us</h6>
                             <p>info@anishdental.com</p>
                         </div>
                     </div>


                     <div class="contact-info-item mb-4">
                         <div class="info-icon-box">

                             <img src="./assets/img/working-hours.png" alt="" class="img-fluid" style="width: 30px;">
                         </div>
                         <div class="info-content">
                             <h6>Working Hours</h6>
                             <p>Mon - Sat: 9:30 AM - 8:00 PM<br>Sunday: By Appointment</p>
                         </div>
                     </div>


                     <h4 class="section-card-title mt-4">Why Choose Us?</h4>
                     <div class="gold-divider">
                         <div class="line"></div>
                         <div class="diamond"></div>
                         <div class="line"></div>
                     </div>

                     <ul class="why-choose-list">
                         <li><i class="bi bi-check-circle-fill"></i> Experienced &amp; Caring Professionals</li>
                         <li><i class="bi bi-check-circle-fill"></i> Advanced Technology &amp; Equipment</li>
                         <li><i class="bi bi-check-circle-fill"></i> Personalized Treatment Plans</li>
                         <li><i class="bi bi-check-circle-fill"></i> Comfortable &amp; Hygienic Environment</li>
                     </ul>


                     <div class="emergency-card">
                         <h5>Have an emergency?</h5>
                         <h4>We're here for you!</h4>
                         <a href="tel:+918123456789" class="btn-emergency-call">
                             <i class="bi bi-telephone"></i> CALL NOW
                         </a>
                     </div>

                 </div>
             </div>


             <div class="col-lg-8">
                 <div class="appointment-form-card">


                     <h3 class="section-card-title">Appointment Details</h3>
                     <div class="gold-divider">
                         <div class="line"></div>
                         <div class="diamond"></div>
                         <div class="line"></div>
                     </div>


                     <!-- <div class="step-wizard">
                        <div class="wizard-step active">
                            <div class="step-number">1</div>
                            <div class="step-label">Patient Details</div>
                        </div>
                        <div class="wizard-step">
                            <div class="step-number">2</div>
                            <div class="step-label">Select Options</div>
                        </div>
                        <div class="wizard-step">
                            <div class="step-number">3</div>
                            <div class="step-label">Choose Date &amp; Time</div>
                        </div>
                        <div class="wizard-step">
                            <div class="step-number">4</div>
                            <div class="step-label">Confirmation</div>
                        </div>
                    </div> -->


                     <!-- <form>
                      
                        <h5 class="form-section-title"><i class="bi bi-person"></i> Patient Details</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Full Name <span class="required">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter your full name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number <span class="required">*</span></label>
                                <input type="tel" class="form-control" placeholder="Enter your phone number">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" placeholder="Enter your email address">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date of Birth</label>
                                <div class="input-icon-group">
                                    <input type="text" class="form-control" placeholder="DD / MM / YYYY">
                                    <i class="bi bi-calendar3 input-icon"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <select class="form-select">
                                    <option selected disabled>Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" placeholder="Enter your address">
                            </div>
                            <div class="col-12">
                                <label class="form-label">How did you hear about us?</label>
                                <select class="form-select">
                                    <option selected disabled>Select an option</option>
                                    <option>Google Search</option>
                                    <option>Social Media</option>
                                    <option>Friend / Family</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>

                       
                        <h5 class="form-section-title"><i class="bi bi-calendar-event"></i> Appointment Preferences</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Preferred Doctor</label>
                                <select class="form-select">
                                    <option selected disabled>Choose a doctor</option>
                                    <option>Dr. Anish (Senior Consultant)</option>
                                    <option>Dr. Swapna (Orthodontist)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Treatment / Service</label>
                                <select class="form-select">
                                    <option selected disabled>Select treatment</option>
                                    <option>General Checkup</option>
                                    <option>Root Canal Treatment</option>
                                    <option>Teeth Whitening</option>
                                    <option>Dental Implants</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Preferred Date</label>
                                <div class="input-icon-group">
                                    <input type="text" class="form-control" placeholder="Select date">
                                    <i class="bi bi-calendar3 input-icon"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Preferred Time</label>
                                <div class="input-icon-group">
                                    <input type="text" class="form-control" placeholder="Select time">
                                    <i class="bi bi-clock input-icon"></i>
                                </div>
                            </div>
                        </div>

                        
                        <h5 class="form-section-title"><i class="bi bi-journal-text"></i> Additional Information</h5>
                        <div class="mb-4">
                            <textarea class="form-control" rows="3" placeholder="Please share any specific concerns or notes (optional)"></textarea>
                        </div>

                        
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 pt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="termsCheck">
                                <label class="form-check-label terms-text" for="termsCheck">
                                    I agree to the <a href="#">Privacy Policy</a> and <a href="#">Terms of Service</a>
                                </label>
                            </div>
                            <button type="button" class="btn btn-continue d-inline-flex align-items-center gap-2">
                                CONTINUE TO REVIEW <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>

                    </form> -->

                     <form id="appointmentForm"
                         method="POST"
                         action="save_appointment.php"
                         class="row appointment-form mx-auto">

                         <div class="col-md-6 mb-4">
                             <label>Full Name</label>
                             <input type="text" name="name" class="form-control" required placeholder="Enter your name">
                         </div>

                         <div class="col-md-6 mb-4">
                             <label>Email Address</label>
                             <input type="email" name="email" class="form-control" required placeholder="example@email.com">
                         </div>

                         <div class="col-md-6 mb-4">
                             <label>Contact Number</label>
                             <input type="text" name="phone" class="form-control" required placeholder="+91 XXXXX XXXXX">
                         </div>

                         <div class="col-md-6 mb-4">
                             <label>Select Date</label>
                             <input type="date"
                                 id="appointment_date"
                                 name="appointment_date"
                                 min="<?= date('Y-m-d') ?>"
                                 class="form-control"
                                 required>
                         </div>


                         <div id="slotContainer" class="col-md-12 mb-4">
                             <label>Select Time Slot</label>
                             <select id="time_slot" name="time_slot" class="form-control" required>
                                 <option value="">-- First Select Date --</option>
                             </select>
                         </div>

                         <div class="col-md-12 mb-4">
                             <label>Message (Optional)</label>
                             <textarea name="message" class="form-control" rows="4"
                                 placeholder="Any additional information..."></textarea>
                         </div>

                         <div class="g-recaptcha mb-2" data-sitekey="6Ldws0ktAAAAAD1Y2Q8PZa6aKCMKeqiHAK86IBhr"></div>
                         <br>


                         <div style="display:none;">
                             <input type="text" name="website" autocomplete="off">
                         </div>




                         <div class="col-md-12">
                             <button type="submit" class="btn btn-primary w-100">
                                 Book Appointment
                             </button>
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