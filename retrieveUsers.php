<?php
$servername = "localhost";
$username = "root";
$password = "Gj7W6g8t";
$dbname = "reservation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["userID"] . "<br>" . 
             $row["fName"] . "<br>" . 
             $row["lName"] . "<br>" . 
             $row["email"] . "<br><br>" ;
    }
} else {
    echo "0 results";
}
$conn->close();
?>