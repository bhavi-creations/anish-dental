<?php include 'header.php'; ?>
<section class="gallery-second-section">
    <div class="container">

        <!-- Filter Bar -->
        <div class="text-center">
            <div class="filter-nav">
                <!-- <button class="filter-btn" data-filter="team">
                    <i class="bi bi-people"></i> Our Team
                </button> -->
                <button class="filter-btn active" data-filter="smiles">
                    <i class="bi bi-emoji-smile"></i> Happy Smiles
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
<?php include 'footer.php'; ?>