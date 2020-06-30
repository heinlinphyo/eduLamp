<?php

$conn = mysqli_connect("localhost", "root", "", "schooltest");

$columns = array('id','dexp_id','dexp_amount','remark','reg_user','reg_date');

if($_POST["is_date_search"] == "yes"){ 
	$from=$_POST['start_date'];
	$to=$_POST['end_date'];
	
	$query = "SELECT * FROM dailyexpense WHERE DATE(reg_date)>='$from' AND DATE(reg_date)<='$to' AND  ";
}
else{
	
	$today=date('Y-m-d');
	
	$query = "SELECT * FROM dailyexpense WHERE DATE(reg_date)='$today'  AND   ";
}

if(isset($_POST["search"]["value"])){
  $query .= '(
              dexp_id LIKE "%'.$_POST["search"]["value"].'%" 
              OR reg_date LIKE "%'.$_POST["search"]["value"].'%"
              OR dexp_amount LIKE "%'.$_POST["search"]["value"].'%"
              OR reg_user LIKE "%'.$_POST["search"]["value"].'%"
              OR id LIKE "%'.$_POST["search"]["value"].'%"        
              
            )';
}

if(isset($_POST["order"])){
 	$query .= '  ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'  ';
}
else{
 $query .= '  ORDER BY reg_date ASC  ';
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
 					$sub_array[] = $row["dexp_id"];
          $sub_array[] = $row["reg_date"];
  					$sub_array[] = $row["reg_user"];
            $sub_array[] =$row["remark"];
            $sub_array[] = number_format($row["dexp_amount"]);
      
  					
 					$data[] = $sub_array;
 					$no++;
}



function get_all_data($conn){
	
 	$query = "SELECT * FROM dailyexpense    ";
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
