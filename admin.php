<head>
    <h1>Admin</h1>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<?php

$conn = new mysqli("localhost", "root", "Gj7W6g8t", "reservation");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


/*


$sql = "SELECT * FROM users";
$result = $conn->query($sql);

echo"Users ";
echo"<input type='button' value='Edit User'>";
echo"<input type='button' value='Add User'>";
echo"<input type='button' value='Delete User'>";
echo"<br>";

if($result->num_rows > 0){
    echo"<select size='10'>";
    while($row = $result->fetch_assoc()){
        echo"<option value=" . $row["userID"] . ">" . 
        $row["userID"] . " | " . 
        $row["fName"] . " | " . 
        $row["lName"] . " | " . 
        $row["email"] . " | " . 
        "</option>";
    }
    echo"</select>";
    echo"<br><br>";
}


*/


$sql = "SELECT * FROM flights";
$result = $conn->query($sql);

echo"Flights ";
echo"<input type='button' value='Edit Flight'>";
echo"<input type='button' value='Add Flight'>";
echo"<input type='button' value='Delete Flight'>";
echo"<br>";


if($result->num_rows > 0){
    echo"<select size='10'>";
    while($row = $result->fetch_assoc()){
        echo"<option value=" . $row["flightID"] . ">" . 
        $row["flightID"] . " | " . 
        $row["flightNumber"] . " | " . 
        $row["departureName"] . " | " . 
        $row["departureCode"] . " | " . 
        $row["arrivalName"] . " | " . 
        $row["arrivalCode"] . " | " . 
        "</option>";
    }
    echo"</select>";
    echo"<br><br>";
}





$sql = "SELECT * FROM reservations";
$result = $conn->query($sql);

echo"Reservations ";
echo"<input type='button' value='Edit Reservation'>";
echo"<input type='button' value='Add Reservation'>";
echo"<input type='button' value='Delete Reservation' onclick='deleteRes()'>";
echo"<br>";

if($result->num_rows > 0){
    echo"<select id=reservations size='10'>";
    while($row = $result->fetch_assoc()){
        echo"<option value=" . $row["reservationID"] . ">" . 
        $row["reservationID"] . " | " . 
        $row["flightNumber"] . " | " . 
        $row["userFirstName"] . " | " . 
        $row["userLastName"] . " | " . 
        $row["userEmail"] . " | " . 
        "</option>";
    }
    echo"</select>";
    echo"<br>";
}

$conn->close();
    
?>

<script>
    
    function deleteRes() {
        var id = $("#reservations").val()
        
        xmlhttp = new XMLHttpRequest();
                
        xmlhttp.open("GET","deleteReservation.php?q="+id,true);
        xmlhttp.send();
                
    }
    
    function test(){
        alert("hi");
    }

</script>