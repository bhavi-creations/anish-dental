<?php include 'header.php'; ?>
  <style>
    /* Styling to match reference image */
    .stats-card-wrapper {
      background: #ffffff;
      border: 1px solid #e0e0e0;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
      overflow: hidden;
      position: relative;
    }

    /* Continuous Marquee Track */
    .marquee-track {
      display: flex;
      width: max-content;
      animation: continuousScroll 20s linear infinite;
    }

    /* Pause scrolling when hovered */
    .stats-card-wrapper:hover .marquee-track {
      animation-play-state: paused;
    }

    .stat-item {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 12px 35px;
      white-space: nowrap;
    }

    .stat-icon {
      font-size: 2rem;
      color: #003b32; /* Dark Green outline color like image */
    }

    .stat-number {
      color: #e36012; /* Accent orange */
      font-weight: 800;
      font-size: 1.4rem;
      letter-spacing: -0.5px;
    }

    .stat-text {
      color: #000000;
      font-weight: 800;
      font-size: 1.25rem;
      letter-spacing: 0.5px;
    }

    /* Infinite Marquee Animation */
    @keyframes continuousScroll {
      0% {
        transform: translateX(0);
      }
      100% {
        transform: translateX(-50%);
      }
    }
  </style>


  <div class="container">
    <!-- Main Stats Marquee Section -->
    <div class="stats-card-wrapper py-2">
      <div class="marquee-track">
        
        <!-- Original 4 Items -->
        <div class="stat-item">
          <i class="fa-solid fa-tooth stat-icon"></i>
          <span class="stat-number">10000+</span>
          <span class="stat-text">RCT's</span>
        </div>

        <div class="stat-item">
          <img src="./assets/img/icons/dentalimplants_new.png" alt="" style="width: 50px; height: 50px;">
          <span class="stat-number">100+</span>
          <span class="stat-text">IMPLANTS</span>
        </div>

        <div class="stat-item">
          <img src="./assets/img/icons/aligners-icon.png" alt="" style="width: 50px; height: 50px;">
          <span class="stat-number">500+</span>
          <span class="stat-text">ALIGNERS</span>
        </div>

        <div class="stat-item">
          <i class="fa-solid fa-users stat-icon"></i>
          <span class="stat-number">5000+</span>
          <span class="stat-text">PTS</span>
        </div>

        <!-- Duplicated Items for Seamless Loop -->
         <div class="stat-item">
          <i class="fa-solid fa-tooth stat-icon"></i>
          <span class="stat-number">10000+</span>
          <span class="stat-text">RCT's</span>
        </div>

        <div class="stat-item">
          <i class="fa-solid fa-screwdriver-wrench stat-icon"></i>
          <span class="stat-number">100+</span>
          <span class="stat-text">IMPLANTS</span>
        </div>

        <div class="stat-item">
          <i class="fa-solid fa-teeth-open stat-icon"></i>
          <span class="stat-number">500+</span>
          <span class="stat-text">ALIGNERS</span>
        </div>

        <div class="stat-item">
          <i class="fa-solid fa-users stat-icon"></i>
          <span class="stat-number">5000+</span>
          <span class="stat-text">PTS</span>
        </div>

      </div>
    </div>
  </div>



<?php include 'footer.php';?>