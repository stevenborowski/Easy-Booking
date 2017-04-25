<head>
    <h1>Easy Booking</h1>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<?php

$flightNumber = $_POST['selectFlight'];

$conn = new mysqli("localhost", "root", "Gj7W6g8t", "reservation");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo"<form action='submit.php' method='post'>";

echo"First Name <br>";
echo"<input type='text' name=firstName> <br>";

echo"Last Name <br>";
echo"<input type='text' name=lastName> <br>";

echo"Email <br>";
echo"<input type='text' name=email> <br>";

echo"<input type='hidden' name='flightNumber' value=$flightNumber>";

echo"<input type='submit'> <br>";

echo"</form>";

/*
echo $flightNumber;
*/

$conn->close();

?>