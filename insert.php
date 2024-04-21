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
    $conn = mysqli_connect("localhost", "root", "", "reservation");
    if ($conn === false) {
        die("ERROR: Could not connect." . mysqli_connect_error());
    }

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone_no = $_REQUEST['phone'];
    $check_in_date = $_REQUEST['check_in'];
    $check_out_date = $_REQUEST['check_out'];
    $room_type = $_REQUEST['room_type'];
    $no_guest = $_REQUEST['no_guest'];
    $special_request = $_REQUEST['special_request'];

    // Retrieve rate based on the selected room type
    $rate = 0;
    if ($room_type === "single") {
        $rate = 900; // Set rate for single room
    } elseif ($room_type === "double") {
        $rate = 1500; // Set rate for double room
    } elseif ($room_type === "suite") {
        $rate = 2200; // Set rate for suite room
    }

    // Calculate total charges
    $totalCharges = $rate * $no_guest;

    // Insert reservation into database
    $sql = "INSERT INTO reservation VALUES ('$name', '$email', '$phone_no', '$check_in_date', '$check_out_date', '$room_type', '$no_guest', '$special_request')";
    
    if (mysqli_query($conn, $sql)) {
        // Display booking confirmation and billing information
        echo "<h3>Booking Confirmation</h3>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Phone: $phone_no</p>";
        echo "<p>Check-in Date: $check_in_date</p>";
        echo "<p>Check-out Date: $check_out_date</p>";
        echo "<p>Hotel Name: $hotel_name</p>"; // Display hotel name
        echo "<p>Room Type: $room_type</p>";
        echo "<p>Number of Guests: $no_guest</p>";
        echo "<p>Special Requests: $special_request</p>";

        // Display rate and total charges
        echo "<div class='bill-container'>";
        echo "<h4>Billing Information</h4>";
        echo "<p>Rate: ₹" . $rate . " per night</p>";
        echo "<p>Total Charges: $" . $totalCharges . "</p>";
        echo "</div>";

        // Add a "Print" button
        echo "<button class='print-btn' onclick='printBill()'>Print Bill</button>";
    } else {
        echo "<p>Error submitting the form.</p>";
    }

    mysqli_close($conn);
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
