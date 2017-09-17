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
        $sql = "SELECT fd.fact_id 'fid' , fact_name, fact_responsibility 'res' FROM faculty_details fd , faculty_responsibilities fr where fd.fact_id = fr.fact_id and fact_responsibility LIKE '%" . $q . "%';";
        
        
        
        $output = "Faculties of Given Responsibilities : &#13;&#10;";
        $retval = $conn->query( $sql );
        while($row = $retval->fetch_assoc()) 
        {
           
           $output = $output . ' ' .  $row['fid'] . ' ' . $row["fact_name"] . '---->' . $row['res'] . " &#13;&#10;";
        }
        echo $output;
        $conn->close();     

?>
