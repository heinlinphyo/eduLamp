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
                <strong> Employee's Salary Editing</strong>
                <a href="salary.php" class="btn btn-info ml-auto" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-file"></i> List</a>
              </div><!-- card header end -->
              <div class="card-body">
                <form action="hr/salary_update.php?id=<?php echo $row['id'] ?>" method="post">
                  <input type="hidden" name="token" value="<?= $token ?>">
                  <div class="row">
                  <div class="form-group col-6">
                    <div class="input-group">
                      <label for="e_id" class="form-control col-2 bg-success text-white text-center"><span>EMP</span></label>
                      <select class="form-control" name="e_id" required>
                        <option value="">SELECT EMPLOYEE</option>
                        <?php
                          $get=mysqli_query($conn, "SELECT * FROM emp ");
                          while($row_e=mysqli_fetch_assoc($get)){
                        ?>
                        <option value="<?php echo $row_e['e_id'] ?> " <?php if($row_e['e_id']==$row['e_id']) echo "selected" ?> >
                          <?php echo $row_e['e_id'] ?> /<?php echo $row_e['e_name'] ?>
                        </option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group col-6">
                    <div class="input-group">
                      <label for="income_tax" class="form-control col-2 bg-success text-white text-center"><span>Tax</span></label>
                      <input type="text" name="income_tax" class="form-control" value="<?php  echo $row['income_tax']?>">
                    </div>
                  </div>

                   <div class="form-group col-6">
                    <div class="input-group">
                      <label for="basic" class="form-control col-2 bg-success text-white text-center"><span>Basic</span></label>
                      <input type="text" name="basic" id="basic" class="form-control" value="<?php echo $row['basic_salary'] ?>" required>
                    </div>
                  </div>

                   <div class="form-group col-6">
                    <div class="input-group">
                      <label for="ssb" class="form-control col-2 bg-success text-white text-center"><span>SSB</span></label>
                      <input type="text" name="ssb" class="form-control" value="<?php echo $row['ssb'] ?>">
                    </div>
                  </div>

                   <div class="form-group col-6">
                    <div class="input-group">
                      <label for="meal" class="form-control col-2 bg-success text-white text-center"><span>Meal</span></label>
                      <input type="text" name="meal" id="meal" class="form-control" value="<?php  echo $row['meal_allow'] ?>">
                    </div>
                  </div>

                   <div class="form-group col-6">
                    <div class="input-group">
                      <label for="status" class="form-control col-2 bg-success text-white text-center">Status</label>
                      <input type="text" name="status" class="form-control" value="<?php echo $row['status']  ?>">
                    </div>
                  </div>

                   <div class="form-group col-6">
                    <div class="input-group">
                      <label for="transpo" class="form-control col-2 bg-success text-white text-center"><span>Tp</span></label>
                      <input type="text" name="transpo" id="transport" class="form-control" value="<?php echo $row['transpo_allow'] ?>">
                    </div>
                  </div>
                    <span class="col-6"></span>
                   <div class="form-group col-6">
                    <div class="input-group">
                      <label for="topup" class="form-control col-2 bg-success text-white text-center"><span>TopUp</span></label>
                      <input type="text" name="topup" id="topup" class="form-control" value="<?php echo $row['top_up_allow']?>">
                    </div>
                  </div>
                  <span class="col-6"></span>
                   <div class="form-group col-6">
                    <div class="input-group">
                      <label for="net_salary" class="form-control col-2 bg-success text-white text-center"><span>Net</span></label>
                      <input type="text" name="net_salary" id="net_salary" class="form-control text-danger" value="<?php  echo $row['net_salary']?>" readonly>
                    </div>
                  </div>




                  <div class="form-group text-center col-12">
                    <button name="update" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Update</button>
                </div>



                </div><!-- row end -->

                </form>
              </div><!--card body end -->
            </div><!-- card end -->
          </div>
       </div><!-- row end --> 
    </div><!-- content end -->
</div><!-- wrapper end -->

<script type="text/javascript">
  $(function () {
    $("#basic, #meal, #transport, #topup").keyup(function () {
      $("#net_salary").val(+$("#basic").val() + +$("#meal").val() + +$("#transport").val() + +$("#topup").val());
    });
  });
</script>


<?php include_once ("includes/footer.php") ?>