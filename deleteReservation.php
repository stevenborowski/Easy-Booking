<!DOCTYPE html>
<html>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','reservation');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"reservation");
$sql="DELETE FROM reservations WHERE reservationID = '".$q."' ";
$result = mysqli_query($con,$sql);

if ($con->query($sql) === TRUE) {
    alert("Record deleted successfully");
} else {
    alert("Error deleting record");
}
    
mysqli_close($con);
    
    
?>
</body>
</html>