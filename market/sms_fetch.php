
<?php
    include_once "../config/config.php"; // connect databse //

	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	$columns = array(
	0 => 'id',
	1 => 'text_name',
	2 => 'text_desc',
    3 => 'send_type',
    4 => 'send_date',
    5 => 'send_time',
    6 => 'count_sms',
    7 => 'user',
    8 => 'reg_date'
	);

	$where_condition = $sqlTot = $sqlRec = "";

	if( !empty($params['search']['value']) ) {
	$where_condition .=	" WHERE ";
	$where_condition .= " ( id LIKE '%".$params['search']['value']."%' ";
    $where_condition .= " OR text_name LIKE '%".$params['search']['value']."%' ";
    $where_condition .= " OR text_desc LIKE '%".$params['search']['value']."%' ";
    $where_condition .= " OR send_type LIKE '%".$params['search']['value']."%' ";
    $where_condition .= " OR send_date LIKE '%".$params['search']['value']."%' ";
    $where_condition .= " OR send_time LIKE '%".$params['search']['value']."%' ";
    $where_condition .= " OR count_sms LIKE '%".$params['search']['value']."%' ";
    $where_condition .= " OR user LIKE '%".$params['search']['value']."%' )";

	}

	$sql_query = " SELECT * FROM sms_promotion WHERE status='' ";
	$sqlTot .= $sql_query;
	$sqlRec .= $sql_query;

	if(isset($where_condition) && $where_condition != '') {

		$sqlTot .= $where_condition;
		$sqlRec .= $where_condition;
	}

 	$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";

	$queryTot = mysqli_query($conn, $sqlTot) or die("Database Error:". mysqli_error($conn));

	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($conn, $sqlRec) or die("Error to Get the Post details.");
	$data = array();
	while( $row = mysqli_fetch_array($queryRecords) ) {
		$data[] = $row;
	}

	$json_data = array(
		"draw"            => intval( $params['draw'] ),
		"recordsTotal"    => intval( $totalRecords ),
		"recordsFiltered" => intval($totalRecords),
		"data"            => $data
	);

	echo json_encode($json_data);
?>
