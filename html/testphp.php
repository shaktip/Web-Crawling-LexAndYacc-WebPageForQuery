<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
    
    <p>
     What is your Gender?
     <select name="formGender">
     <option value="">Select...</option>
     <option value="M">Male</option>
     <option value="F">Female</option>
     </select>
     </p>

    <?php
       
	$servername = "localhost";
	$username = "root";
	$password = "root";

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) 
        {
	    die("Connection failed: " . $conn->connect_error);
        }
	echo "Connected successful";

       
    ?>
 </body>
</html>
