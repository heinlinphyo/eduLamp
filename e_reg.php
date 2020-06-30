<?php

      include_once ("includes/header.php");
      session_start();
      if(isset($_SESSION['username'])){
        $user = $_SESSION['username'];
      }else{
        $user = "";
      }
      if($user){

      }else {
        header("location: logout.php");
      }
      $page = "hr";

    // get staff id //
    $get_id = mysqli_query($conn, "SELECT * FROM emp ORDER BY id DESC  LIMIT 1 ");
    $result_id = mysqli_fetch_assoc($get_id);
    $get_e_id = $result_id['id'];
    $result_e_id = $result_id['e_id'];

    $to_year = date('Y');
    $to_month = date('m');

    if($get_e_id==""){
      $e_id = "E".date('Y').date('m')."1";
    }elseif (stristr($result_e_id, $to_month)===FALSE) {
      $e_id = "E".date('Y').date('m').'1';
    }elseif (stristr($result_e_id, $to_year)===FALSE) {
      $e_id = "E".date('Y').date('m').'1';
    }else{
      $remove_m = substr($result_e_id, 7);
      $remove_m = $remove_m + 1;
      $e_id = "E".date('Y').date('m').$remove_m;
    }

    $token = md5(rand(1, 1000).time());
    setcookie("csrf", $token);

 ?>

<div class="wrapper">
    <?php
        include_once ("includes/sidebar.php");
        include_once ("includes/navbar.php");
     ?>
    <div class="content">
      <div class="container">
        <div class="card">
          <div class="card-header row ml-1 mr-1">
              <strong class="card-title"><i class="fa fa-registered"></i> Employee Registration</strong>
              <a href="e_list.php" class="ml-auto"><button class="btn btn-primary" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-file"></i> List</button></a>
          </div><!-- card header end -->
          <div class="card-body">
            <form  action="hr/e_reg.php?e_id=<?php echo $e_id ?>" method="post" enctype="multipart/form-data">
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
                    <input type="text" class="form-control text-success" name="e_id" id="e_id" value="<?php echo $e_id ?>" disabled>
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="text" class="form-control text-success" name="edu_1" id="edu_1" placeholder="..." style="text-transform:uppercase;" autocomplete="off">
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="text" class="form-control text-success" name="e_name" id="e_name" placeholder="Name" style="text-transform: uppercase;" required autocomplete="off">
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="text" class="form-control text-success" name="edu_2" id="edu_2" placeholder="..." style="text-transform:uppercase;" autocomplete="off">
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="text" class="form-control text-success" name="f_name" id="f_name" placeholder="Father Name" style="text-transform: uppercase;" required autocomplete="off">
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="text" class="form-control text-success" name="edu_3" id="edu_3" placeholder="..." style="text-transform:uppercase;" autocomplete="off">
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="text" class="form-control text-success" name="m_name" id="m_name" placeholder="Mother Name" style="text-transform: uppercase;" required autocomplete="off">
                  </div>
                </div>

                <div class="form-group col-6 text-center">
                  <div class="input-group">
                    <span class="form-control bg-success text-white">OTHER QUALIFICATIONS</span>
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="text" class="form-control text-success" name="nrc" id="nrc" placeholder="nrc" style="text-transform: uppercase;" required autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="text" class="form-control text-success" name="quali_1" id="quali_1" placeholder="..." style="text-transform:uppercase;" autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <select class="form-control text-success" name="gender" required>
                      <option value="">SELECT GENDER</option>
                      <option value="MALE">MALE</option>
                      <option value="FEMALE">FEMALE</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="text" class="form-control text-success" name="quali_2" id="quali_2" placeholder="..." style="text-transform:uppercase;" autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="text" class="form-control text-success" name="phone" id="phone" placeholder="phone" style="text-transform: uppercase;" required autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-6 text-center">
                  <div class="input-group">
                    <span class="form-control bg-success text-white">JOBS HISTORY</span>
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="email" class="form-control text-success" name="email" id="email" placeholder="EMAIL"  autocomplete="off">
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="text" class="form-control text-success" name="job_1" id="job_1" placeholder="..." style="text-transform:uppercase;" autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="text" class="form-control text-success" name="bank_acc" id="bank_acc" placeholder="bank account" style="text-transform: uppercase;"  autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="text" class="form-control text-success" name="job_2" id="job_2" placeholder="..." style="text-transform:uppercase;" autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="text" class="form-control text-success" name="marital" id="marital" placeholder="marital status" style="text-transform: uppercase;"  autocomplete="off">
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
                    <select class="form-control text-success" name="post_id" id="post_id" style="text-transform:uppercase;" required>
                      <option value="">SELECT POSITION</option>
                      <?php
                        $get_post_id = mysqli_query($conn, "SELECT * FROM positions");
                        while ($post_id=mysqli_fetch_assoc($get_post_id)) {
                       ?>
                       <option value="<?php echo $post_id['id']; ?>">
                         <?php echo $post_id['position']; ?>
                       </option>
                     <?php } ?>
                    </select>
                  </div>
                </div>
              <div class="form-group col-6">
                <div class="input-group">
                  <input type="text" class="form-control text-success" name="dob" id="dob" placeholder="Date Of Birth (dd/mm/yyyy)" required autocomplete="off">
                </div>
              </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <select class="form-control text-success" name="dept_id" id="dept_id" required autocomplete="off">
                      <option value="">SELECT DEPARTMENT</option>
                      <?php
                        $get_dept_id = mysqli_query($conn, "SELECT * FROM departments");
                        while ($dept_row=mysqli_fetch_assoc($get_dept_id)){
                      ?>
                      <option value="<?php echo $dept_row['id']; ?>">
                        <?php echo $dept_row['dept_name']; ?>
                      </option>
                    <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="text" class="form-control text-success" name="address" id="address" placeholder="address" style="text-transform:uppercase;" required autocomplete="off">
                  </div>
                </div>

                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="text" class="form-control text-success" name="username" id="username" placeholder="username" style="text-transform:uppercase;" autocomplete="off" required minlength="6">
                  </div>
                </div>

                <span class="col-6"></span>

                <div class="form-group col-6">
                  <div class="input-group">
                    <input type="password" class="form-control text-success" name="password" id="password" placeholder="password" style="text-transform:uppercase;" autocomplete="off" minlength="6" required>
                  </div>
                </div>

                <span class="col-6"></span>

                <div class="form-group col-6">
                  <div class="input-group">
                    <label for="join_date" class="form-control col-3 bg-success text-white">JoinDate</label>
                    <input type="date" class="form-control text-success" name="join_date" id="join_date" required>
                  </div>
                </div>
                <div class="form-group text-center col-12">
                    <button name="reg" class="btn btn-primary"><i class="fa fa-th-large"></i> Save</button>
                </div>

              </div><!-- row end -->
            </form>
          </div><!-- card body end -->
        </div><!-- card end -->
      </div><!-- container end -->
    </div><!-- content end -->
</div><!-- wrapper end -->
<?php include_once ("includes/footer.php"); ?>
