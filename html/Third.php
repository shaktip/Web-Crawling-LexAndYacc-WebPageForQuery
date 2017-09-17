<?php

 $q = $_GET['q'];
 $r =  $_GET['r'];
 //echo "Testing" . $q . " " . $r;

 $hostname = "localhost";
 $username = "root";
 $password = "root";
 $dbname = "test";

 $conn = new mysqli($hostname, $username, $password,$dbname);

	// Check connection
	if ($conn->connect_error) 
        {
	    die("Connection failed: " . $conn->connect_error);
        }
        #echo "Connection Successful...........";
        
      $sql = "SELECT fact_name , pub_title, pub_year FROM faculty_details fd , faculty_publications fp where fd.fact_id = fp.fact_id and fact_name LIKE '%" . $q . "%' and pub_year = '" . $r . "';";
        
        
        
        $output = "Faculty Publications : &#13;&#10;";
        
        $retval = $conn->query( $sql );
        while($row = $retval->fetch_assoc()) 
        {
           
           $output = $output . ' ' .  $row['fact_name'] . '--->' . $row["pub_title"] .' ' . $row["pub_year"] . " &#13;&#10;";
        }
        
        echo $output;
        $conn->close();     

?>
