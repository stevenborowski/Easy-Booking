<!DOCTYPE html>
<html>
<body>

<?php
$q = strval($_GET['q']);

$con = mysqli_connect('localhost','root','Gj7W6g8t','reservation');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"reservation");
$sql="SELECT * FROM flights WHERE departureCode = '$q' ";
$result = mysqli_query($con,$sql);

echo"<div id=selectFlight>";
echo"<select name='selectFlight' size='5' onchange='showFlight(this.value)'>";
            
while($row = $result->fetch_assoc()){
    echo"<option value=" . $row['flightNumber'] . ">" . $row["departureName"] . " to " . $row["arrivalName"] . "</option>";
}
echo"</select>";
echo"<br>";
echo"</div>";
mysqli_close($con);
?>
</body>
</html>