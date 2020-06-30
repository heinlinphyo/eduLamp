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

      
    
        $id=$_GET['id'];
        $query = "SELECT * FROM emp WHERE e_id='$id'  ";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

?>
<style type="text/css">

  .input-group{ margin-top: 2px; }
  p{text-transform: uppercase;}

 
  }

</style>

<link rel="stylesheet" href="vendor/print-js/print.css" />

<div class="wrapper">
  <?php
    include_once ("includes/sidebar.php");
    include_once ("includes/navbar.php");
   ?>
   <div class="content">
      <div class="container">
        <div class="card" id="printJS-form">
          <div class="card-header row ml-1 mr-1">
              <strong class="card-title"><i class="fas fa-info-circle"></i> Employee's Info</strong>
              
          </div><!-- card header end -->
          <div class="card-body">
            
              <div class="row">
                <div class="form-group col-12 bg-success text-center">
                  <span>INFO</span>
                </div>
              </div>

              <div class="row">

                <div class="form-group col-4 text-center">
                  <img src="hr/photos/<?php echo $row['image'] ?>" height="250">
                </div>

                <div class="form-group col-7 text-center">
                  <div class="input-group">
                    <label class="form-control col-3">ID</label>
                    <p class="form-control"><?php echo $row['e_id'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3">NAME</label>
                    <p class="form-control"><?php echo $row['e_name'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3">NRC</label>
                    <p class="form-control"><?php echo $row['nrc'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3">DOB</label>
                    <p class="form-control"><?php echo $row['dob'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3">PHONE</label>
                    <p class="form-control"><?php echo $row['phone'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3">BANK</label>
                    <p class="form-control"><?php echo $row['bank_acc'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3">EMAIL</label>
                    <p class="form-control"><?php echo $row['email'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3">MARITAL</label>
                    <p class="form-control"><?php echo $row['marital'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3">GENDER</label>
                    <p class="form-control"><?php echo $row['gender'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3">FATHER</label>
                    <p class="form-control"><?php echo $row['f_name'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3">MOTHER</label>
                    <p class="form-control"><?php echo $row['m_name'] ?></p>
                  </div>
                  <div class="input-group">
                    <label class="form-control col-3">ADDRESS</label>
                    <p class="form-control"><?php echo $row['address'] ?></p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6 bg-success text-center">
                  <span>EDUCATION</span>
                </div>
                <div class="form-group col-6 bg-success text-center">
                  <span>OTHER QUALIFICATIONS</span>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <div class="input-group">
                    <textarea class="form-control" readonly><?php echo $row['edu_1'] ?></textarea>
                  </div>
                  <div class="input-group">
                    <textarea class="form-control" readonly><?php echo $row['edu_2'] ?></textarea>
                  </div>
                  <div class="input-group">
                    <textarea class="form-control" readonly><?php echo $row['edu_3'] ?></textarea>
                  </div>
                </div>
                <div class="col-6">
                  <div class="input-group">
                    <textarea class="form-control" readonly><?php echo $row['qualifi_1'] ?></textarea>
                  </div>
                  <div class="input-group">
                    <textarea class="form-control" readonly><?php echo $row['qualifi_2'] ?></textarea>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="form-group col-6 bg-success text-center">
                  <span>JOBS HISTORY</span>
                </div>
                <div class="form-group col-6 bg-success text-center">
                  <span>CURRENT INSTITUTE</span>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <div class="input-group">
                    <textarea class="form-control" readonly><?php echo $row['job_1'] ?></textarea>
                  </div>
                  <div class="input-group">
                    <textarea class="form-control" readonly><?php echo $row['job_2'] ?></textarea>
                  </div>
                
                </div>
                <div class="col-6 text-center">
                   <div class="input-group">
                    <label class="form-control col-4">POSITION</label>
                    <p class="form-control"><?php echo $row['post_name'] ?></p>
                  </div>
                   <div class="input-group">
                    <label class="form-control col-4">DEPARTMENT</label>
                    <p class="form-control"><?php echo $row['dept_name'] ?></p>
                  </div>
                   <div class="input-group">
                    <label class="form-control col-4">JOIN DATE</label>
                    <p class="form-control"><?php echo $row['join_date'] ?></p>
                  </div>
                   <div class="input-group">
                    <label class="form-control col-4">REG USER</label>
                    <p class="form-control"><?php echo $row['reg_user'] ?></p>
                  </div>
                   <div class="input-group">
                    <label class="form-control col-4">REG DATE</label>
                    <p class="form-control"><?php echo $row['reg_date'] ?></p>
                  </div>
                </div>
              </div><!-- row end -->

            <hr>
            
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


<script src="vendor/print-js/print_min.js"></script>
<?php include_once ("includes/footer.php") ?>
