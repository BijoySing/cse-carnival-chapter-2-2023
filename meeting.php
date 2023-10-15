<?php
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Personal Meeting</title>
</head>
<body>
    <div>
        <h1>Our Meeting</h1>
        <?php
            $zoomMeetingLink = "https://zoom.us/j/4367472329"; // Replace with your actual Zoom meeting link or ID
        ?>

        <iframe src="<?php echo $zoomMeetingLink; ?>" width="800" height="600" frameborder="0"></iframe>
    </div>
</body>
</html>
