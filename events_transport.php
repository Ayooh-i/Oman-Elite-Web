<?php 
include 'includes/db_connection.php'; 
include 'includes/header.php'; 
?>

<section class="page-header">
    <h1>Elite Mobility & Calendar</h1>
    <p>Exclusive access to high-society events and premium transport logistics.</p>
</section>

<section class="content-section">
    <h2 class="section-title">The Social Season</h2>
    <div class="events-container">
        <?php
        $sql = "SELECT * FROM events ORDER BY event_date ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table class="luxury-table">';
            echo '<thead><tr><th>Date</th><th>Event</th><th>Location</th><th>Access</th></tr></thead>';
            echo '<tbody>';
            while($row = $result->fetch_assoc()) {
                // Format date to look expensive (e.g., "15 Oct 2026")
                $dateObj = date_create($row["event_date"]);
                $formattedDate = date_format($dateObj, "d M Y");
                
                echo '<tr>';
                echo '<td class="date-col">' . $formattedDate . '</td>';
                echo '<td class="title-col">' . $row["event_name"] . '</td>';
                echo '<td><i class="fas fa-map-marker-alt"></i> ' . $row["location"] . '</td>';
                echo '<td><span class="ticket-badge">' . $row["ticket_price"] . '</span></td>';
                echo '</tr>';
            }
            echo '</tbody></table>';
        } else {
            echo "<p>No upcoming events scheduled.</p>";
        }
        ?>
    </div>
</section>

<section class="content-section transport-bg">
    <h2 class="section-title">Private Fleet Services</h2>
    <div class="transport-grid">
        <div class="transport-card">
            <div class="icon-box"><i class="fas fa-plane"></i></div>
            <h3>Private Aviation</h3>
            <p>Charter Gulfstream G650 connections from Dubai, Riyadh, or London directly to Muscat Private Terminal.</p>
            <ul>
                <li><i class="fas fa-check"></i> VIP Immigration Fast-Track</li>
                <li><i class="fas fa-check"></i> Limousine Tarmac Transfer</li>
            </ul>
        </div>

        <div class="transport-card">
            <div class="icon-box"><i class="fas fa-ship"></i></div>
            <h3>Maritime Charters</h3>
            <p>Navigate the coastline in privacy. Our fleet ranges from 50ft cruisers to 100ft superyachts.</p>
            <ul>
                <li><i class="fas fa-check"></i> Crewed Service</li>
                <li><i class="fas fa-check"></i> Catering Included</li>
            </ul>
        </div>

        <div class="transport-card">
            <div class="icon-box"><i class="fas fa-car"></i></div>
            <h3>Chauffeur Drive</h3>
            <p>Rolls-Royce Phantom and Bentley Flying Spur fleet available for daily hire.</p>
            <ul>
                <li><i class="fas fa-check"></i> English-Speaking Drivers</li>
                <li><i class="fas fa-check"></i> 24/7 Concierge Support</li>
            </ul>
        </div>
    </div>
</section>
<section class="content-section" style="padding-top: 0;">
    <h2 class="section-title">VIP Terminal Access</h2>
   <div class="map-container" style="max-width: 1000px; margin: 0 auto; border: 1px solid #C5A059;">
       <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.504627254714!2d58.28178617596203!3d23.58622179960232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e8e0fd877c7295d%3A0x7d6776104273033!2sMuscat%20International%20Airport!5e0!3m2!1sen!2som!4v1709623456789!5m2!1sen!2som" 
            width="100%" 
            height="400" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>

<?php include 'includes/footer.php'; ?>