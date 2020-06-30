<?php

$conn = mysqli_connect("localhost", "root", "", "schooltest");

$columns = array('id','fees_id','st_id','st_name','fee_amount','fee_year', 'fee_month','deposit_amount','uniform','other','hostel','total', 'reg_user','reg_date','status');

if($_POST["is_date_search"] == "yes"){ 
	$from=$_POST['start_date'];
	$to=$_POST['end_date'];
	
	$query = "SELECT * FROM fees_collect WHERE DATE(reg_date)>='$from' AND DATE(reg_date)<='$to' AND  ";
}
else{
	
	$today=date('Y-m-d');
	
	$query = "SELECT * FROM fees_collect WHERE DATE(reg_date)='$today'  AND   ";
}

if(isset($_POST["search"]["value"])){
  $query .= '(
              fees_id LIKE "%'.$_POST["search"]["value"].'%" 
              OR st_id LIKE "%'.$_POST["search"]["value"].'%"
              OR st_name LIKE "%'.$_POST["search"]["value"].'%" 
              OR fee_year LIKE "%'.$_POST["search"]["value"].'%"
              OR fee_month LIKE "%'.$_POST["search"]["value"].'%"
              OR fee_amount LIKE "%'.$_POST["search"]["value"].'%"
              OR hostel LIKE "%'.$_POST["search"]["value"].'%"
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
 					$sub_array[] = $row["fees_id"];
 					$sub_array[] = $row["st_id"];
 					$sub_array[] = $row["st_name"];
 					$sub_array[] = $row["fee_year"];
 					$sub_array[] = $row["fee_month"] ;
  					$sub_array[] = number_format($row["fee_amount"]);
            $sub_array[] = number_format($row["deposit_amount"]);
            $sub_array[] = number_format($row["uniform"]);
            $sub_array[] = number_format($row["other"]);
            $sub_array[] = number_format($row["hostel"]);
            $sub_array[] = number_format($row["total"]);
  					
 					$data[] = $sub_array;
 					$no++;
}



function get_all_data($conn){
	
 	$query = "SELECT * FROM fees_collect    ";
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
