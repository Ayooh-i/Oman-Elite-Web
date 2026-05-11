<?php 
include 'includes/db_connection.php'; 
include 'includes/header.php'; 


$statusMsg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['full_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO messages (full_name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        $statusMsg = "<div class='success-msg'>Request received. Our concierge will contact you shortly.</div>";
    } else {
        $statusMsg = "<div class='error-msg'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>

<section class="page-header">
    <h1>Concierge Service</h1>
    <p>Let us curate your perfect Omani itinerary.</p>
</section>

<section class="watermark-section">
    <div class="contact-container">
        <?php echo $statusMsg; ?>

        <form action="contact.php" method="POST" class="luxury-form">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="full_name" required placeholder="e.g. John Doe">
            </div>
            
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" required placeholder="name@example.com">
            </div>

            <div class="form-group">
                <label>Subject</label>
                <select name="subject" class="form-control">
                    <option>Request Custom Itinerary</option>
                    <option>Private Jet Logistics</option>
                    <option>Event VIP Access</option>
                    <option>General Inquiry</option>
                </select>
            </div>

            <div class="form-group">
                <label>Message</label>
                <textarea name="message" rows="5" required placeholder="Tell us about your requirements..."></textarea>
            </div>

            <button type="submit" class="btn-gold" style="width: 100%; border: none; cursor: pointer;">Submit Request</button>
        </form>
    </div>
</section>

<?php include 'includes/footer.php'; ?>