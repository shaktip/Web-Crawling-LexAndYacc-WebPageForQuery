<?php
  #echo "Testing";


 $q = $_GET['q'];

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
        
      $sql = "SELECT fd.fact_id 'fid' , fact_name, award_title 'award' FROM faculty_details fd , faculty_awards_accolades faa where fd.fact_id = faa.fact_id and award_title LIKE '%" . $q . "%';";
        
        
        
        $output = "Faculties of Given Awards : &#13;&#10;";
        
        $retval = $conn->query( $sql );
        while($row = $retval->fetch_assoc()) 
        {
           
           $output = $output . ' ' .  $row['fid'] . ' ' . $row["fact_name"] . '---->' . $row['award'] . " &#13;&#10;";
        }
        
        echo $output;
        $conn->close();     

?>
