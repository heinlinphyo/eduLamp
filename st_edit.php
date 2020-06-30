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
        $query = "SELECT * FROM students WHERE st_id='$id'  ";
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
          <div class="card text-monospace">
            <div class="card-header row ml-1 mr-1">
                 <strong class="card-title">Student Info Editing</strong>
                  <a href="st_list.php" class="ml-auto"><button class="btn btn-info btn-sm" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-file"></i> List </button></a>
                </div>
              <div class="card-body">
                <form action="fo/st_update.php?id=<?php echo $row['st_id'] ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="token" value="<?= $token ?>">
                  <div class="row">

                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="input-group">
                          <img src="fo/photos/<?php echo $row['photo'] ?>" alt="photo" width="200" height="200">
                          <input type="file" name="photo">
                        </div>
                      </div>
                    </div><!-- col-md-4 end -->

                      <div class="col-md-8">

                          <div class="form-group">
                          <div class="input-group row">
                            <label for="st_id" class="form-control col-2">ID</label>
                            <input type="text" name="st_id" class="form-control" value="<?php echo $row['st_id'] ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group row">
                            <label for="st_name" class="form-control col-2">Name</label>
                            <input type="text" name="st_name" class="form-control" value="<?php echo $row['st_name'] ?>" autocomplete="off" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group row">
                            <label for="grade_id" class="form-control col-2">Grade</label>
                            <select class="form-control" name="grade_id" required>
                              <option value="">Select Grade</option>
                              <?php
                                $grade=mysqli_query($conn, "SELECT * FROM grades");
                                while($row_grade=mysqli_fetch_assoc($grade)):
                              ?>
                              <option value="<?php echo $row_grade['id']?>"
                                <?php if($row_grade['id']==$row['grade_id']) echo "selected" ?>
                                >
                                  <?php echo $row_grade['grade_name'] ?>
                                </option>
                              <?php endwhile; ?>
                            </select>
                          </div>
                        </div>
                        

                        <div class="form-group">
                          <div class="input-group row">
                            <label for="f_name" class="form-control col-2">Father</label>
                            <input type="text" name="f_name" class="form-control" value="<?php echo $row['father_name'] ?>" autocomplete="off" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group row">
                            <label for="nrc" class="form-control col-2">NRC</label>
                            <input type="text" name="nrc" class="form-control" value="<?php echo $row['nrc'] ?>" autocomplete="off" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group row">
                            <label for="m_name" class="form-control col-2">Mother</label>
                            <input type="text" name="m_name" class="form-control" value="<?php echo $row['mother_name'] ?>" autocomplete="off" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group row">
                            <label for="dob" class="form-control col-2">DOB</label>
                            <input type="text" name="dob" class="form-control" value="<?php echo $row['age'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group row">
                            <label for="gender" class="form-control col-2">Gender</label>
                            <input type="text" name="gender" class="form-control" value="<?php echo $row['gender'] ?>" readonly>
                          </div>
                        </div>

                        

                        <div class="form-group">
                          <div class="input-group row">
                            <label for="phone" class="form-control col-2">Phone</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $row['phone'] ?>" autocomplete="off" required >
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group row">
                            <label for="address" class="form-control col-2">Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $row['address'] ?>" autocomplete="off" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group row">
                            <label for="status" class="form-control col-2">Status</label>
                            <input type="text" name="status" class="form-control" value="<?php echo $row['status']?>">
                          </div>
                        </div>

                        <div class="form-group text-center col-12">
                           <button name="update" class="btn btn-primary btn-sm "><i class="fa fa-th-large"></i> Update </button>
                        </div>

                      </div><!-- col-md-8 end -->
                  </div><!-- row end -->         
                </form><!-- form end -->                        
              </div><!-- card body end -->
              
                
              
          </div><!-- card end -->
        </div><!-- col-md-12 end -->      
      </div><!-- row end -->
   </div><!-- content end -->
</div><!-- wrapper end -->


<?php include_once ("includes/footer.php") ?>
