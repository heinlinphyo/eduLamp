<?php
      include_once "includes/header.php";

      session_start();
      if(isset($_SESSION['username'])){
        $user = $_SESSION['username'];
      }else{
        $user = "";
      }
      if($user){

      }else {
        header("location:logout.php");
      }
      $page = "hr";

      
    
        $id= mysqli_real_escape_string($conn, $_GET['id']);
        $query = "SELECT * FROM e_salary WHERE id='$id'  ";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

?>

<link rel="stylesheet" href="vendor/print-js/print.css" />

<div class="wrapper">
    <?php
      include_once ("includes/sidebar.php");
      include_once ("includes/navbar.php");
    ?>
    <div class="content mt-3">
       <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header row ml-1 mr-1">
               <strong><i class="fas fa-info-circle"></i> Employee's Salary Info </strong>
                <a href="salary.php" class="btn btn-info ml-auto" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-file"></i> List</a>
              </div><!-- card header end -->
              <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size: 12px;">
                  <thead>
                      <tr>
                        <th class="text-info">ID</th>
                        <th class="text-info">Name</th>
                        <th class="text-info">Basic</th>
                        <th class="text-info">Meal</th>
                        <th class="text-info">Transport</th>
                        <th class="text-info">TopUp</th>
                        <th class="text-info">Net</th>
                        <th class="text-info">Income Tax</th>
                        <th class="text-info">SSB</th>                        
                        <th class="text-info">Reg</th>
                        <th class="text-info">Created</th>
                        <th class="text-info">Modified</th>
                        <th class="text-info">Status</th>
                      </tr>
                   </thead>
                   <tbody>

                      <tr>
                        <td ><?php echo $row['e_id'] ?></td>
                        <td ><?php echo $row['e_name']?></td>
                        <td >
                            <?php echo number_format($row['basic_salary'])?>
                                            
                        </td>
                          <td >
                                <?php 
                                if($row['meal_allow']==''){ echo "0";}else{
                                  echo number_format($row['meal_allow']); }
                                 ?>
                                            
                                        </td>
                                        <td>
                                          <?php 
                                            if($row['transpo_allow']==''){ echo "0";}else{
                                            echo number_format($row['transpo_allow']); }
                                          ?>
                                            
                                        </td>
                                        <td>
                                          <?php 
                                            if($row['top_up_allow']==''){ echo "0";}else{
                                            echo number_format($row['top_up_allow']); }
                                          ?>
                                            
                                        </td>
                                        <td>
                                          <?php echo number_format($row['net_salary'])?>
                                            
                                        </td>
                                        <td>
                                          <?php 
                                            if($row['income_tax']==''){ echo "0";}else{
                                            echo number_format($row['income_tax']); }
                                          ?>
                                            
                                        </td>
                                        <td>
                                          <?php 
                                            if($row['ssb']==''){ echo "0";}else{
                                            echo number_format($row['ssb']); }
                                          ?>
                                            
                                        </td>
                        <td ><?php echo $row['reg_user'] ?></td>
                        <td ><?php echo $row['created_date'] ?></td>
                        <td ><?php echo $row['modified_date'] ?></td>
                        <td ><?php echo $row['status'] ?></td>
                      </tr>
                  </tbody>
                </table>
              </div><!--card body end -->
            </div><!-- card end -->
            
          </div>
       </div><!-- row end --> 
    </div><!-- content end -->
</div><!-- wrapper end -->

<script type="text/javascript">
  $(document).ready(function(){
   var dataTable = $('#bootstrap-data-table-export').DataTable({
        lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
                  {
                            extend: 'excelHtml5',
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'Employee Salary Info'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Employee Salary Info'
                        },
                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: 'Employee Salary Info',
                        },
                        {
                            extend: 'print', 
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Employee Salary Info</h1></div>',
                              
                        }
        ],
        "order": [[ 1, 'asc']],
    });
   dataTable.on( 'order.dt search.dt', function () {
            dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();



  });
</script>

<?php include_once ("includes/footer.php") ?>