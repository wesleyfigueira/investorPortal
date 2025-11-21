<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investor Page</title>
    <link rel="stylesheet" href="styles/investor.css">
</head>
<body>
    <header>
        <h1>Welcome, <span><?php echo htmlspecialchars($_SESSION['name']); ?></span></h1>
        <nav>
            <button onclick="window.location.href='back/logout.php'">Logout</button>
        </nav>
    </header>

<main class="container">

    <!-- ===== SECTION: INTRO ===== -->
    <section class="info-card">
        <h2>About This Page</h2>
        <p>
            This page provides key investor updates, files, presentations, and media.
        </p>
        <img src="images/investor-banner.jpg" alt="Investor Banner" class="banner">
    </section>


    <!-- ===== SECTION: DOCUMENT CARDS ===== -->
    <section class="info-card documents">
        <h2>Investor Documents</h2>

        <div class="doc-list">

            <!-- Example Card -->
            <a href="files/report-q1.pdf" class="doc-card" target="_blank">
                <h3>📊 Quarterly Report – Q1</h3>
                <p>Financial performance and growth over Q1.</p>
            </a>

            <a href="files/financials.xlsx" class="doc-card" target="_blank">
                <h3>💰 Financial Overview</h3>
                <p>Updated financial projections and spending.</p>
            </a>

            <a href="https://drive.google.com/file/d/1qWLhtrUbDTL7Hn68izi6MdjSbTQGnypS/view"
               class="doc-card" target="_blank">
                <h3>👥 Our Team</h3>
                <p>Learn about leadership and company structure.</p>
            </a>

        </div>
    </section>


    <!-- ===== SECTION: TEXT CONTENT / NOTES ===== -->
    <section class="info-card notes">
        <h2>Investor Updates & Notes</h2>

        <article class="note-block">
            <h3>🚀 This Month’s Highlights</h3>
            <p>
                We onboarded 25 new business locations, initiated 2 new city partnerships,
                and expanded our regional coverage.
            </p>
        </article>

        <article class="note-block">
            <h3>📌 Major Focus Areas</h3>
            <p>
                Scaling outreach, improving data collection automation, and strengthening
                onboarding support for new city partnerships.
            </p>
        </article>
    </section>


    <!-- ===== SECTION: IMAGE GALLERY ===== -->
    <section class="info-card gallery">
        <h2>Gallery</h2>
        <div class="images">
            <img src="images/pic1.jpg" alt="Project 1">
            <img src="images/pic2.jpg" alt="Project 2">
            <img src="images/pic3.jpg" alt="Project 3">
        </div>
    </section>


    <!-- ===== SECTION: FILE UPLOAD ===== -->
     <section class="info-card upload">
        <h2>Investor Quick Links</h2>

        <div class="quick-links">
            <a href="https://ablevu.com/investor" target="_blank">🌐 Investor Portal</a>
            <a href="https://ablevu.com/timeline" target="_blank">📅 Product Timeline</a>
            <a href="https://ablevu.com/roadmap" target="_blank">🚀 Roadmap & Milestones</a>
            <a href="mailto:invest@ablevu.com">📩 Contact Investor Relations</a>
        </div>
    </section>



</main>

    <footer>
        <p>© 2025 Investor Portal — All rights reserved.</p>
    </footer>
</body>
</html>
