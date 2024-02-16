<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BILL</title>
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
    
<?php
$conn = mysqli_connect("localhost", "root", "", "reservation");
if($conn === false){
    die("ERROR: Could not conntect."
    . mysqli_connect_error());
}
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone_no = $_REQUEST['phone'];
$check_in_date= $_REQUEST['check_in'];
$check_out_date = $_REQUEST['check_out'];
$room_type = $_REQUEST['room_type'];
$no_guest = $_REQUEST['no_guest'];
$special_request = $_REQUEST['special_request'];
$sql = "INSERT INTO reservation value ('$name', '$email', '$phone_no', '$check_in_date', '$check_out_date', '$room_type', '$no_guest', '$special_request')";
if(mysqli_query($conn, $sql)){
    echo "<h3> FORM SUMBMET </h3>";
}
mysqli_close($conn);
?>
 <footer>
        <!-- <div id="box">
    <img src="images/facebook.png" alt="">
    <img src="images/twetter.png" alt="">
    <img src="images/instagram.png" alt=""> -->
    <p>&copy; <?php echo date("Y"); ?> Multiple Hotels. All rights reserved.</p>

 </div>
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
  </script>

</body>
</html>