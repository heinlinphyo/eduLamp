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
      $page = "fo";

      
    
        $id=$_GET['id'];
        $query = "SELECT * FROM e_leave WHERE id='$id'  ";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        $token = md5(rand(1, 1000).time());
        setcookie("csrf", $token);

?>
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
                 <strong class="card-title">Leave Editing</strong>
                  <a href="e_leave.php" class="ml-auto"><button class="btn btn-primary" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-file"></i> List </button></a>
                </div>
              <div class="card-body">
                  <form  action="hr/e_leave_update.php?id=<?php echo $row['id'] ?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <input type="hidden" name="token" value="<?= $token ?>">                         
             
                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="e_id" class="form-control col-3">EMP</label>
                    <select class="form-control text-success" name="e_id" id="e_id" style="text-transform:uppercase;" required>
                      <option value="">SELECT EMPLOYEE</option>
                      <?php
                        $get_e = mysqli_query($conn, "SELECT * FROM emp WHERE freeze='' ");
                        while ($row_e=mysqli_fetch_assoc($get_e)) {
                       ?>
                       <option value="<?php echo $row_e['e_id']; ?>" <?php if($row['e_id']==$row_e['e_id']) echo "selected" ?> >
                         <?php echo $row_e['e_id']; ?> / <?php echo $row_e['e_name'] ?>
                       </option>
                     <?php } ?>
                    </select>
                  </div>
                </div>
              
                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="leave_id" class="form-control col-3">LEAVE</label>
                    <select class="form-control text-success" name="leave_id" id="leave_id" style="text-transform:uppercase;" required>
                      <option value="">SELECT LEAVE</option>
                      <?php
                        $get_leave = mysqli_query($conn, "SELECT * FROM leave_category WHERE status='' ");
                        while ($row_leave=mysqli_fetch_assoc($get_leave)) {
                       ?>
                       <option value="<?php echo $row_leave['id']; ?>" <?php if($row['leave_id']==$row_leave['id']) echo "selected" ?> >
                          <?php echo $row_leave['name'] ?>
                       </option>
                     <?php } ?>
                    </select>
                  </div>
                </div>

           
                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="s_date" class="form-control col-3">FROM</label>
                    <input type="text" name="s_date" class="form-control text-success" value="<?php echo $row['start_date'] ?>">
                  </div>
                </div>
                
                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="e_date" class="form-control col-3">To</label>
                    <input type="text" name="e_date" class="form-control text-success" value="<?php echo $row['end_date'] ?>">
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="days" class="form-control col-3">Day</label>
                    <input type="text" name="days" class="form-control text-success" value="<?php echo $row['days'] ?>">
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="asign" class="form-control col-4">AsignPerson</label>
                    <select class="form-control text-success" name="asign" id="asign" style="text-transform:uppercase;" required>
                      <option value="">Select Approved Person</option>
                              <?php
                                $get = mysqli_query($conn, "SELECT * FROM emp WHERE post_name = 'Manager' ");
                                while ($row_asign = mysqli_fetch_assoc($get)) {
                                ?>
                                <option value="<?php echo $row_asign['e_name'] ?>" <?php if($row['asign']==$row_asign['e_name']) echo "selected" ?> >
                                  <?php echo $row_asign['e_name'] ?> / <?php echo $row_asign['dept_name'] ?>
                                </option>
                                <?php
                                }
                               ?>
                    </select>
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="status" class="form-control col-3">Status</label>
                    <input type="text" name="status" class="form-control text-success" value="<?php echo $row['status'] ?>">
                  </div>
                </div>

                <div class="form-group text-center col-12">
                    <button name="update" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Update</button>
                </div>

              </div><!-- row end -->
            </form>                     
              </div><!-- card body end -->
              
                
              
          </div><!-- card end -->
        </div><!-- col-md-12 end -->      
      </div><!-- row end -->
   </div><!-- content end -->
</div><!-- wrapper end -->


<?php include_once ("includes/footer.php") ?>
