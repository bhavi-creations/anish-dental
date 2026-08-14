<?php include 'header.php' ; ?>
<style>
    /* Custom Styles for Blog First Section */
.blog-first-section {
    position: relative;
    background-color: #f0f5f3; /* Light Minty White Background */
    overflow: hidden;
    padding: 60px 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Background Right Image with Gradient Blend */
.blog-first-section .blog-banner-bg {
    position: absolute;
    top: 0;
    right: 0;
    width: 55%;
    height: 100%;
    z-index: 1;
}

.blog-first-section .blog-banner-bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.blog-first-section .blog-banner-bg::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, #f0f5f3 10%, rgba(240, 245, 243, 0.6) 50%, rgba(240, 245, 243, 0) 100%);
    z-index: 2;
}

/* Content Container Styling */
.blog-first-section .content-container {
    position: relative;
    z-index: 3;
}

/* Subtitle Styling */
.blog-first-section .blog-subtitle {
    color: #c89547; /* Gold Accent Color */
    font-size: 0.85rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 8px;
    display: block;
}

/* Main Heading */
.blog-first-section .blog-title {
    color: #0c3832; /* Deep Dark Green */
    font-size: 3rem;
    font-weight: 700;
    line-height: 1.15;
    margin-bottom: 15px;
}

/* Custom Gold Divider Line with Diamonds */
.blog-first-section .divider-container {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.blog-first-section .divider-line {
    height: 1.5px;
    width: 40px;
    background-color: #c89547;
}

.blog-first-section .divider-diamond {
    width: 6px;
    height: 6px;
    background-color: #c89547;
    transform: rotate(45deg);
    margin: 0 4px;
}

/* Sub Description */
.blog-first-section .blog-description {
    color: #4a5d58;
    font-size: 1.05rem;
    font-weight: 400;
    line-height: 1.5;
    max-width: 460px;
    margin-bottom: 0;
}

/* Responsive Handling */
@media (max-width: 991px) {
    .blog-first-section {
        padding: 50px 0;
    }

    .blog-first-section .blog-banner-bg {
        width: 100%;
        opacity: 0.25;
    }

    .blog-first-section .blog-banner-bg::before {
        background: #f0f5f3;
        opacity: 0.85;
    }

    .blog-first-section .blog-title {
        font-size: 2.2rem;
    }

    .blog-first-section .blog-description {
        font-size: 0.95rem;
    }
}






/* Custom Styles for Blog Second Section */
.blog-second-section {
    background-color: #f8faf9;
    padding: 50px 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Filter Navigation */
.blog-second-section .blog-filter-nav {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 30px;
}

.blog-second-section .blog-filter-btn {
    background-color: #ffffff;
    border: 1px solid #e1e8e5;
    padding: 8px 20px;
    border-radius: 8px;
    font-size: 0.88rem;
    font-weight: 600;
    color: #444444;
    cursor: pointer;
    transition: all 0.3s ease;
}

.blog-second-section .blog-filter-btn.active,
.blog-second-section .blog-filter-btn:hover {
    background-color: #062b26; /* Deep Dark Green */
    color: #ffffff;
    border-color: #062b26;
}

/* Blog Cards */
.blog-second-section .blog-card {
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid #e2e8e5;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.blog-second-section .blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
}

.blog-second-section .blog-img-box {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.blog-second-section .blog-img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.blog-second-section .blog-date-badge {
    position: absolute;
    bottom: 12px;
    left: 12px;
    background-color: #062b26;
    color: #ffffff;
    font-size: 0.75rem;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 6px;
}

.blog-second-section .blog-body {
    padding: 20px;
}

.blog-second-section .blog-card-title {
    color: #062b26;
    font-size: 1.15rem;
    font-weight: 700;
    line-height: 1.35;
    margin-bottom: 10px;
}

.blog-second-section .blog-card-text {
    color: #666666;
    font-size: 0.85rem;
    line-height: 1.5;
    margin-bottom: 15px;
}

.blog-second-section .blog-meta {
    display: flex;
    align-items: center;
    gap: 15px;
    font-size: 0.78rem;
    color: #555555;
    margin-bottom: 15px;
}

.blog-second-section .blog-read-more {
    color: #062b26;
    font-weight: 700;
    font-size: 0.85rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: gap 0.2s ease;
}

.blog-second-section .blog-read-more:hover {
    gap: 10px;
    color: #c89547;
}

/* Sidebar Widgets */
.blog-second-section .sidebar-widget {
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid #e2e8e5;
    padding: 24px;
    margin-bottom: 24px;
}

.blog-second-section .widget-title {
    color: #062b26;
    font-weight: 700;
    font-size: 1.2rem;
    margin-bottom: 18px;
    position: relative;
}

.blog-second-section .widget-title::after {
    content: '';
    display: inline-block;
    width: 25px;
    height: 2px;
    background-color: #c89547;
    margin-left: 8px;
    vertical-align: middle;
}

/* Search Box */
.blog-second-section .search-box {
    position: relative;
}

.blog-second-section .search-box input {
    width: 100%;
    padding: 10px 40px 10px 15px;
    border: 1px solid #dce4e1;
    border-radius: 8px;
    font-size: 0.85rem;
    outline: none;
}

.blog-second-section .search-box i {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #062b26;
}

/* Categories List */
.blog-second-section .category-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.blog-second-section .category-list li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 0;
    font-size: 0.88rem;
    color: #444444;
    cursor: pointer;
    transition: color 0.2s;
}

.blog-second-section .category-list li:hover {
    color: #c89547;
}

.blog-second-section .category-list li span.count {
    color: #888888;
    font-size: 0.8rem;
}

/* Popular Posts */
.blog-second-section .popular-post-item {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 15px;
}

.blog-second-section .popular-post-img {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    object-fit: cover;
    flex-shrink: 0;
}

.blog-second-section .popular-post-title {
    color: #062b26;
    font-size: 0.85rem;
    font-weight: 700;
    line-height: 1.3;
    margin-bottom: 2px;
    text-decoration: none;
    display: block;
}

.blog-second-section .popular-post-date {
    font-size: 0.75rem;
    color: #777777;
}

/* Newsletter */
.blog-second-section .newsletter-input-group {
    display: flex;
    gap: 0;
}

.blog-second-section .newsletter-input-group input {
    border-radius: 8px 0 0 8px;
    border: 1px solid #dce4e1;
    padding: 10px 12px;
    font-size: 0.85rem;
    width: 100%;
}

.blog-second-section .newsletter-input-group button {
    background-color: #062b26;
    color: #ffffff;
    border: none;
    padding: 0 16px;
    border-radius: 0 8px 8px 0;
}

/* Pagination Styling */
.blog-second-section .custom-pagination {
    display: flex;
    gap: 8px;
    align-items: center;
    margin-top: 30px;
}

.blog-second-section .page-num {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    background: #ffffff;
    border: 1px solid #dce4e1;
    color: #062b26;
    font-size: 0.85rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
}

.blog-second-section .page-num.active,
.blog-second-section .page-num:hover {
    background-color: #062b26;
    color: #ffffff;
    border-color: #062b26;
}
</style>

<section class="blog-first-section">
    
    <!-- Background Image Overlay with Soft Gradient -->
    <div class="blog-banner-bg">
        <img src="tooth-mirror-plant.jpg" alt="Dental Health Insights Banner">
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

                <!-- Exact Text Description -->
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
                    
                    <!-- Blog 1 -->
                    <div class="col-md-6 blog-item" data-category="oral-health">
                        <div class="blog-card">
                            <div>
                                <div class="blog-img-box">
                                    <img src="blog1.jpg" alt="10 Daily Habits">
                                    <span class="blog-date-badge">May 10, 2024</span>
                                </div>
                                <div class="blog-body">
                                    <h3 class="blog-card-title">10 Daily Habits for a Healthier Smile</h3>
                                    <p class="blog-card-text">Simple daily habits that can help you maintain strong teeth and healthy gums.</p>
                                    <div class="blog-meta">
                                        <span><i class="bi bi-shield-check"></i> Oral Health</span>
                                        <span><i class="bi bi-clock"></i> 5 min read</span>
                                    </div>
                                </div>
                            </div>
                            <div class="px-3 pb-3">
                                <a href="#" class="blog-read-more">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog 2 -->
                    <div class="col-md-6 blog-item" data-category="treatments">
                        <div class="blog-card">
                            <div>
                                <div class="blog-img-box">
                                    <img src="blog2.jpg" alt="Dental Implants">
                                    <span class="blog-date-badge">Apr 25, 2024</span>
                                </div>
                                <div class="blog-body">
                                    <h3 class="blog-card-title">Dental Implants: A Long-Term Solution for Missing Teeth</h3>
                                    <p class="blog-card-text">Everything you need to know about dental implants and how they restore your confident smile.</p>
                                    <div class="blog-meta">
                                        <span><i class="bi bi-shield-check"></i> Treatments</span>
                                        <span><i class="bi bi-clock"></i> 6 min read</span>
                                    </div>
                                </div>
                            </div>
                            <div class="px-3 pb-3">
                                <a href="#" class="blog-read-more">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog 3 -->
                    <div class="col-md-6 blog-item" data-category="kids">
                        <div class="blog-card">
                            <div>
                                <div class="blog-img-box">
                                    <img src="blog3.jpg" alt="Kids Dental Care">
                                    <span class="blog-date-badge">Apr 20, 2024</span>
                                </div>
                                <div class="blog-body">
                                    <h3 class="blog-card-title">Kids Dental Care: Tips for Healthy Little Smiles</h3>
                                    <p class="blog-card-text">Essential dental care tips to protect your child's teeth and build healthy habits early.</p>
                                    <div class="blog-meta">
                                        <span><i class="bi bi-shield-check"></i> Kids Dental Care</span>
                                        <span><i class="bi bi-clock"></i> 4 min read</span>
                                    </div>
                                </div>
                            </div>
                            <div class="px-3 pb-3">
                                <a href="#" class="blog-read-more">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog 4 -->
                    <div class="col-md-6 blog-item" data-category="treatments">
                        <div class="blog-card">
                            <div>
                                <div class="blog-img-box">
                                    <img src="blog4.jpg" alt="Clear Aligners">
                                    <span class="blog-date-badge">Mar 30, 2024</span>
                                </div>
                                <div class="blog-body">
                                    <h3 class="blog-card-title">Clear Aligners vs Braces: Which is Right for You?</h3>
                                    <p class="blog-card-text">A helpful comparison to decide the best orthodontic treatment for your needs.</p>
                                    <div class="blog-meta">
                                        <span><i class="bi bi-shield-check"></i> Treatments</span>
                                        <span><i class="bi bi-clock"></i> 7 min read</span>
                                    </div>
                                </div>
                            </div>
                            <div class="px-3 pb-3">
                                <a href="#" class="blog-read-more">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog 5 -->
                    <div class="col-md-6 blog-item" data-category="oral-health">
                        <div class="blog-card">
                            <div>
                                <div class="blog-img-box">
                                    <img src="blog5.jpg" alt="Regular Checkups">
                                    <span class="blog-date-badge">Mar 18, 2024</span>
                                </div>
                                <div class="blog-body">
                                    <h3 class="blog-card-title">Why Regular Dental Checkups Are Important?</h3>
                                    <p class="blog-card-text">Regular checkups can prevent problems before they start. Here's why they matter.</p>
                                    <div class="blog-meta">
                                        <span><i class="bi bi-shield-check"></i> Oral Health</span>
                                        <span><i class="bi bi-clock"></i> 5 min read</span>
                                    </div>
                                </div>
                            </div>
                            <div class="px-3 pb-3">
                                <a href="#" class="blog-read-more">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog 6 -->
                    <div class="col-md-6 blog-item" data-category="dental-tips">
                        <div class="blog-card">
                            <div>
                                <div class="blog-img-box">
                                    <img src="blog6.jpg" alt="Root Canal">
                                    <span class="blog-date-badge">Mar 05, 2024</span>
                                </div>
                                <div class="blog-body">
                                    <h3 class="blog-card-title">Signs You Might Need Root Canal Treatment</h3>
                                    <p class="blog-card-text">Tooth pain not going away? Here are signs you shouldn't ignore.</p>
                                    <div class="blog-meta">
                                        <span><i class="bi bi-shield-check"></i> Dental Care Tips</span>
                                        <span><i class="bi bi-clock"></i> 6 min read</span>
                                    </div>
                                </div>
                            </div>
                            <div class="px-3 pb-3">
                                <a href="#" class="blog-read-more">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog 7 (Page 2 Demo Item) -->
                    <div class="col-md-6 blog-item" data-category="updates">
                        <div class="blog-card">
                            <div>
                                <div class="blog-img-box">
                                    <img src="blog7.jpg" alt="Clinic Update">
                                    <span class="blog-date-badge">Feb 20, 2024</span>
                                </div>
                                <div class="blog-body">
                                    <h3 class="blog-card-title">Advanced Dental Technology Now Available</h3>
                                    <p class="blog-card-text">We have upgraded our facility with 3D Scanners for painless diagnosis.</p>
                                    <div class="blog-meta">
                                        <span><i class="bi bi-shield-check"></i> Clinic Updates</span>
                                        <span><i class="bi bi-clock"></i> 3 min read</span>
                                    </div>
                                </div>
                            </div>
                            <div class="px-3 pb-3">
                                <a href="#" class="blog-read-more">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

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
                        <li data-cat="oral-health"><span><i class="bi bi-prescription2 me-2"></i>Oral Health</span> <span class="count">12</span></li>
                        <li data-cat="treatments"><span><i class="bi bi-shield-plus me-2"></i>Treatments</span> <span class="count">15</span></li>
                        <li data-cat="dental-tips"><span><i class="bi bi-lightbulb me-2"></i>Dental Care Tips</span> <span class="count">10</span></li>
                        <li data-cat="kids"><span><i class="bi bi-emoji-smile me-2"></i>Kids Dental Care</span> <span class="count">08</span></li>
                        <li data-cat="updates"><span><i class="bi bi-newspaper me-2"></i>Clinic Updates</span> <span class="count">06</span></li>
                    </ul>
                </div>

                <!-- Popular Posts Widget -->
                <div class="sidebar-widget">
                    <h4 class="widget-title">Popular Posts</h4>
                    
                    <div class="popular-post-item">
                        <img src="pop1.jpg" class="popular-post-img" alt="White Teeth">
                        <div>
                            <a href="#" class="popular-post-title">How to Maintain White Teeth Naturally</a>
                            <div class="popular-post-date"><i class="bi bi-calendar3"></i> May 02, 2024</div>
                        </div>
                    </div>

                    <div class="popular-post-item">
                        <img src="pop2.jpg" class="popular-post-img" alt="Tooth Sensitivity">
                        <div>
                            <a href="#" class="popular-post-title">Tooth Sensitivity: Causes and Solutions</a>
                            <div class="popular-post-date"><i class="bi bi-calendar3"></i> Apr 28, 2024</div>
                        </div>
                    </div>

                    <div class="popular-post-item">
                        <img src="pop3.jpg" class="popular-post-img" alt="Best Foods">
                        <div>
                            <a href="#" class="popular-post-title">Best Foods for Strong Teeth</a>
                            <div class="popular-post-date"><i class="bi bi-calendar3"></i> Apr 15, 2024</div>
                        </div>
                    </div>

                    <div class="popular-post-item">
                        <img src="pop4.jpg" class="popular-post-img" alt="Teeth Cleaning">
                        <div>
                            <a href="#" class="popular-post-title">Benefits of Professional Teeth Cleaning</a>
                            <div class="popular-post-date"><i class="bi bi-calendar3"></i> Apr 03, 2024</div>
                        </div>
                    </div>
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
        
        

        <!-- Bottom Call To Action Banner -->
        <div class="cta-banner">
            <div class="row g-4 align-items-center justify-content-between">
                
                <!-- Left: Icon + Text -->
                <div class="col-lg-6">
                    <div class="d-flex align-items-center gap-3">
                        <div class="cta-icon-box">
                            <i class="bi bi-calendar-check"></i>
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
document.addEventListener("DOMContentLoaded", function () {
    const itemsPerPage = 6;
    let currentPage = 1;
    let activeFilter = "all";
    let searchQuery = "";

    const allBlogItems = Array.from(document.querySelectorAll(".blog-item"));
    const filterButtons = document.querySelectorAll(".blog-filter-btn");
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
            pageBtn.addEventListener("click", function () {
                currentPage = i;
                updateBlogDisplay();
                window.scrollTo({ top: document.querySelector('.blog-second-section').offsetTop - 20, behavior: 'smooth' });
            });
            paginationWrapper.appendChild(pageBtn);
        }
    }

    // Filter Buttons Event Listener
    filterButtons.forEach(btn => {
        btn.addEventListener("click", function () {
            filterButtons.forEach(b => b.classList.remove("active"));
            this.classList.add("active");
            activeFilter = this.getAttribute("data-filter");
            currentPage = 1;
            updateBlogDisplay();
        });
    });

    // Search Box Event Listener
    searchInput.addEventListener("keyup", function () {
        searchQuery = this.value;
        currentPage = 1;
        updateBlogDisplay();
    });

    // Initial Run
    updateBlogDisplay();
});
</script>

<?php include 'footer.php' ; ?>