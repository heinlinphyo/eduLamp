<?php 
error_reporting(0);
 include_once ("../includes/head.php");
 $output = '';  
 $today=date("Y-m-d");
 $sql = " SELECT *  FROM emp   "; 
 $result = mysqli_query($conn, $sql); 
 $output .= ' 
 	<div align="center" class="table-responisve"> 
 		<table  class="table table-bordered table-striped table-hover" style="font-size:12px;"> 
 			<tr> 
 				<th class="text-info">Name</th> 
 				<th class="text-center text-info align-middle">FO</th>
 				<th class="text-center text-info align-middle">LEARN</th>
 				<th class="text-center text-info align-middle">ACCOUNT</th>
 				<th class="text-center text-info align-middle">HR</th>
 				<th class="text-center text-info align-middle">ADMIN</th>
 				<th class="text-center text-info align-middle">MARKET</th>
 				<th class="text-center text-info align-middle">STORE</th>
	
 			</tr>'; 
 		$no=1;
 		while($row = mysqli_fetch_array($result)) { 
 			$e_id=$row['e_id'];
 			
 			$output .= ' 
 			<tr>
 			
 				<td class="align-middle"><b>'.$row['e_name'].'</b></td>';
 				$get_menu="SELECT * FROM e_menu WHERE e_id='$e_id' ";
 				$result_menu=mysqli_query($conn,$get_menu);	
 			while($row2=mysqli_fetch_array($result_menu)){
				  $menu_status=$row2['status'];
				  
				  if($menu_status!=""){
				 	$output .= ' 	<td class="text-center align-middle bg-primary" > 
 							 		<input type="checkbox"   checked  data-id2=" '.$row2["id"].' " id="uncheck"   />
 								</td>'; 
				 }
				 else{
					$output .= ' 	<td class="text-center align-middle" > 
 									<input type="checkbox"   data-id1=" '.$row2["id"].' " id="check"   />
 								</td>'; 
				}
 			}	
 		$output .=	'</tr>'; 	
 		} 
 	
 $output .= '</table> 
 </div>'; 
 echo $output; 
 
 
 ?>