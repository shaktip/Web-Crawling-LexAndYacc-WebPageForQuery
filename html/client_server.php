


<?php
      

      if ($_SERVER['REQUEST_METHOD'] === 'GET') {
     // The request is using the POST method 
        echo "<marquee loop='2' bgcolor='lightgray' style='font-size:30px' scrolldelay = '100' Behavior = 'Slide'> <u><b>Welcome to Computing Lab II </b></u></marquee>" ;
      }
      else
      {
        echo "<p style = 'BACKGROUND-COLOR: lightgray; font-size : 30px'> <u><b>Welcome to Computing Lab II </b></u></p>";
      }

      $hostname = "localhost";
      $username = "root";
      $password = "root";
      $dbname = "test";
     
      $conn = new mysqli($hostname, $username, $password, $dbname);
     
	// Check connection
	if ($conn->connect_errno) 
        {
	    die("Connection failed: " . $conn->connect_error);
        }
        $_query = "";
        $_custom_query = "";

           
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
          $_query = $_POST["Query"];
          $_custom_query = $_POST["t1"];
          #echo "Submitted", $_custom_query;
       
        }   
?>
<script>
function function1()
{
   //alert("Called");
   var myForm = document.getElementById('frm1');
   myForm.t1.value = "";
}
</script>

<html>
   <body>
   
      <form name = "frm1" id = "frm1" onsubmit="document.getElementById('Query').disabled = false;" action = "<?php $_PHP_SELF ?>" method = "POST">
         
         <img src="iitkgp1.png" alt="Mountain View" align = "right" style="width:30%;height:30%;">

         <h3>Select the query or supply Custom Query:</h3>
         
         <input type = "textbox" name = "t1" id = "t1" style = "width: 50%;" value = '<?php echo $_custom_query; ?>' />  

         <select name="Query" style="width:50%;" onchange = "function1()">
            <option value="0">Select...</option>

            <option value="1" <?php if ($_query == '1') echo ' selected="selected"'; ?>>Given a responsibility i.e. chairman, GATE/JAM, find who is responsible for that, if any.</option>

            <option value="2" <?php if ($_query == '2') echo ' selected="selected"'; ?>>Given an award ( e.g. young scientist), list the faculty members who have got that award, if any</option>

            <option value="3" <?php if ($_query == '3') echo ' selected="selected"'; ?>>Given a name of faculty (e.g., Rajat ) and a year (e.g., 2014), list all publications in that year from the unit.</option>

             <option value="4" <?php if ($_query == '4') echo ' selected="selected"'; ?>>Find which faculty who has the maximum number of phd students.</option>


             <option value="5" <?php if ($_query == '5') echo ' selected="selected"'; ?>>Find which faculty who has the maximum number of publications in a given year.</option>

             <option value="6" <?php if ($_query == '6') echo ' selected="selected"'; ?>>Find which faculty has the maximum number of projects.</option>

         </select>
         
         
         <input type="submit" value = "Submit" />
      </form>
      
   </body>
</html>

<script>


