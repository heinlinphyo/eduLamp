<?php
      include_once "includes/header.php";
      error_reporting(0);
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
      $page = "fo";

      
        $st_id=$_GET['id'];
        $query = "SELECT * FROM students WHERE st_id='$st_id'  ";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $grade_id=$row['grade_id'];

                                if($grade_id == '1'){
                                $sql_exam = mysqli_query($conn, "SELECT * FROM exam_KG WHERE st_id='$st_id' AND status='' ");
                                }elseif($grade_id == '2'){
                                 $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G1 WHERE st_id='$st_id' AND status='' ");
                                }elseif($grade_id == '3'){
                                   $sql_st = mysqli_query($conn, "SELECT * FROM exam_G2 WHERE st_id='$st_id' AND status='' ");
                                }elseif($grade_id == '4'){
                                   $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G3 WHERE st_id='$st_id' AND status='' ");
                                }elseif($grade_id == '5'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G4 WHERE st_id='$st_id' AND status='' ");
                                }elseif($grade_id == '6'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G5 WHERE st_id='$st_id' AND status='' ");
                                }elseif($grade_id == '7'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G6 WHERE st_id='$st_id' AND status='' ");
                                }elseif($grade_id == '8'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G7 WHERE st_id='$st_id' AND status='' ");
                                }elseif($grade_id == '9'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G8 WHERE st_id='$st_id' AND status='' ");
                                }elseif($grade_id == '10'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G9 WHERE st_id='$st_id' AND status='' ");
                                }elseif($grade_id == '11'){
                                  $sql_exam = mysqli_query($conn, "SELECT * FROM exam_G10 WHERE st_id='$st_id' AND status='' ");
                                }
       



?>


  <link rel="stylesheet" href="vendor/print-js/print.css" />
 <script src="vendor/print-js/print_min.js"></script>

<style type="text/css">

  @media screen{
    #letter_head, #letter_footer2{
      display: none !important;
    }
    @media print{

      #letter_head, #letter_footer2{
        display: block !important;
      }
    }
  }

  .input-group{ margin-top: 2px; }

  p{text-transform: uppercase;}

</style>

