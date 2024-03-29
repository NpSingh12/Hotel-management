<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="hotel.css">
   
</head>
<body>
    <div class="navbar" id="navbar">
        <a href="index.html" class="active">Home</a>
        <a href="rooms.html">Rooms</a>
        <a href="amenities.html">Services</a>
        <a href="contact us.html">Contact</a>
        <a href="javascript:void(0);" class="icon" onclick="toggleNavbar()">
            &#9776;
        </a>
    </div>
    <div class="container">

    <?php
    $conn = mysqli_connect("localhost", "root", "", "contactus");
    if ($conn === false) {
        die("ERROR: Could not connect." . mysqli_connect_error());
    }

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $message = $_REQUEST['message'];

    $sql = "INSERT INTO contactus value ('$name', '$email', '$message')";
    
    if (mysqli_query($conn, $sql)) {
        // Retrieve the last inserted ID to get the booking details
        $lastInsertedId = mysqli_insert_id($conn);
       // $billingDetails = getBillingDetails($lastInsertedId);

        // Display booking confirmation and billing information
        echo "<h3>Booking Confirmation</h3>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Message: $message</p>";

        // Display billing information
        //echo "<div class='bill-container'>";
        //echo "<h4>Billing Information</h4>";
        //echo "<p>Total Charges: $" . $billingDetails['total_charges'] . "</p>";
        //echo "</div>";
//
        //// Add a "Print" button
        //echo "<button class='print-btn' onclick='printBill()'>Print Bill</button>";
//
        //// You may want to add a "Print" button here that triggers the print functionality
    } else {
        echo "<p>Error submitting the form.</p>";
    }

    mysqli_close($conn);

    //function getBillingDetails($bookingId)
   // {
        // Add your logic to retrieve billing details based on the booking ID
        // For demonstration purposes, I'm using a simple calculation
       // $rate = 100; // Replace with the actual rate based on room type
       // $totalCharges = $rate * $_REQUEST['no_guest'];
//
       // return ['total_charges' => $totalCharges];
    //}
    ?>

    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Multiple Hotels. All rights reserved.</p>
    </footer>

    <script>
        function toggleNavbar() {
            var x = document.getElementById("navbar");
            if (x.className === "navbar") {
                x.className += " responsive";
            } else {
                x.className = "navbar";
            }
        }

        function printBill() {
            window.print();
        }
    </script>
</body>
</html>
