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

$con = mysqli_connect('localhost','root','Gj7W6g8t','reservation');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"reservation");
$sql="SELECT * FROM flights WHERE flightNumber = '".$q."'";
$result = mysqli_query($con,$sql);

echo"hi";
mysqli_close($con);
?>
</body>
</html>