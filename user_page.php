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
        <!-- Section 1: Intro -->
        <section class="info-card">
            <h2>About This Page</h2>
            <p>This section will contain introductory information for investors. You can describe your project, goals, or updates here.</p>
            <img src="images/investor-banner.jpg" alt="Investor Banner" class="banner">
        </section>

        <!-- Section 2: Image Gallery -->
        <section class="info-card gallery">
            <h2>Gallery</h2>
            <div class="images">
                <img src="images/pic1.jpg" alt="Project 1">
                <img src="images/pic2.jpg" alt="Project 2">
                <img src="images/pic3.jpg" alt="Project 3">
            </div>
        </section>

        <!-- Section 3: Documents / Files -->
        <section class="info-card files">
            <h2>Investor Files</h2>
            <p>Access important investor documents below:</p>
            <ul>
                <li><a href="files/report-q1.pdf" target="_blank">Quarterly Report Q1</a></li>
                <li><a href="files/financials.xlsx" target="_blank">Financial Overview</a></li>
                <li><a href="files/roadmap.pdf" target="_blank">Strategic Roadmap</a></li>
            </ul>
        </section>

        <!-- Section 4: Upload Area (optional) -->
        <section class="info-card upload">
            <h2>Upload New Files</h2>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <button type="submit">Upload File</button>
            </form>
        </section>
    </main>

    <footer>
        <p>© 2025 Investor Portal — All rights reserved.</p>
    </footer>
</body>
</html>
