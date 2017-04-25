<?php

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$flightNumber = $_POST['flightNumber'];

$conn = new mysqli("localhost", "root", "Gj7W6g8t", "reservation");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO users (fName, lName, email)
VALUES ('$firstName', '$lastName', '$email')";

if ($conn->query($sql) === TRUE) {
    /*
    echo "New record created successfully";
    */
} else {
    /*
    echo "Error: " . $sql . "<br>" . $conn->error;
    */
}

$sql = "INSERT INTO reservations (flightNumber, userFirstName, userLastName, userEmail)
VALUES ('$flightNumber', '$firstName', '$lastName', '$email')";

if ($conn->query($sql) === TRUE) {
    /*
    echo "New record created successfully";
    */
} else {
   /*
   echo "Error: " . $sql . "<br>" . $conn->error;
   */
}

/*
echo $firstName;
echo $lastName;
echo $email;
echo $flightNumber;
*/
$conn->close();



?>

<header>
    <h1>Congratulation</h1>
    <link rel="stylesheet" type="text/css" href="index.css"></header>
<body>
    <p>Your reservations has been booked</p>
    <form action='home.php'>
        <input type="submit" value="Return Home">
    </form>
</body>