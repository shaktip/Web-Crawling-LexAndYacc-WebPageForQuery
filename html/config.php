<?php

 $hostname = "localhost";
 $username = "root";
 $password = "root";
 $dbname = "test";

 $conn = new mysqli($hostname, $username, $password);

	// Check connection
	if ($conn->connect_error) 
        {
	    die("Connection failed: " . $conn->connect_error);
        }
        echo "Connection Successful...........";
      
?>
