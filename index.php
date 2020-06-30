<?php
    include_once "includes/header.php";
?>

<style>
   form { margin: 20px auto; padding: 20px; width: 350px; background: #efefef;}
   form > div { padding: 5px;}
</style>
<!-- /////////////////////////////////////////////////////////////////// -->
<div class="container">
    <div class="login-content">
        <div class="login-form">
            <form action="login/login.php" method="post" class="">
                <div class="form-group text-center">
                    <h2 style=" text-shadow:0 0 2px green;font-family: Century Gothic;" class="text-success">EDU-LAMP</h2>
                </div>
                <div class="form-group">
                    <div class="input-group">

                        <input type="text" name="username" placeholder="Username" class="form-control" required autocomplete="off" style=" background: rgba(255,255,255,0.9);">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">

                        <input type="password" name="password" placeholder="Password" class="form-control" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">

                            <select class="form-control" name="department" required>
                                <option value="">Select Department</option>
                                    <?php
                                        $get_dept=mysqli_query($conn, "SELECT * FROM departments order by id desc ");
                                        while($result_dept=mysqli_fetch_assoc($get_dept)){
									?>
									<option value="<?php echo $result_dept['dept_name'];  ?>"><?php echo $result_dept['dept_name']; ?></option>
											<?php
												}
                                           	?>
                            </select>
                        </div>
                </div>
                <div class="form-actions form-group text-center bg-success">
                    <button name="login" class="btn  btn-sm text-white">
                        <b>Sing In</b>
                    </button>
                </div>
            </form>
        </div>
            <p class="text-center text-dark mt-3"> &copy; 2020 ( Developer by Team Endeavour)</p>
    </div>
</div>
