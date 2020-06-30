
<?php
    include_once "../config/config.php"; // connect databse //

	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	$columns = array(
	0 => 'id',
	1 => 'new_date',
	2 => 'item',
    3 => 'in_quantity',
    4 => 'remark',
    5 => 'coast',
    6 => 'in_user',
    7 => 'in_date',
    8 => 'out_quantity',
    9 => 'refer_to',
    10 => 'out_user',
    11 => 'out_date',
    12 => 'total_quantity'
	);

	$where_condition = $sqlTot = $sqlRec = "";

	if( !empty($params['search']['value']) ) {
	$where_condition .=	" WHERE ";
	$where_condition .= " ( id LIKE '%".$params['search']['value']."%' ";
	$where_condition .= " OR new_date LIKE '%".$params['search']['value']."%' ";
    $where_condition .= " OR item LIKE '%".$params['search']['value']."%' ";
    $where_condition .= " OR in_quantity LIKE '%".$params['search']['value']."%' ";
    $where_condition .= " OR coast LIKE '%".$params['search']['value']."%' ";
    $where_condition .= " OR in_user LIKE '%".$params['search']['value']."%' ";
    $where_condition .= " OR in_date LIKE '%".$params['search']['value']."%' ";
    $where_condition .= " OR out_quantity LIKE '%".$params['search']['value']."%' ";
    $where_condition .= " OR refer_to LIKE '%".$params['search']['value']."%' ";
    $where_condition .= " OR out_user LIKE '%".$params['search']['value']."%' ";
    $where_condition .= " OR out_date LIKE '%".$params['search']['value']."%' ";
	$where_condition .= " OR total_quantity LIKE '%".$params['search']['value']."%' )";

	}

	$sql_query = " SELECT * FROM stocks ";
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
