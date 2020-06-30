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
        $query = "SELECT * FROM emp WHERE e_id='$id'  ";
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
                 <strong class="card-title"><i class="fa fa-edit"></i> Employee's Info Editing</strong>
                  <a href="e_list.php" class="ml-auto"><button class="btn btn-primary" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-file"></i> List </button></a>
                </div>
              <div class="card-body">
                  <form  action="hr/e_update.php?id=<?php echo $row['e_id'] ?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <input type="hidden" name="token" value="<?= $token ?>">
               <div class="form-group col-6 text-center">
                 <div class="input-group">
                   <span class="form-control text-white bg-success">INFO</span>
                 </div>
               </div>

               <div class="form-group col-6 text-center">
                 <div class="input-group">
                   <span class="form-control bg-success text-white">EDUCATION</span>
                 </div>
               </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="text" class="form-control text-success" name="e_id" id="e_id" value="<?php echo $row['e_id'] ?>" disabled>
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="edu_1" class="form-control col-2">Edu</label>
                    <input type="text" class="form-control text-success" name="edu_1" id="edu_1" value="<?php echo $row['edu_1']?>" style="text-transform:uppercase;" autocomplete="off">
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="e_name" class="form-control col-3">Name</label>
                    <input type="text" class="form-control text-success" name="e_name" id="e_name" value="<?php echo $row['e_name'] ?>" style="text-transform: uppercase;" required autocomplete="off">
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="edu_2" class="form-control col-2">Edu</label>
                    <input type="text" class="form-control text-success" name="edu_2" id="edu_2" value="<?php echo $row['edu_2'] ?>" style="text-transform:uppercase;" autocomplete="off">
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="f_name" class="form-control col-3">Father</label>
                    <input type="text" class="form-control text-success" name="f_name" id="f_name" value="<?php echo $row['f_name'] ?>" style="text-transform: uppercase;" required autocomplete="off">
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="edu_3" class="form-control col-2">Edu</label>
                    <input type="text" class="form-control text-success" name="edu_3" id="edu_3" value="<?php echo $row['edu_3'] ?>" style="text-transform:uppercase;" autocomplete="off">
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="m_name" class="form-control col-3">Mother</label>
                    <input type="text" class="form-control text-success" name="m_name" id="m_name" value="<?php echo $row['m_name'] ?>" style="text-transform: uppercase;" required autocomplete="off">
                  </div>
                </div>

                <div class="form-group col-6 text-center">
                  <div class="input-group">
                    <span class="form-control bg-success text-white">OTHER QUALIFICATIONS</span>
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="nrc" class="form-control col-3">Nrc</label>
                    <input type="text" class="form-control text-success" name="nrc" id="nrc" value="<?php echo $row['nrc'] ?>" style="text-transform: uppercase;" required autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="quali_1" class="form-control col-2">Quali</label>
                    <input type="text" class="form-control text-success" name="quali_1" id="quali_1" value="<?php echo $row['qualifi_1'] ?>" style="text-transform:uppercase;" autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="gender" class="form-control col-3">Gender</label>
                    <input type="text" name="gender" class="form-control text-success" value="<?php echo $row['gender'] ?>" style="text-transform: uppercase;" autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="quali_2" class="form-control col-2">Quali</label>
                    <input type="text" class="form-control text-success" name="quali_2" id="quali_2" value="<?php echo $row['qualifi_2'] ?>" style="text-transform:uppercase;" autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="phone" class="form-control col-3">Phone</label>
                    <input type="text" class="form-control text-success" name="phone" id="phone" value="<?php echo $row['phone']?>" style="text-transform: uppercase;" required autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-6 text-center">
                  <div class="input-group">
                    <span class="form-control bg-success text-white">JOBS HISTORY</span>
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="email" class="form-control col-3">Email</label>
                    <input type="email" class="form-control text-success" name="email" id="email" value="<?php echo $row['email'] ?>"  autocomplete="off">
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="job_1" class="form-control col-2">Job</label>
                    <input type="text" class="form-control text-success" name="job_1" id="job_1" value="<?php echo $row['job_1'] ?>" style="text-transform:uppercase;" autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="bank_acc" class="form-control col-3">Bank</label>
                    <input type="text" class="form-control text-success" name="bank_acc" id="bank_acc" value="<?php echo $row['bank_acc'] ?>" style="text-transform: uppercase;"  autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="job_2" class="form-control col-2">Job</label>
                    <input type="text" class="form-control text-success" name="job_2" id="job_2" value="<?php echo $row['job_2'] ?>" style="text-transform:uppercase;" autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="marital" class="form-control col-3">Marital</label>
                    <input type="text" class="form-control text-success" name="marital" id="marital" value="<?php echo $row['marital'] ?>" style="text-transform: uppercase;"  autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-6 text-center">
                  <div class="input-group">
                    <span class="form-control bg-success text-white">CURRENT INSTITUTION</span>
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                   
                    <input type="file" class="form-control" name="image" id="image">
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="post_id" class="form-control col-3">Position</label>
                    <select class="form-control text-success" name="post_id" id="post_id" style="text-transform:uppercase;" required>
                      <option value="">SELECT POSITION</option>
                      <?php
                        $get_post_id = mysqli_query($conn, "SELECT * FROM positions");
                        while ($post_id=mysqli_fetch_assoc($get_post_id)) {
                       ?>
                       <option value="<?php echo $post_id['id']; ?>" <?php if($post_id['id']==$row['post_id']) echo "selected" ?> >
                         <?php echo $post_id['position']; ?>
                       </option>
                     <?php } ?>
                    </select>
                  </div>
                </div>
              <div class="form-group col-6">
                <div class="input-group">
                  <label for="dob" class="form-control col-4">DateOfBirth</label>
                  <input type="text" class="form-control text-success" name="dob" id="dob" value="<?php echo $row['dob'] ?>" required autocomplete="off">
                </div>
              </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="dept_id" class="form-control col-4">Department</label>
                    <select class="form-control text-success" name="dept_id" id="dept_id" required autocomplete="off">
                      <option value="">SELECT DEPARTMENT</option>
                      <?php
                        $get_dept_id = mysqli_query($conn, "SELECT * FROM departments");
                        while ($dept_row=mysqli_fetch_assoc($get_dept_id)){
                      ?>
                      <option value="<?php echo $dept_row['id']; ?>" <?php if($dept_row['id']==$row['dept_id']) echo "selected" ?> >
                        <?php echo $dept_row['dept_name']; ?>
                      </option>
                    <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="address" class="form-control col-3">Address</label>
                    <input type="text" class="form-control text-success" name="address" id="address" value="<?php echo $row['address'] ?>" style="text-transform:uppercase;" required autocomplete="off">
                  </div>
                </div>

                
                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="join_date" class="form-control col-3">JoinDate</label>
                    <input type="text" name="join_date" class="form-control text-success" value="<?php echo $row['join_date'] ?>" readonly>
                  </div>
                </div>
                <div class="form-group col-6 text-center">
                  <div class="input-group">
                    <span class="form-control bg-success text-white">Resign Statement</span>
                  </div>
                </div>
               <span class="col-6"></span>

                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="resign_date" class="form-control col-4">Resign Date</label>
                    <input type="date" name="resign_date" class="form-control text-success">
                  </div>
                </div>
                <span class="col-6"></span>
                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="status" class="form-control col-3">Status</label>
                    <input type="text" name="status" class="form-control text-success">
                  </div>
                </div>
                

                
                <div class="form-group text-center col-12">
                    <button name="update" class="btn btn-primary" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-edit"></i> Update</button>
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
