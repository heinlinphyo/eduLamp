<?php

	include_once "includes/header.php";

	session_start();
	if(isset($_SESSION['username'])){
		$user=$_SESSION['username'];
	}
	else{
		$user="";
	}

	if($user){

	}
	else{
		header("location:logout.php");
    }

    $page = "learn";

    // form st_row get grade id //
    $this_year=date('Y');
    $id=mysqli_real_escape_string($conn, $_GET['id']);
    $get_g_name=mysqli_query($conn, "SELECT * FROM grades WHERE id='$id'  ");
    $g_name = mysqli_fetch_assoc($get_g_name);
    $grade_name=$g_name['grade_name'];

    // select from students //
    if($id == '1'){
    $sql_st = mysqli_query($conn, "SELECT * FROM KG WHERE year='$this_year' ");
  }elseif($id == '2'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_1 WHERE year='$this_year' ");
  }elseif($id == '3'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_2 WHERE year='$this_year' ");
  }elseif($id == '4'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_3 WHERE year='$this_year' ");
  }elseif($id == '5'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_4 WHERE year='$this_year' ");
  }elseif($id == '6'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_5 WHERE year='$this_year' ");
  }elseif($id == '7'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_6 WHERE year='$this_year' ");
  }elseif($id == '8'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_7 WHERE year='$this_year' ");
  }elseif($id == '9'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_8 WHERE year='$this_year' ");
  }elseif($id == '10'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_9 WHERE year='$this_year' ");
  }elseif($id == '11'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_10 WHERE year='$this_year' ");
  }


    $token = md5(rand(1, 1000).time());
    setcookie("csrf", $token);
?>

