<?php
// 1. Database Connection & Dynamic Blog Query
include './db.connection/db_connection.php';

$sql = "SELECT id, slug, title, main_content, main_image, service, created_at FROM blogs ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

// Popular Posts Query (Top 4 recent posts)
$pop_sql = "SELECT id, slug, title, main_image, created_at FROM blogs ORDER BY created_at DESC LIMIT 4";
$pop_stmt = $conn->prepare($pop_sql);
$pop_stmt->execute();
$pop_result = $pop_stmt->get_result();
?>

<?php include 'header.php'; ?>

<section class="blog-first-section">
    <!-- Background Image Overlay with Soft Gradient -->
    <div class="blog-banner-bg">
        <img src="./assets/img/blogs-img.png" alt="Dental Health Insights Banner">
    </div>

    <!-- Main Content -->
    <div class="container content-container">
        <div class="row">
            <div class="col-lg-6">
                <!-- Subtitle -->
                <span class="blog-subtitle">OUR BLOG</span>

                <!-- Main Heading -->
                <h1 class="blog-title">
                    Dental Health<br>
                    Insights &amp; Tips
                </h1>

                <!-- Gold Divider with Diamonds -->
                <div class="divider-container">
                    <div class="divider-line"></div>
                    <div class="divider-diamond"></div>
                    <div class="divider-line"></div>
                </div>

                <!-- Text Description -->
                <p class="blog-description">
                    Expert advice, helpful tips and the latest updates to keep your smile healthy and bright.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="blog-second-section">
    <div class="container">
        <div class="row g-4">

            <!-- Left Side: Main Blog Content (8 Cols) -->
            <div class="col-lg-8">

                <!-- Filter Tabs -->
                <div class="blog-filter-nav">
                    <button class="blog-filter-btn active" data-filter="all">All Posts</button>
                    <button class="blog-filter-btn" data-filter="oral-health">Oral Health</button>
                    <button class="blog-filter-btn" data-filter="treatments">Treatments</button>
                    <button class="blog-filter-btn" data-filter="dental-tips">Dental Care Tips</button>
                    <button class="blog-filter-btn" data-filter="kids">Kids Dental Care</button>
                    <button class="blog-filter-btn" data-filter="updates">Clinic Updates</button>
                </div>

                <!-- Blog Grid -->
                <div class="row g-4" id="blog-posts-container">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            // Image path calculation
                            $image_path = !empty($row['main_image'])
                                ? "admin/uploads/photos/" . htmlspecialchars($row['main_image'])
                                : "default_image.png";

                            // SEO URL (slug fallback to ID)
                            $blog_link_val = !empty($row['slug']) ? urlencode($row['slug']) : $row['id'];
                            $final_url = "fullblog.php?id=" . $blog_link_val;

                            // Date format
                            $formatted_date = date("M d, Y", strtotime($row['created_at']));

                            // Safe preview string creation
                            $preview = substr(strip_tags(html_entity_decode($row['main_content'])), 0, 100);

                            // Category slug formatting for data attribute filtering
                            $category_raw = !empty($row['service']) ? strtolower(trim($row['service'])) : 'oral-health';
                            $category_attr = str_replace(' ', '-', $category_raw);
                            $category_display = htmlspecialchars($row['service'] ?? 'Oral Health');

                            echo "
                            <div class='col-md-6 blog-item' data-category='{$category_attr}'>
                                <div class='blog-card'>
                                    <div>
                                        <div class='blog-img-box'>
                                            <a href='{$final_url}'>
                                                <img src='{$image_path}' alt='" . htmlspecialchars($row['title']) . "'>
                                            </a>
                                            <span class='blog-date-badge'>{$formatted_date}</span>
                                        </div>
                                        <div class='blog-body'>
                                            <h3 class='blog-card-title'>
                                                <a href='{$final_url}' class='text-decoration-none color-inherit'>" . htmlspecialchars($row['title']) . "</a>
                                            </h3>
                                            <p class='blog-card-text'>{$preview}...</p>
                                            <div class='blog-meta'>
                                                <span><i class='bi bi-shield-check'></i> {$category_display}</span>
                                                <span><i class='bi bi-clock'></i> 5 min read</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='px-3 pb-3'>
                                        <a href='{$final_url}' class='blog-read-more'>Read More <i class='bi bi-arrow-right'></i></a>
                                    </div>
                                </div>
                            </div>";
                        }
                    } else {
                        echo "<div class='col-12'><p class='text-muted'>No blog posts found.</p></div>";
                    }
                    ?>
                </div>

                <!-- Pagination Component -->
                <div class="custom-pagination" id="pagination-wrapper">
                    <!-- JS Generates Buttons Automatically -->
                </div>

            </div>

            <!-- Right Side: Sidebar Widgets (4 Cols) -->
            <div class="col-lg-4">

                <!-- Search Widget -->
                <div class="sidebar-widget">
                    <h4 class="widget-title">Search Blog</h4>
                    <div class="search-box">
                        <input type="text" id="blog-search-input" placeholder="Search articles...">
                        <i class="bi bi-search"></i>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="sidebar-widget">
                    <h4 class="widget-title">Categories</h4>
                    <ul class="category-list">
                        <li data-cat="oral-health"><span><i class="bi bi-prescription2 me-2"></i>Oral Health</span></li>
                        <li data-cat="treatments"><span><i class="bi bi-shield-plus me-2"></i>Treatments</span></li>
                        <li data-cat="dental-tips"><span><i class="bi bi-lightbulb me-2"></i>Dental Care Tips</span></li>
                        <li data-cat="kids"><span><i class="bi bi-emoji-smile me-2"></i>Kids Dental Care</span></li>
                        <li data-cat="updates"><span><i class="bi bi-newspaper me-2"></i>Clinic Updates</span></li>
                    </ul>
                </div>

                <!-- Popular Posts Widget (Dynamic DB Query) -->
                <div class="sidebar-widget">
                    <h4 class="widget-title">Popular Posts</h4>

                    <?php
                    if ($pop_result->num_rows > 0) {
                        while ($pop_row = $pop_result->fetch_assoc()) {
                            $pop_img = !empty($pop_row['main_image']) ? "admin/uploads/photos/" . htmlspecialchars($pop_row['main_image']) : "default_image.png";
                            $pop_link = "fullblog.php?id=" . (!empty($pop_row['slug']) ? urlencode($pop_row['slug']) : $pop_row['id']);
                            $pop_date = date("M d, Y", strtotime($pop_row['created_at']));

                            echo "
                            <div class='popular-post-item'>
                                <img src='{$pop_img}' class='popular-post-img' alt='" . htmlspecialchars($pop_row['title']) . "'>
                                <div>
                                    <a href='{$pop_link}' class='popular-post-title'>" . htmlspecialchars($pop_row['title']) . "</a>
                                    <div class='popular-post-date'><i class='bi bi-calendar3'></i> {$pop_date}</div>
                                </div>
                            </div>";
                        }
                    }
                    ?>
                </div>

                <!-- Newsletter Widget -->
                <div class="sidebar-widget">
                    <h4 class="widget-title">Subscribe to Our Newsletter</h4>
                    <p class="text-muted small mb-3">Get the latest dental tips, updates and offers straight to your inbox.</p>
                    <div class="newsletter-input-group mb-2">
                        <input type="email" placeholder="Enter your email">
                        <button><i class="bi bi-send-fill"></i></button>
                    </div>
                    <div class="text-muted" style="font-size: 0.72rem;">
                        <i class="bi bi-lock-fill"></i> We respect your privacy. Unsubscribe anytime.
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- Bottom Call To Action Banner -->
<section class="about-fourth-section">
    <div class="container">
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
                    <a href="#" class="btn btn-cta-appointment d-inline-flex align-items-center gap-2">
                        <i class="bi bi-calendar-plus"></i> BOOK APPOINTMENT NOW
                    </a>
                </div>

                <!-- Right: Phone Number -->
                <div class="col-lg-3 text-lg-end">
                    <div class="d-flex align-items-center justify-content-lg-end gap-3">
                        <i class="bi bi-telephone-outbound phone-icon"></i>
                        <div class="text-start">
                            <div class="phone-number">+91 81234 56789</div>
                            <div class="phone-label">Call Us Anytime</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const itemsPerPage = 6;
        let currentPage = 1;
        let activeFilter = "all";
        let searchQuery = "";

        const allBlogItems = Array.from(document.querySelectorAll(".blog-item"));
        const filterButtons = document.querySelectorAll(".blog-filter-btn");
        const categoryListItems = document.querySelectorAll(".category-list li");
        const searchInput = document.getElementById("blog-search-input");
        const paginationWrapper = document.getElementById("pagination-wrapper");

        function updateBlogDisplay() {
            // 1. Filter items based on Category & Search
            const filteredItems = allBlogItems.filter(item => {
                const matchesCategory = (activeFilter === "all") || (item.getAttribute("data-category") === activeFilter);
                const titleText = item.querySelector(".blog-card-title").innerText.toLowerCase();
                const matchesSearch = titleText.includes(searchQuery.toLowerCase());
                return matchesCategory && matchesSearch;
            });

            // 2. Hide all items initially
            allBlogItems.forEach(item => item.style.display = "none");

            // 3. Calculate Pagination
            const totalPages = Math.ceil(filteredItems.length / itemsPerPage) || 1;
            if (currentPage > totalPages) currentPage = 1;

            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;

            // 4. Show only current page items
            const itemsToDisplay = filteredItems.slice(startIndex, endIndex);
            itemsToDisplay.forEach(item => item.style.display = "block");

            // 5. Build Pagination Buttons
            renderPagination(totalPages);
        }

        function renderPagination(totalPages) {
            paginationWrapper.innerHTML = "";
            if (totalPages <= 1) return;

            for (let i = 1; i <= totalPages; i++) {
                const pageBtn = document.createElement("div");
                pageBtn.className = `page-num ${i === currentPage ? "active" : ""}`;
                pageBtn.innerText = i;
                pageBtn.addEventListener("click", function() {
                    currentPage = i;
                    updateBlogDisplay();
                    window.scrollTo({
                        top: document.querySelector('.blog-second-section').offsetTop - 20,
                        behavior: 'smooth'
                    });
                });
                paginationWrapper.appendChild(pageBtn);
            }
        }

        // Filter Buttons Event Listener
        filterButtons.forEach(btn => {
            btn.addEventListener("click", function() {
                filterButtons.forEach(b => b.classList.remove("active"));
                this.classList.add("active");
                activeFilter = this.getAttribute("data-filter");
                currentPage = 1;
                updateBlogDisplay();
            });
        });

        // Sidebar Category Items Event Listener
        categoryListItems.forEach(item => {
            item.addEventListener("click", function() {
                const cat = this.getAttribute("data-cat");
                activeFilter = cat;
                currentPage = 1;

                filterButtons.forEach(b => {
                    if (b.getAttribute("data-filter") === cat) {
                        b.classList.add("active");
                    } else {
                        b.classList.remove("active");
                    }
                });

                updateBlogDisplay();
                window.scrollTo({
                    top: document.querySelector('.blog-second-section').offsetTop - 20,
                    behavior: 'smooth'
                });
            });
        });

        // Search Box Event Listener
        if (searchInput) {
            searchInput.addEventListener("keyup", function() {
                searchQuery = this.value;
                currentPage = 1;
                updateBlogDisplay();
            });
        }

        // Initial Run
        updateBlogDisplay();
    });
</script>

<?php include 'footer.php'; ?>

<?php
$stmt->close();
$pop_stmt->close();
$conn->close();
?>