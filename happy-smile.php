<?php include 'header.php'; ?>
<section class="gallery-second-section">
    <div class="container">

        <!-- Filter Bar -->
        <div class="text-center">
            <div class="filter-nav">
                <button class="filter-btn active" data-filter="all">
                    <i class="bi bi-grid-fill"></i> All
                </button>
                
                <button class="filter-btn" data-filter="smiles">
                    <i class="bi bi-emoji-smile"></i> Happy Smiles
                </button>
                <button class="filter-btn" data-filter="team">
                    <i class="bi bi-people"></i> Video Testimonials
                </button>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="row g-3" id="gallery-grid">

            

            <!-- Row 4 (Happy Smiles Category) -->
            <div class="col-lg-2-4 col-md-4 col-sm-6 gallery-item" data-category="smiles">
                <div class="gallery-card">
                    <img src="./assets/img/gallery-img-1.png" alt="Happy Kid Patient">
                </div>
            </div>

            <div class="col-lg-2-4 col-md-4 col-sm-6 gallery-item" data-category="smiles">
                <div class="gallery-card">
                    <img src="./assets/img/gallery-img-2.png" alt="Happy Lady Patient">
                </div>
            </div>

            <div class="col-lg-2-4 col-md-4 col-sm-6 gallery-item" data-category="smiles">
                <div class="gallery-card">
                    <img src="./assets/img/gallery-img-3.png" alt="Happy Senior Patient">
                </div>
            </div>

            <div class="col-lg-2-4 col-md-4 col-sm-6 gallery-item" data-category="smiles">
                <div class="gallery-card">
                    <img src="./assets/img/gallery-img-4.png" alt="Happy Young Patient">
                </div>
            </div>

            <div class="col-lg-2-4 col-md-4 col-sm-6 gallery-item" data-category="smiles">
                <div class="gallery-card">
                    <img src="./assets/img/gallery-img-5.png" alt="Happy Patient Smile">
                </div>
            </div>

        </div>

    </div>
</section>


<!-- 2. PATIENT TESTIMONIALS SECTION -->
<section class="testimonial-section">
    <div class="container">

        <!-- Section Heading -->
        <div class="testimonial-heading text-center mb-4">
            <h3 class="testimonial-title">
                Patient Stories –
                <span class="testimonial-title-accent">In Their Own Words</span>
            </h3>

            <p class="testimonial-subtitle">
                Hear directly from our patients about their experience at Anish Dental.
            </p>
        </div>

        <!-- Testimonials Videos -->
        <div class="row justify-content-center testimonial-row">

            <!-- Testimonial Video 1 -->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 testimonial-col">
                <div class="testimonial-card">

                    <div class="testimonial-video-wrapper">
                        <video
                            class="testimonial-video"
                            autoplay
                            muted
                            loop
                            controls
                            playsinline>
                            <source src="./assets/img/testimonial-1.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>

                </div>
            </div>

            <!-- Testimonial Video 2 -->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 testimonial-col">
                <div class="testimonial-card">

                    <div class="testimonial-video-wrapper">
                        <video
                            class="testimonial-video"
                            autoplay
                            muted
                            loop
                            controls
                            playsinline>
                            <source src="./assets/img/testimonial-2.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>

                </div>
            </div>

            <!-- Testimonial Video 3 -->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 testimonial-col">
                <div class="testimonial-card">

                    <div class="testimonial-video-wrapper">
                        <video
                            class="testimonial-video"
                            autoplay
                            muted
                            loop
                            controls
                            playsinline>
                            <source src="./assets/img/testimonial-3.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
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