<div class="wrapper">
  <?php
      include_once ("includes/sidebar.php");
      include_once ("includes/navbar.php");
   ?>
   <!-- .content -->
        <div class="content mt-3 ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                          <form action="" method="post">
                            <div class="card-header row ml-1 mr-1" >
										            Students Exam Result List (<?php echo $grade_name; ?>)

                                <input type="date" id="start_date" name="start_date" class="form-control col-md-2 ml-auto"/>
                                <input type="date" id="end_date" name="end_date" class="form-control col-md-2 ml-2" value="<?php echo date('Y-m-d'); ?>"/>
                                <button class="btn btn-primary btn-sm ml-2" id="search" name="search" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa  fa-search"></i> Search</button>
                                
                                <button type="button" name="new" id="newRecord" class="btn btn-primary ml-1"><i class="fas fa-plus-circle"></i> Result</button>
										        </div>
                          </form>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size: 13px;">

                                    <thead>
                                        <tr>
                                            <th class="text-info text-right" style="width: 20px;">No</th>
                                            <th class="text-info">Month</th>
                                            <th class="text-info">ID</th>
                                            <th class="text-info">Name</th>
                                            <th class="text-info">Myanmar</th>
                                            <th class="text-info">English</th>
                                            <th class="text-info">Math</th>
                                            <th class="text-info">Physic</th>
																						<th class="text-info">Chemistry</th>
																						<th class="text-primary">Bio</th>
                                            <th class="text-info">Eco</th>
                                            <th class="text-success">Total</th>
                                            <th class="text-center text-info">Action</th>

                                        </tr>
                                    </thead>
                                <?php 

                                if(isset($_POST['search'])){

                                  $start_date=$_POST['start_date'];
                                  $end_date=$_POST['end_date'];

                                if($id == '1'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_KG WHERE created_date>='$start_date' AND created_date<='$end_date' AND status='' ");
                                }elseif($id == '2'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G1 WHERE created_date>='$start_date' AND created_date<='$end_date' AND status='' ");
                                }elseif($id == '3'){
                                  $sql_st = mysqli_query($conn, "SELECT * FROM exam_G2 WHERE created_date>='$start_date' AND created_date<='$end_date' AND status='' ");
                                }elseif($id == '4'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G3 WHERE created_date>='$start_date' AND created_date<='$end_date' AND status='' ");
                                }elseif($id == '5'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G4 WHERE created_date>='$start_date' AND created_date<='$end_date' AND status='' ");
                                }elseif($id == '6'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G5 WHERE created_date>='$start_date' AND created_date<='$end_date' AND status='' ");
                                }elseif($id == '7'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G6 WHERE created_date>='$start_date' AND created_date<='$end_date' AND status='' ");
                                }elseif($id == '8'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G7 WHERE created_date>='$start_date' AND created_date<='$end_date' AND status='' ");
                                }elseif($id == '9'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G8 WHERE created_date>='$start_date' AND created_date<='$end_date' AND status='' ");
                                }elseif($id == '10'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G9 WHERE created_date>='$start_date' AND created_date<='$end_date' AND status='' ");
                                }elseif($id == '11'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G10 WHERE created_date>='$start_date' AND created_date<='$end_date' AND status='' ");
                                }
                              
                              }else{  
                                 $month=date('F');

                                if($id == '1'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_KG WHERE month='$month' AND status='' ");
                                }elseif($id == '2'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G1 WHERE month='$month' AND status='' ");
                                }elseif($id == '3'){
                                  $sql_st = mysqli_query($conn, "SELECT * FROM exam_G2 WHERE month='$month' AND status='' ");
                                }elseif($id == '4'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G3 WHERE month='$month' AND status='' ");
                                }elseif($id == '5'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G4 WHERE month='$month' AND status='' ");
                                }elseif($id == '6'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G5 WHERE month='$month' AND status='' ");
                                }elseif($id == '7'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G6 WHERE month='$month' AND status='' ");
                                }elseif($id == '8'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G7 WHERE month='$month' AND status='' ");
                                }elseif($id == '9'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G8 WHERE month='$month' AND status='' ");
                                }elseif($id == '10'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G9 WHERE month='$month' AND status='' ");
                                }elseif($id == '11'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G10 WHERE month='$month' AND status='' ");
                                }
                              }
                                ?>
                                    <tbody>
                                      <?php 
                                        $no=1;
                                        while($get=mysqli_fetch_assoc($sql_exam)){
                                          
                                          $row_num=mysqli_num_rows($sql_st);
                                       ?>

                                   
                                       
                                       <tr>
                                         <td><?php $no<$row_num; echo $no++; ?></td>
                                         <td><?php echo $get['month'] ?></td>
                                         <td><?php echo $get['st_id'] ?></td>
                                         <td><?php echo $get['st_name'] ?></td>
                                          <?php 
                                          if ($get['mya']<='40'){
                                            echo  "<td class='text-danger text-center'>" .$get['mya']. "</td>";
                                          }else{
                                            echo "<td class='text-center'>" .$get['mya']. "</td>";
                                          }

                                          ?>
                                          <?php 
                                          if ($get['eng']<='40'){
                                            echo  "<td class='text-danger text-center'>" .$get['eng']. "</td>";
                                          }else{
                                            echo "<td class='text-center'>" .$get['eng']. "</td>";
                                          }

                                          ?>
                                          <?php 
                                          if ($get['math']<='40'){
                                            echo  "<td class='text-danger text-center'>" .$get['math']. "</td>";
                                          }else{
                                            echo "<td class='text-center'>" .$get['math']. "</td>";
                                          }

                                          ?>
                                          <?php 
                                          if ($get['phy']<='40'){
                                            echo  "<td class='text-danger text-center'>" .$get['phy']. "</td>";
                                          }else{
                                            echo "<td class='text-center'>" .$get['phy']. "</td>";
                                          }

                                          ?>
                                          <?php 
                                          if ($get['chem']<='40'){
                                            echo  "<td class='text-danger text-center'>" .$get['chem']. "</td>";
                                          }else{
                                            echo "<td class='text-center'>" .$get['chem']. "</td>";
                                          }

                                          ?>
                                          <?php 
                                          if ($get['bio']<='40'){
                                            echo  "<td class='text-danger text-center'>" .$get['bio']. "</td>";
                                          }else{
                                            echo "<td class='text-center'>" .$get['bio']. "</td>";
                                          }

                                          ?>
                                          <?php 
                                          if ($get['eco']<='40'){
                                            echo  "<td class='text-danger text-center'>" .$get['eco']. "</td>";
                                          }else{
                                            echo "<td class='text-center'>" .$get['eco']. "</td>";
                                          }

                                          ?>
                                           <?php 
                                          if ($get['total']<='300'){
                                            echo  "<td class='text-danger text-center'>" .$get['total']. "</td>";
                                          }else{
                                            echo "<td class='text-center'>" .$get['total']. "</td>";
                                          }

                                          ?>
                                          <td class="align-middle text-center"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?php echo $get['id']; ?>" style="border-radius: 2px;box-shadow: 0 0 3px gray;width: 65px;"><i class="fa fa-edit"></i> Edit</button></td>
                                          
                                       </tr>
                                        <!-- Edit Modal-->
                              
     <div class="modal fade" id="edit<?php echo $get['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel"><?php echo $get['st_name']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                           
                    <div class="modal-body">
                      <form action="learn/st_exam_update.php?id=<?php echo $get['id'];  ?>" method="post">
                        <input type="hidden" name="token" value="<?= $token ?>">
                         <input type="hidden" name="grade_id" value="<?php echo $id; ?>">
                    <input type="hidden" name="grade_name" value="<?php echo $grade_name; ?>">
                        <div class="form-group">   
                                    <div class="input-group">
                                                <label class="mt-2 col-md-3">Myanmar</label>
                                                <input type="text" class="form-control" name="mya2" id="mya2" autocomplete="off" style="color:blue;" maxlength="2" value="<?php echo $get['mya']; ?>">
                                            
                                        </div>
                        </div>
                      
                      
                       <div class="form-group">   
                                    <div class="input-group">
                                                <label class="mt-2 col-md-3">English</label>
                                                 <input type="text" class="form-control" name="eng2" id="eng2" autocomplete="off" style="color:blue;" maxlength="2" value="<?php echo $get['eng']; ?>">
                                        </div>
                        </div>
                        
                           <div class="form-group">   
                                    <div class="input-group">
                                             <label class="mt-2 col-md-3">Math</label>
                                              <input type="text" class="form-control" name="math2" id="math2" autocomplete="off" style="color:blue;" maxlength="2" value="<?php echo $get['math']; ?>">  
                                     </div>
                        </div>
                        
                       
                        
                          <div class="form-group">   
                                    <div class="input-group">
                                                <label class="mt-2 col-md-3">Physic</label>
                                               <input type="text" class="form-control" name="phy2" id="phy2" autocomplete="off" style="color:blue;" maxlength="2" value="<?php echo $get['phy']; ?>">
                                     </div>
                        </div>
                        

                
                           <div class="form-group">   
                                    <div class="input-group">
                                                <label class="mt-2 col-md-3">Chemistry</label>
                                                <input type="test" name="chem2" id="chem2" class="form-control" autocomplete="off" style="color: blue;" maxlength="2" value="<?php echo $get['chem']; ?>"  >
                                     </div>
                        </div>
                        
                         <div class="form-group">   
                                    <div class="input-group">
                                                <label class="mt-2 col-md-3">Bio</label>
                                                <input type="text" class="form-control" name="bio2" id="bio2" autocomplete="off" style="color:blue;" maxlength="2" value="<?php echo $get['bio']; ?>">
                                     </div>
                        </div>


                        
                         <div class="form-group">   
                                    <div class="input-group">
                                                <label class="mt-2 col-md-3">Eco</label>
                                                <input type="text" class="form-control" name="eco2" id="eco2" autocomplete="off" style="color:blue;" maxlength="2" value="<?php echo $get['eco']; ?>">
                                     </div>
                        </div>
                           <div class="form-group">   
                                    <div class="input-group">
                                                <label class="mt-2 col-md-3">Total</label>
                                                <input type="text" class="form-control" name="total2" id="total2" autocomplete="off" style="color:green;" value="<?php echo $get['total']; ?>" readonly>
                                     </div>
                        </div>
                        
                
                    
                    </div>
                            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-times-circle"></i> Cancel</button>
                        <button name="update" class="btn btn-primary" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-check"></i> Update</button>
                     </div>
                    </form>
            </div>
        </div>
     </div>
    <!-- Creat Modal-->

                                       
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div><!-- card body end -->
														
                        </div><!-- card end -->

                    </div>
                </div>
        </div>
        <!-- .content -->
</div><!-- wrapper end -->


<?php include_once "includes/footer.php" ?>

<script type="text/javascript">
  $(document).ready(function(){
   var dataTable = $('#bootstrap-data-table-export').DataTable({
        lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
                  {
                            extend: 'excelHtml5',
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'Students Exam Result List'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Students Exam Result List'
                        },
                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: 'Students Exam Result List',
                        },
                        {
                            extend: 'print', 
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Students Exam Result List</h1></div>',
                              
                        }
        ],
        "order": [[ 1, 'asc']],


    });

       dataTable.on( 'order.dt search.dt', function () {
            dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
  

  $('#newRecord').click(function(){
            $('#newModal').modal('show');
          });

  });
</script>




<!-- Record New Modal Begin -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="mediumModalLabel"> Student's Exam Result </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
          </div>
              <div class="modal-body">

                  <form action="learn/st_exam_add.php" method="post">

                    <input type="hidden" name="token" value="<?= $token ?>">
                    <input type="hidden" name="grade_id" value="<?php echo $id; ?>">
                    <input type="hidden" name="grade_name" value="<?php echo $grade_name; ?>">

                       <div class="form-group">   
                                  <div class="input-group">
                                     
                                      <input list="st_id" name="st_id"  class="form-control" autocomplete="off" placeholder="Select Student ID" required autofocus>
                                        <datalist id="st_id">
                                              <option value="">Select Student</option>
                                              <?php
                                                
                                                while($result_st=mysqli_fetch_assoc($sql_st)){
                                                  
                                               ?>                                                   
                                              <option value="<?php echo $result_st['st_id']?>">
                                                <?php echo $result_st['st_name'] ?> 
                                              </option>                                    
                                                <?php } ?>
                                      </datalist>
                                      </div>
                              </div>

                     <div class="form-group">
                          <div class="input-group">
                            <input type="text" name="mya" id="mya" class="form-control"  autocomplete="off" placeholder="Myanmar" maxlength="2">
                          </div>
                      </div>

                       <div class="form-group">
                         <div class="input-group">
                          
                           <input type="text" name="eng" id="eng" class="form-control" autocomplete="off" placeholder="English" maxlength="2">
                         </div>
                       </div>


                        <div class="form-group">
                         <div class="input-group">
                           
                           <input type="text" name="math" id="math" class="form-control"  autocomplete="off" placeholder="Math" maxlength="2">
                         </div>
                       </div>

                       <div class="form-group">
                         <div class="input-group">
                           
                           <input type="text" name="phy" id="phy" class="form-control" autocomplete="off" placeholder="Physic" maxlength="2">
                         </div>
                       </div>

                       <div class="form-group">
                         <div class="input-group">
                           
                           <input type="text" name="chem" id="chem" class="form-control" autocomplete="off" placeholder="Chemistry" maxlength="2">
                         </div>
                       </div>

                       <div class="form-group">
                         <div class="input-group">
                           
                           <input type="text" name="bio" id="bio" class="form-control"  autocomplete="off" placeholder="Bio" maxlength="2">
                         </div>
                       </div>

                       <div class="form-group">
                         <div class="input-group">
                           
                           <input type="text" name="eco" id="eco" class="form-control"  autocomplete="off" placeholder="Eco" maxlength="2">
                         </div>
                       </div>
                     
                       <div class="form-group">
                         <div class="input-group">
                           
                           <input type="text" name="total" id="total" class="form-control" autocomplete="off" readonly style="color: green;">
                         </div>
                       </div>
                   
  								 
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;">Cancel</button>
                        <button name="post" class="btn btn-primary" style="border-radius: 5px;"><i class="fa fa-th-large"></i> Save </button>
                    </div>
              </form>
      </div><!-- modal body end -->
      </div>
  </div>
</div>
<!-- Record New Modal Begin End -->
<script type="text/javascript">
  $(function () {
    $("#mya, #eng, #math, #phy, #chem, #bio, #eco").keyup(function () {
      $("#total").val( +$("#mya").val() + +$("#eng").val() + +$("#math").val() + +$("#phy").val() + +$("#chem").val() + +$("#bio").val() + +$("#eco").val()   );
    });
  });

  $(function () {
    $("#mya2, #eng2, #math2, #phy2, #chem2, #bio2, #eco2").keyup(function () {
      $("#total2").val( +$("#mya2").val() + +$("#eng2").val() + +$("#math2").val() + +$("#phy2").val() + +$("#chem2").val() + +$("#bio2").val() + +$("#eco2").val()   );
    });
  });
</script>


                     

                   
             