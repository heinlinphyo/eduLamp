<?php

$conn = mysqli_connect("localhost", "root", "", "schooltest");

$columns = array('h_name', 'st_id','st_name', 'check_in', 'check_out','status','id');

if($_POST["is_date_search"] == "yes"){ 
	$from=$_POST['start_date'];
	$to=$_POST['end_date'];
	
	$query = "SELECT * FROM hostel_record WHERE DATE(check_in)>='$from' AND DATE(check_in)<='$to' AND  ";
}
else{
	
	$today=date('Y-m-d');
	
	$query = "SELECT * FROM hostel_record WHERE DATE(check_in)='$today'  AND   ";
}



if(isset($_POST["search"]["value"])){
 	$query .= '(
  						h_name LIKE "%'.$_POST["search"]["value"].'%" 
  						OR st_id LIKE "%'.$_POST["search"]["value"].'%"
  						OR st_name LIKE "%'.$_POST["search"]["value"].'%" 
  						OR check_in LIKE "%'.$_POST["search"]["value"].'%"
  						OR check_out LIKE "%'.$_POST["search"]["value"].'%"
  						OR status LIKE "%'.$_POST["search"]["value"].'%"
  						OR id LIKE "%'.$_POST["search"]["value"].'%"				
  						
  					)';
}

if(isset($_POST["order"])){
 	$query .= '  ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'  ';
}
else{
 $query .= '  ORDER BY check_in ASC  ';
}

$query1 = '';

if($_POST["length"] != -1){
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));

$result = mysqli_query($conn, $query . $query1);

$data = array();
$no=1;
while($row = mysqli_fetch_array($result)){
					;
 					$sub_array = array();
 					$sub_array[] = $no;
 					$sub_array[] = $row["h_name"];
 					$sub_array[] = $row["st_id"];
 					$sub_array[] = $row["st_name"];
 					$sub_array[] = $row["check_in"];
 					$sub_array[] = $row["check_out"] ;
  					$sub_array[] = $row["status"];
  					
 					$data[] = $sub_array;
 					$no++;
}



function get_all_data($conn){
	
 	$query = "SELECT * FROM hostel_record    ";
 	$result = mysqli_query($conn, $query);
 	return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($conn),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
