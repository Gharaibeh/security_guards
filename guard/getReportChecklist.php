 <?php
   


  
   
   
     include_once('../connection.php');
   
    
 

  $sql=("SELECT sites_table.id,sites_table.building_name,sites_table.description,sites_table.location, guard_visits.tag_id, guard_visits.visit_time  
  FROM sites_table Left JOIN guard_visits on sites_table.id = guard_visits.tag_id 
  AND guard_visits.visit_time > '2021-01-07 17:01:07' AND guard_visits.visit_time < '2021-01-07 17:02:02'
  ORDER BY sites_table.id");
  

$result = $conn->query($sql);



$outp = "";
while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":"'  . $row["id"] . '",';
	$outp .= '"building_name":"'  . $row["building_name"] . '",';
	$outp .= '"description":"'  . $row["description"] . '",';
    $outp .= '"location":"'  . $row["location"] . '",';
    $outp .= '"tag_id":"'  . $row["tag_id"] . '",';
    $outp .= '"visit_time":"'  . $row["visit_time"] . '"}';
}
$outp ='{"checklists":['.$outp.']}';
$conn->close();

echo($outp);



 
 ?>
 