<div class="wrapper">
  <?php
    include_once ("includes/sidebar.php");
    include_once ("includes/navbar.php");
   ?>
   <div class="content">
      <div class="container">
        <div class="card">
          <div class="card-header row ml-1 mr-1">
              <strong class="card-title"><i class="fa fa-info-circle"></i> Student's Info</strong>
              <button type="button" class="btn btn-primary ml-auto mr-1 btn-sm" style="border-radius:3px;width: 70px;" onclick="printDiv('printJS-form')"><i class="fa fa-print"></i> Print</button>
              <a href="st_list.php" class="mr-1 ml-1"><button class="btn btn-info" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-file"></i> List </button></a>
          </div><!-- card header end -->
          <div class="card-body" id="printJS-form">
            <?php 
              $sql_get=mysqli_query($conn, "SELECT * FROM letter_head ");
              $image=mysqli_fetch_assoc($sql_get);
            ?>
          <div class="row justify-content-center">
            <img src="admin/letter_head/<?php echo $image['letter_image']?>" id="letter_head" style="padding-bottom: 20px;width: 80%;">
          </div>
              <div class="row">

                <div class="form-group col-4 text-center">
                  <img src="fo/photos/<?php echo $row['photo'] ?>" height="250" style="margin:10px;padding:10px;box-shadow: 0 0 0 3px skyblue;">
                </div>

                <div class="form-group col-7 text-center">

                  <div class="input-group">
                    <label class="form-control col-3 text-info">ID</label>
                    <p class="form-control"><?php echo $row['st_id'] ?></p>
                  </div>

                  <div class="input-group">
                    <label class="form-control col-3 text-info">NAME</label>
                    <p class="form-control"><?php echo $row['st_name'] ?></p>
                  </div>
                  <div class="input-group">
                    <?php
                        
                          $g_get = mysqli_query($conn, "SELECT * FROM grades WHERE id = $grade_id ");
                          $g_row = mysqli_fetch_assoc($g_get);
                      ?>
                    <label class="form-control col-3 text-info">Grade</label>
                    <p class="form-control"><?php echo $g_row['grade_name'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3 text-info">DOB</label>
                    <p class="form-control"><?php echo $row['age'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3 text-info">GENDER</label>
                    <p class="form-control"><?php echo $row['gender'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3 text-info">FATHER</label>
                    <p class="form-control"><?php echo $row['father_name'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3 text-info">NRC</label>
                    <p class="form-control"><?php echo $row['nrc'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3 text-info">MOTHER</label>
                    <p class="form-control"><?php echo $row['mother_name'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3 text-info">PHONE</label>
                    <p class="form-control"><?php echo $row['phone'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3 text-info" style="height: 100px;">ADDRESS</label>
                    <p class="form-control" style="height: 100px;"><?php echo $row['address'] ?></p>
                  </div>
                  
                  
                </div>
              </div>

              <h4 class="text-info">Exam Result</h4>
              <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size: 13px;">

                                    <thead>
                                        <tr>
                                            <th class="text-info text-right">No</th>
                                            <th class="text-info text-right" style="width: 20px;">Month</th>
                                            <th class="text-info text-center">Myanmar</th>
                                            <th class="text-info text-center">English</th>
                                            <th class="text-info text-center">Math</th>
                                            <th class="text-info text-center">Physics</th>
                                            <th class="text-info text-center">Chemistry</th>
                                            <th class="text-info text-center">Biology</th>
                                            <th class="text-info text-center">Economic</th>
                                            <th class="text-center text-info">Total</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                      <?php 
                                        $no=1;
                                        while($row_exam=mysqli_fetch_assoc($sql_exam)){
                                          $row_num=mysqli_num_rows($sql_exam);
                                      ?>
                                      
                                      <tr>
                                        <td><?php $no<$row_num; echo $no++; ?></td>
                                        <td><?php echo $row_exam['month'] ?></td>
                                        <?php 
                                          if ($row_exam['mya']<='40'){
                                            echo  "<td class='text-danger text-center'>" .$row_exam['mya']. "</td>";
                                          }else{
                                            echo "<td class='text-center'>" .$row_exam['mya']. "</td>";
                                          }

                                          ?>
                                          <?php 
                                          if ($row_exam['eng']<='40'){
                                            echo  "<td class='text-danger text-center'>" .$row_exam['eng']. "</td>";
                                          }else{
                                            echo "<td class='text-center'>" .$row_exam['eng']. "</td>";
                                          }

                                          ?>
                                          <?php 
                                          if ($row_exam['math']<='40'){
                                            echo  "<td class='text-danger text-center'>" .$row_exam['math']. "</td>";
                                          }else{
                                            echo "<td class='text-center'>" .$row_exam['math']. "</td>";
                                          }

                                          ?>
                                          <?php 
                                          if ($row_exam['phy']<='40'){
                                            echo  "<td class='text-danger text-center'>" .$row_exam['phy']. "</td>";
                                          }else{
                                            echo "<td class='text-center'>" .$row_exam['phy']. "</td>";
                                          }

                                          ?>
                                          <?php 
                                          if ($row_exam['chem']<='40'){
                                            echo  "<td class='text-danger text-center'>" .$row_exam['chem']. "</td>";
                                          }else{
                                            echo "<td class='text-center'>" .$row_exam['chem']. "</td>";
                                          }

                                          ?>
                                          <?php 
                                          if ($row_exam['bio']<='40'){
                                            echo  "<td class='text-danger text-center'>" .$row_exam['bio']. "</td>";
                                          }else{
                                            echo "<td class='text-center'>" .$row_exam['bio']. "</td>";
                                          }

                                          ?>
                                          <?php 
                                          if ($row_exam['eco']<='40'){
                                            echo  "<td class='text-danger text-center'>" .$row_exam['eco']. "</td>";
                                          }else{
                                            echo "<td class='text-center'>" .$row_exam['eco']. "</td>";
                                          }

                                          ?>
                                           <?php 
                                          if ($row_exam['total']<='300'){
                                            echo  "<td class='text-danger text-center'>" .$row_exam['total']. "</td>";
                                          }else{
                                            echo "<td class='text-center'>" .$row_exam['total']. "</td>";
                                          }

                                          ?>
                                      </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
               <!-- Leave Table Start -->
              <h4 class="text-info">Leave</h4>
              <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size: 13px;">

                                    <thead>
                                        <tr>
                                            <th class="text-info text-right" style="width: 20px;">No</th>
                                            <th class="text-info text-center">Leave Name</th>
                                            <th class="text-info text-center">Start Date</th>
                                            <th class="text-info text-center">End Date</th>
                                            
                                            <th class="text-info text-center">Asign Date</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                      <?php 
                                      $no=1;
                                        $this_year=date('Y');
                                        $get_leave=mysqli_query($conn, "SELECT * FROM st_leaves WHERE st_id='$st_id' AND year='$this_year' ORDER BY id DESC ");
                                        while($row=mysqli_fetch_assoc($get_leave)){
                                          $row_num=mysqli_num_rows($get_leave);
                                      ?>
                                      
                                      <tr>
                                        <td><?php $no<$row_num; echo $no++; ?></td>
                                        <td class="text-center"><?php echo $row['leave_type'] ?></td>
                                        <td class="text-center"><?php echo $row['start'] ?></td>              
                                        <td class="text-center"><?php echo $row['end_date'] ?></td>
                                        <td class="text-center"><?php echo $row['reg_date'] ?></td>

                                      </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
              <!-- Payment history start -->
              <h4 class="text-info">Payment History</h4>
              <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size: 13px;">
               
                                    <thead>
                                        <tr>
                                            <th class="text-info text-center">No</th>
                                            <th class="text-info text-center">Year</th>
                                            <th class="text-info text-center">Month</th>
                                            <th class="text-info text-center">Fees</th>
                                            <th class="text-info text-center">Deposit</th>
                                            <th class="text-info text-center">Other</th>
                                            <th class="text-info text-center">Hostel</th>
                                            <th class="text-info text-center">Total(MMK)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      $no=1;
                                      $this_year=date('Y');
                                        $get_pay=mysqli_query($conn, "SELECT * FROM fees_collect WHERE st_id='$st_id' ORDER BY id DESC ");
                                        while($row=mysqli_fetch_assoc($get_pay)){
                                          $row_num=mysqli_num_rows($get_pay);
                                       ?>
                                       <tr>
                                        <td><?php $no<$row_num; echo $no++; ?></td>
                                         <td class="text-center"><?php echo $row['fee_year']?></td>
                                         <td class="text-center"><?php echo $row['fee_month'] ?></td>
                                         <td class="text-center"><?php echo number_format($row['fee_amount']) ?> </td>
                                         <td class="text-center"><?php echo number_format($row['deposit_amount'])?> </td>
                                         <td class="text-center"><?php echo number_format($row['other'])?> </td>
                                         <td class="text-center"><?php echo number_format($row['hostel']) ?></td>
                                         <td class="text-center"><?php echo number_format($row['total'])?> </td>
                                       </tr>

                                     <?php } ?>
                                    </tbody>

           
            </table>
            <div class="row justify-content-center">
              <img src="admin/letter_footer2.png" id="letter_footer2" style="">
            </div>
          </div><!-- card body end -->
        </div><!-- card end -->
         <div class="card-footer bg-white text-center">
            <button type="button"  class="btn btn-primary ml-auto" style="border-radius:3px;" onclick="printDiv('printJS-form')"><i class="fa fa-print"></i> Print</button>
        </div><!-- card footer end -->
      </div><!-- container end -->
    </div><!-- content end -->
</div><!-- wrapper end -->
<script type="text/javascript">

               function printDiv(divName) {
                     var printContents = document.getElementById(divName).innerHTML;
                     var originalContents = document.body.innerHTML;

                      document.body.innerHTML = printContents;

                       window.print();

                      document.body.innerHTML = originalContents;
                 }
           </script>

<?php include_once ("includes/footer.php") ?>
