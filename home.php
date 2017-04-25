<html>

    <head>
        <h1>Easy Booking</h1>
        <link rel="stylesheet" type="text/css" href="index.css">
    </head>

    <form action="userInfo.php" method="POST">
        
    
    
    <?php
        $conn = new mysqli("localhost", "root", "Gj7W6g8t", "reservation");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        
        echo"<div id=filters>";
        
        
        //SELECT DEPARTURE FILTER
        $sql = "SELECT DISTINCT departureCode FROM flights";
        $result = $conn->query($sql);
    
        if($result->num_rows > 0){
            //echo"select departure location <br>";
            echo"<select id=departureFilter onchange='filter()'>";
            echo"<option value='1'>Select Departure</option>";
            while($row = $result->fetch_assoc()){
                echo"<option value=" . $row["departureCode"] . ">" . $row["departureCode"] . "</option>";
            }
            echo"</select>";
            echo"<br>";
        }
        
        
        
        
        
        //SELECT ARRIVAL FILTER
        $sql = "SELECT DISTINCT arrivalCode FROM flights";
        $result = $conn->query($sql);
    
        if($result->num_rows > 0){
            //echo"select arrival location";
            echo"<br>";
            echo"<select id=arrivalFilter onchange='filter()'>";
            echo"<option value='1'>Select Arrival</option>";
            while($row = $result->fetch_assoc()){
                echo"<option value=" . $row["arrivalCode"] . ">" . $row["arrivalCode"] . "</option>";
            }
            echo"</select>";
            echo"<br>";
        }
        
        
        echo"<div>";
        
        
        //FILTER BUTTON
        //echo"<input type='button' value='filter' onclick='filter()'>";
        echo"<br>";
        
        echo"<b>Select a Flight</b>";
        
        echo"<br>";
        
        
        
        //SELECT FLIGHT LIST BOX
        $sql = "SELECT * FROM flights";
        $result = $conn->query($sql);

        if ($result->num_rows > 0){
            echo"<div id=selectFlight>";
            echo"<select name='selectFlight' size='5' onchange='showFlight(this.value)'>";
            
            while($row = $result->fetch_assoc()){
                echo"<option value=" . $row['flightNumber'] . ">" . $row["departureName"] . " to " . $row["arrivalName"] . "</option>";
            }
            echo"</select>";
            echo"<br>";
            echo"</div>";
        }
        
        
        echo"<div id='flightInfo'></div>";
        
        
        echo"<input type='submit' value='Continue'> ";
        
        
        
        
        
        
        $conn->close();
        
        
        //echo"<script src='index.js'></script>";
        
        
    ?>  
      
        
        </form>
    
    
    
    
    <form action='admin.php'>
        <input type='submit' value='Admin'>
    </form>
        
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"> </script>
    <script type="text/javascript" src="index.js"></script>
    
    
    <script>
        function showFlight(str) {
            if (str == "") {
                document.getElementById("flightInfo").innerHTML = "";
                return;
            } else { 
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } 
                
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("flightInfo").innerHTML = this.responseText;
                }
            };
                
            xmlhttp.open("GET","getFlight.php?q="+str,true);
            xmlhttp.send();
                
            }
        }
        
        function filter(){
            var dep = $("#departureFilter").val();
            var arr = $("#arrivalFilter").val();
        
            if(dep == "1" && arr == "1"){
                
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } 
                
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("selectFlight").innerHTML = this.responseText;
                    }
                };
                
                xmlhttp.open("GET","filterFlightNoneSelected.php",true);
                xmlhttp.send();
            }
            
            if(dep == "1" && arr != "1"){
                
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } 
                
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("selectFlight").innerHTML = this.responseText;
                    }
                };
                
                xmlhttp.open("GET","filterFlightArrSelected.php?q="+arr,true);
                xmlhttp.send();
            }
            
            if(dep != "1" && arr == "1"){
                
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } 
                
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("selectFlight").innerHTML = this.responseText;
                    }
                };
                
                xmlhttp.open("GET","filterFlightDepSelected.php?q="+dep,true);
                xmlhttp.send();
            }
            
            if(dep != "1" && arr != "1"){
                
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } 
                
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("selectFlight").innerHTML = this.responseText;
                    }
                };
                
                xmlhttp.open("GET","filterFlightBothSelected.php?q="+dep+"&p="+arr,true);
                xmlhttp.send();
            }
            
        }
        
        
    </script>
    
</html>