function getComboA(str)
 {
   //alert("Called " + str.value);
   var myForm = document.getElementById('frmA');
   //myForm.txtarea.value = "Testing";

   if (str.value == '') {
        
        myForm.txtareaA.innerHTML = "Element not selected/entered";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            //alert("Called");
            if (this.readyState == 4 && this.status == 200) {
                myForm.txtareaA.innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","First.php?q="+str.value,true);
        xmlhttp.send();
    }

  }


function getComboB(str)
 {
   //alert("Called " + str.value);
   var myForm = document.getElementById('frmB');
   //myForm.txtarea.value = "Testing";

   if (str.value == '') {
        
        myForm.txtareaB.innerHTML = "Element not selected/entered";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            //alert("Called");
            if (this.readyState == 4 && this.status == 200) {
                myForm.txtareaB.innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","Second.php?q="+str.value,true);
        xmlhttp.send();
    }

  }

function getComboC1()
 {
   //alert("Called ");
   var myForm = document.getElementById('frmC');
   //myForm.txtarea.value = "Testing";
   str1 = myForm.comboC.value;
   str2 = myForm.comboYear.value;
   //alert("Called " + str1 + " " + str2);
   if (str1.value == '' || str2.value == '') {
        
        myForm.txtareaC.innerHTML = "Element not selected/entered";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            //alert("Called");
            if (this.readyState == 4 && this.status == 200) {
                myForm.txtareaC.innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","Third.php?q="+str1+"&r="+str2,true);
        xmlhttp.send();
    }

  }


function getComboC2()
 {
   //alert("Called ");
   var myForm = document.getElementById('frmC');
   //myForm.txtarea.value = "Testing";
   str1 = myForm.txttC1.value;
   str2 = myForm.txttC2.value;
   //alert("Called " + str1 + "  " + str2);
   if (str1.value == "" || str2.value == "") {
        
        myForm.txtareaC.innerHTML = "Element not selected/entered";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            //alert("Called");
            if (this.readyState == 4 && this.status == 200) {
                myForm.txtareaC.innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","Third.php?q="+str1+"&r="+str2 ,true);
        xmlhttp.send();
    }

  }


function getComboE(s)
 {
   //alert("Called ");
   var myForm = document.getElementById('frmE');
   //myForm.txtarea.value = "Testing";
   str = s.value;
   
   //alert("Called " + str1 + "  " + str2);
   if (str == "") {
        
        myForm.txtareaE.innerHTML = "Element not selected/entered";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            //alert("Called");
            if (this.readyState == 4 && this.status == 200) {
                myForm.txtareaE.innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","Fourth.php?q="+str ,true);
        xmlhttp.send();
    }

  }



</script>




<?php
   if( $_POST["t1"] )
   {
      $customQuery = $_POST["t1"];
      $output = "";  
      //echo "Entered";
      if(!empty($customQuery))
      {
        echo "<form id = 'frmG'>"; 
        global $conn;
        
        if(stripos($customQuery , 'select') !== false)
        {
          $retval = $conn->query( $customQuery )  ;
          //echo "If";
          if(!$retval)
          {
            $output = $output + "Error in processing the query";
          }
          else
          {
            $fieldCount = $retval->field_count;
            //echo $fieldCount;
            
            while($row = $retval->fetch_array()) 
            {
              for($i = 0 ; $i < $fieldCount; $i++)
                   $output = $output . "  " . $row[$i];   
              $output = $output . " &#13;&#10;";
            }
          }
        }
        else
        {
            //echo "Else";
             global $conn;
             if($conn->query( $customQuery ) === TRUE)
                   $output = $conn->affected_rows . " Rows are affected";
             else
                   $output = "Query Failed to execute";              
        }
        echo "<br><br> <textarea id = 'txtareaG' rows='20' cols='100'>". $output ." </textarea>";
        echo "</form>";
      } 
   } 
   else if( $_POST["Query"] )
   {
      $choice = $_POST["Query"] ;
      
       
      if($choice == '1')
      { 
        echo "<form id = 'frmA'>"; 
        echo "<h3>Select/Enter Responsibility To Search Faculty Details </h3>";  
        echo "<select id='comboA' onchange='getComboA(this)'>";
        echo "<option value=''>Select combo</option>";
        echo "<option value='Head'>Head</option>";
        echo "<option value='Chairman, GATE/JAM'>Chairman, Gate/Jam </option>";
        echo "<option value='Dean'>Dean</option>";
        echo "<option value='Vice-Chairman'>Vice-Chairman</option>";
        echo "</select>";
        echo "<input type='text' name = 'tA' id = 'txttA' value = '' onchange='getComboA(this)'>";  
        echo "<input type='button' name='btnA' onclick='getComboA(document.getElementById(\'txttA\'))' value = 'Get Records'>";

        echo "<br><br> <textarea id = 'txtareaA' rows='20' cols='100'> </textarea>";
        echo "</form>";
        
      }
      else if($choice == '2')
      { 
        echo "<form id = 'frmB'>"; 
        echo "<h3>Select/Enter Award To Search Faculty Details </h3>";  
        echo "<select id='comboB' onchange='getComboB(this)'>";
        echo "<option value=''>Select combo</option>";
        echo "<option value='IBM Faculty Award'>IBM Faculty Award</option>";
        echo "<option value='Young Engg. Award'>Young Engg. Award </option>";
        echo "<option value='Medal for YS'>Medal for YS</option>";
        echo "<option value='TCPP/CDER'>TCPP/CDER</option>";
        echo "<option value='Yahoo Faculty Award'>Yahoo Faculty Award</option>";
        echo "<option value='University Gold Medal'>University Gold Medal</option>";
        echo "<option value='University Gold Medal'>Samsung Innovation Awards</option>";

        echo "</select>";
        echo "<input type='text' name = 'tB' id = 'txttB' value = '' onchange='getComboB(this)'>";  
        echo "<input type='button' name='btnB' onclick='getComboB(document.getElementById(\'txttB\'))' value = 'Get Records'>";

        echo "<br><br> <textarea id = 'txtareaB' rows='20' cols='100'> </textarea>";
        echo "</form>";
        
      }
      else if($choice == '3')
      { 
        echo "<form id = 'frmC'>"; 
        echo "<h3>Select/Enter the faculty and Year for publication details </h3>";  
        global $conn;
        $sql = "Select distinct(fact_name) from faculty_details;";
        echo "<select id='comboC' onchange='getComboC1()'>"; 
        $retval = $conn->query( $sql );
        while($row = $retval->fetch_assoc()) 
        {
              
           $output = $row["fact_name"];
           echo "<option value='".$output."'>".$output."</option>";
        }
        echo "</select>"; 
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<select id='comboYear' onchange = 'getComboC1()'>";
        $yearVar = date("Y");
        echo "<option value=''>Select</option>";
        for(; $yearVar >= 1990 ; $yearVar--)
            echo "<option value='".$yearVar."'>".$yearVar."</option>";
        echo "</select>";
        echo "</br>";
        echo "<input type='text' name = 'tC1' id = 'txttC1' value = '' onchange='getComboC2()'>";
        echo "<input type='text' style='width:6%' name = 'tC2' id = 'txttC2' value = '' onchange='getComboC2()'>";
  
        echo "<input type='button' name='btnC' onclick='getComboC2()' value = 'Get Records'>";

        echo "<br><br> <textarea id = 'txtareaC' rows='20' cols='100'> </textarea>";
        echo "</form>";
        
      }

      else if($choice == '4')
      { 
        echo "<form id = 'frmD'>"; 
        global $conn;
        $query = "SELECT fd.fact_id, fd.fact_name, max_fact.fact_id_count
                  FROM faculty_details fd,
                  (SELECT fic.fact_id_count, fic.fact_id
                    FROM (SELECT COUNT(fact_id) fact_id_count, fact_id
                    FROM faculty_group_members
                    WHERE group_area_of_research like '%Ph.d%'
                    GROUP BY fact_id
                    ORDER BY COUNT(fact_id) DESC) fic
                    LIMIT 1) max_fact
                  WHERE fd.fact_id = max_fact.fact_id";
        $retval = $conn->query( $query )  ;
        
        $fieldCount = $retval->field_count;
        $output = "(fact_id , fact_name , Number of Phd students) : &#13;&#10;&#13;&#10;";  
        while($row = $retval->fetch_array()) 
        {
              for($i = 0 ; $i < $fieldCount; $i++)
                   $output = $output . "  " . $row[$i];   
              $output = $output . " &#13;&#10;";
        } 
        echo "<br><br> <textarea id = 'txtareaD' rows='5' cols='100'>" . $output ." </textarea>";
        echo "</form>";
        
      }

      else if($choice == '5')
      { 
        echo "<form id = 'frmE'>"; 
        echo "<h3>Select/Enter the Year for finding max publications </h3>";  

        echo "<select id='comboYear' onchange = 'getComboE(this)'>";
        $yearVar = date("Y");
        echo "<option value=''>Select</option>";
        for(; $yearVar >= 1990 ; $yearVar--)
            echo "<option value='".$yearVar."'>".$yearVar."</option>";

        echo "</select>";
        
        echo "<input type='text' style='width:6%' name = 'tD' id = 'txttE' value = '' onchange='getComboE(this)'>";
  
        echo "<input type='button' name='btnE' onclick='getComboE(document.getElementById(\'txttE\'))' value = 'Get Records'>";

        echo "<br><br> <textarea id = 'txtareaE' rows='5' cols='100'> </textarea>";
        echo "</form>";
        
      }
      else if($choice == '6')
      { 
        echo "<form id = 'frmF'>"; 
        global $conn;
        $query = "SELECT fd.fact_id, fd.fact_name, max_fact.project_count
  FROM faculty_details fd,
       (SELECT fic.project_count, fic.fact_id
          FROM (SELECT   COUNT(fact_id) project_count, fact_id
                    FROM faculty_current_projects
                GROUP BY fact_id
                ORDER BY COUNT(fact_id) DESC) fic
         LIMIT  1) max_fact
 WHERE fd.fact_id = max_fact.fact_id";
        $retval = $conn->query( $query )  ;
        
        $fieldCount = $retval->field_count;
        $output = "(fact_id , fact_name , Number of projects) : &#13;&#10;&#13;&#10;";  
        while($row = $retval->fetch_array()) 
        {
              for($i = 0 ; $i < $fieldCount; $i++)
                   $output = $output . "  " . $row[$i];   
              $output = $output . " &#13;&#10;";
        } 
        echo "<br><br> <textarea id = 'txtareaF' rows='5' cols='100'>" . $output ." </textarea>";
        echo "</form>";        
      }
     

      $conn->close(); 
         
   }
?>
