 <?php
   
    


   $tag_id= $_REQUEST['tag_id']; 
   $guard_name= $_REQUEST['guard_name']; 
   $visit_time= $_REQUEST['visit_time']; 
    
  
   
     include_once('../connection.php');
   
    

  $result = $conn->query("SELECT * FROM sites_table  where tag_id= '$tag_id'");

$outp = "";

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
	$outp =$row["description"];
	$tag_id = $row["id"];
  }
} else {
  $outp= "null";
}


 
if ($outp != "null")
{
	  
	$sqll = "INSERT INTO guard_visits (tag_id,guard_name,visit_time) VALUES ('$tag_id','$guard_name','$visit_time')";

if ($conn->query($sqll) === TRUE) {
    echo "success";
	 
} else {
    echo "Error: " . $sqll . "<br>" . $conn->error;
}

} else { 
	echo "cannt found";
} 
 ?>