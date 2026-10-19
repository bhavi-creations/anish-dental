<!DOCTYPE html>
<html lang="en">
<head>
<style>
    :root {
        --anish-green: #003B32;
        --anish-green-dark: #002A24;
        --anish-gold: #C6A15B;
        --anish-cream: #F8F6F0;
        --anish-white: #FFFFFF;
    }

    /* Thank You Section */
    .anish-thankyou-section {
        min-height: 75vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 70px 16px;
        background: var(--anish-cream);
    }

    .anish-thankyou-card {
        position: relative;
        overflow: hidden;
        width: 100%;
        max-width: 570px;
        padding: 55px 42px 45px;
        text-align: center;
        background: var(--anish-green);
        border: 1px solid rgba(198, 161, 91, 0.65);
        border-radius: 16px;
        box-shadow: 0 18px 50px rgba(0, 59, 50, 0.15);
        animation: anishFadeUp 0.7s ease both;
    }

    .anish-thankyou-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(
            90deg,
            var(--anish-gold),
            #E9D6A5,
            var(--anish-gold)
        );
    }

    @keyframes anishFadeUp {
        from {
            opacity: 0;
            transform: translateY(25px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .anish-thankyou-icon {
        width: 92px;
        height: 92px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        border: 2px solid var(--anish-gold);
        border-radius: 50%;
        color: var(--anish-gold);
        background: rgba(255, 255, 255, 0.06);
        font-size: 42px;
        animation: anishIconPop 0.6s 0.2s ease both;
    }

    @keyframes anishIconPop {
        from {
            opacity: 0;
            transform: scale(0.65);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .anish-thankyou-label {
        margin-bottom: 12px;
        color: var(--anish-gold);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
    }

    .anish-thankyou-title {
        margin-bottom: 18px;
        color: var(--anish-white);
        font-family: 'Playfair Display', serif;
        font-size: clamp(30px, 5vw, 42px);
        font-weight: 700;
        line-height: 1.25;
    }

    .anish-thankyou-divider {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin: 0 auto 24px;
    }

    .anish-thankyou-divider span {
        width: 48px;
        height: 1px;
        background: var(--anish-gold);
    }

    .anish-thankyou-divider i {
        width: 8px;
        height: 8px;
        background: var(--anish-gold);
        transform: rotate(45deg);
    }

    .anish-thankyou-message {
        margin-bottom: 16px;
        color: rgba(255, 255, 255, 0.92);
        font-size: 16px;
        line-height: 1.9;
    }

    .anish-thankyou-note {
        margin-bottom: 30px;
        color: #E4D9BF;
        font-size: 14px;
        line-height: 1.8;
    }

    .anish-thankyou-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 14px 30px;
        border: 1px solid var(--anish-gold);
        border-radius: 4px;
        background: var(--anish-gold);
        color: var(--anish-green-dark);
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .anish-thankyou-button:hover {
        background: transparent;
        color: var(--anish-gold);
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .anish-thankyou-footer {
        margin-top: 28px;
        padding-top: 20px;
        border-top: 1px solid rgba(198, 161, 91, 0.3);
        color: rgba(255, 255, 255, 0.75);
        font-size: 13px;
        line-height: 1.7;
    }

    @media (max-width: 576px) {
        .anish-thankyou-section {
            min-height: 70vh;
            padding: 45px 16px;
        }

        .anish-thankyou-card {
            padding: 42px 22px 30px;
            border-radius: 12px;
        }

        .anish-thankyou-icon {
            width: 78px;
            height: 78px;
            font-size: 35px;
        }

        .anish-thankyou-label {
            font-size: 10px;
            letter-spacing: 2px;
        }

        .anish-thankyou-message {
            font-size: 14px;
        }

        .anish-thankyou-button {
            width: 100%;
            padding: 13px 18px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .anish-thankyou-card,
        .anish-thankyou-icon {
            animation: none;
        }

        .anish-thankyou-button {
            transition: none;
        }
    }
</style>



  
</head>
<body>

<?php include 'header.php'; ?>


<main>
    <section class="anish-thankyou-section">
        <div class="anish-thankyou-card">

            <div class="anish-thankyou-icon">
                <i class="fa-solid fa-check"></i>
            </div>

            <div class="anish-thankyou-label">
                Anish Dental Hospital
            </div>

            <h1 class="anish-thankyou-title">
                Thank You!
            </h1>

            <div class="anish-thankyou-divider">
                <span></span>
                <i></i>
                <span></span>
            </div>

            <p class="anish-thankyou-message">
                Thank you for choosing
                <strong>Anish Dental Hospital</strong>
                for your dental care.
                <br>
                Your appointment request has been received successfully.
            </p>

            <p class="anish-thankyou-note">
                Our team will contact you shortly regarding your appointment.
                We look forward to helping you smile with confidence.
            </p>

            <a href="index.php" class="anish-thankyou-button">
                <i class="fa-solid fa-house"></i>
                Back to Home
            </a>

            <div class="anish-thankyou-footer">
                Your smile is our priority.
                <br>
                Thank you for trusting Anish Dental Hospital.
            </div>

        </div>
    </section>
</main>

<?php include 'footer.php'; ?>
