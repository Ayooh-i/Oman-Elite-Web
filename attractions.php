<?php 
include 'includes/db_connection.php'; 
include 'includes/header.php'; 
?>

<section class="page-header">
    <h1>Curated Journeys</h1>
    <p>Exclusive destinations selected for the elite traveler.</p>
</section>

<section class="content-section">
    <h2 class="section-title">The Collection</h2>
    <div class="attractions-grid">
        <?php
        // Fetch data from the database (Rubric 1.4.1)
        $sql = "SELECT * FROM attractions";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="luxury-card">';
                // Use the image from DB, or a fallback if missing
                $img = !empty($row["image_path"]) ? $row["image_path"] : 'assets/images/placeholder.jpg';
                echo '<div class="card-image" style="background-image: url(\''. $img .'\');"></div>';
                echo '<div class="card-content">';
                echo '<h3>' . $row["name"] . '</h3>';
                echo '<span class="location-tag"><i class="fas fa-map-marker-alt"></i> ' . $row["location"] . '</span>';
                echo '<p>' . $row["description"] . '</p>';
                echo '<span class="price-tag">' . $row["price_level"] . ' Experience</span>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p>No attractions currently listed.</p>";
        }
        ?>
    </div>
</section>

<section class="itinerary-section">
    <h2 class="section-title">The Royal Route: 5-Day Itinerary</h2>
    <p class="itinerary-intro">A bespoke schedule designed for immersion and leisure.</p>
    
    <div class="timeline">
        <div class="timeline-item">
            <div class="timeline-date">Day 01</div>
            <div class="timeline-content">
                <h3>Arrival & The Corniche</h3>
                <p>Private chauffeur transfer to Al Bustan Palace. Sunset walk along the Muttrah Corniche followed by a private dinner on a Dhow cruise.</p>
            </div>
        </div>
        
        <div class="timeline-item">
            <div class="timeline-date">Day 02</div>
            <div class="timeline-content">
                <h3>Ancient Capitals</h3>
                <p>Helicopter transfer to Nizwa. Private tour of the Fort and Souq. Lunch at a heritage farmhouse in Misfat Al Abriyeen.</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-date">Day 03</div>
            <div class="timeline-content">
                <h3>The Sands of Sharqiya</h3>
                <p>Luxury 4x4 transport to Wahiba Sands. Sunset camel trek and overnight stay in a 5-star desert glamping pod.</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-date">Day 04</div>
            <div class="timeline-content">
                <h3>Azure Waters</h3>
                <p>Morning charter to the Daymaniyat Islands. Snorkeling with turtles and a seafood beach banquet prepared by a private chef.</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-date">Day 05</div>
            <div class="timeline-content">
                <h3>Cultural Farewell</h3>
                <p>Morning at the Royal Opera House Muscat. High tea at the Chedi before VIP airport transfer.</p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>