<?php

 $q = $_GET['q'];
 //$r =  $_GET['r'];
 //echo "Testing" . $q;

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
        
      $sql = "SELECT fd.fact_id 'fid' , fd.fact_name 'fname' , max_fact.pub_year_count 'pubyear'
  FROM faculty_details fd,
       (SELECT fic.pub_year_count, fic.fact_id
          FROM (SELECT   COUNT(fact_id) pub_year_count, fact_id
                    FROM faculty_publications
                   WHERE pub_year = '" . $q . "' 
                GROUP BY fact_id
                ORDER BY COUNT(fact_id) DESC) fic
         LIMIT  1) max_fact
 WHERE fd.fact_id = max_fact.fact_id
";
        
        
        
        $output = "Max number of Publications of given year: &#13;&#10;";
        $output = $output. " ( Fact_id , Fact_name , Number of publications ) &#13;&#10; &#13;&#10; " ;
        
        $retval = $conn->query( $sql );
        while($row = $retval->fetch_assoc()) 
        {
           
           $output = $output . ' ' .  $row['fid'] . '  ' . $row["fname"] . '  ' . $row["pubyear"] . " &#13;&#10;";
        }
        
        echo $output;
        $conn->close();     

?>
