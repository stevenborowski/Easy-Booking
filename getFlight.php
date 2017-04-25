<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','Gj7W6g8t','reservation');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"reservation");
$sql="SELECT * FROM flights WHERE flightNumber = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Flight Number</th>
<th>Departure</th>
<th>Arrival</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['flightNumber'] . "</td>";
    echo "<td>" . $row['departureName'] . "</td>";
    echo "<td>" . $row['arrivalName'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>