
<style media="screen">
  span{ font-size: 14px;}
  .dropdown-toggle::after{ float: right !important;}
</style>

<nav id="sidebar"><!-- sidebar begin -->
    <div class="sidebar-header text-center">
        <h3 class="text-dark"><u class="">EDU-LAMP</u></h3>
        <strong><img src="assets/images/Logo.png" alt="logo" width="50px"></strong>
    </div>

    <ul class="list-unstyled components">

        <li class="<?php if($page=="dashboard"){ echo 'active' ;} ?>">
            <a href="dashboard.php">
                <i class="fa fa-align-justify"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="<?php if($page=='calendar'){echo 'active';} ?>">
            <a href="calendar.php"><i class="fa fa-calendar"></i> <span>Calendar</span></a>
        </li>
        <?php 
            if($user=="admin"){

        ?>

        <li class="<?php if($page=="fo"){ echo 'active' ;} ?>">
            <a href="#foSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-th-large"></i>
                <span>Front Office</span>
            </a>
            <ul class="collapse list-unstyled" id="foSubmenu" style="font-size: 14px;">
                <li>
                    <a href="st_reg.php"><i class="fa fa-registered"></i> Register </a>
                </li>
                <li>
                  <a href="rows.php"><i class="fa fa-wallet"></i> Fees </a>
                </li>
                <li>
                    <a href="st_list.php"><i class="fa fa-child"></i> Students</a>
                </li>
                <li>
                    <a href="invoice.php"><i class="fa fa-funnel-dollar"></i> Invoice</a>
                </li>
            </ul>
        </li>
          <li class="<?php if($page=="hr"){ echo 'active' ;} ?>">
                    <a href="#hrSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-users"></i>
                        <span>Human Resource</span>
                    </a>
                    <ul class="collapse list-unstyled" id="hrSubmenu" style="font-size: 14px;">
                      <li>
                          <a href="e_attendance.php"><i class="fa fa-calendar-day"></i> Attendance </a>
                      </li>
                      <li>
                          <a href="e_reg.php"><i class="fa fa-registered"></i> Registration </a>
                      </li>
                        <li>
                            <a href="e_list.php"><i class="fa fa-users"></i> Employees</a>
                        </li>

                        <li>
                            <a href="e_leave.php"><i class="fa fa-file"></i> Leave </a>
                        </li>
                        <li>
                            <a href="e_leave_check.php"><i class="fas fa-check"></i> Leave Check</a>
                        </li>

                        <li>
                            <a href="salary.php"><i class="fas fa-hand-holding-usd"></i> Salary </a>
                        </li>
                        <li>
                            <a href="raw_data.php"><i class="fa fa-file-excel"></i> Raw Data </a>
                        </li>
                        <li>
                            <a href="payroll.php"><i class="fa fa-file-excel"></i> Pay Roll</a>
                        </li>
                        <li>
                          <a href="payslip.php"> <i class="fa fa-receipt"></i> Pay Slip </a>
                        </li>
                        <li>
                          <a href="salary_report.php"> <i class="fa fa-file-invoice-dollar"></i> Salary Report</a>
                        </li>
                        <li>
                            <a href="hr_setting.php"><i class="fa fa-tools"></i> Setting </a>
                        </li>
                    </ul>
                </li>
        <li class="<?php if($page=="account"){ echo 'active' ;} ?>">
            <a href="#accountSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-university"></i>
                <span>Account</span>
            </a>
            <ul class="collapse list-unstyled" id="accountSubmenu" style="font-size: 14px;">
                <li>
                    <a href="deposit.php"><i class="fas fa-funnel-dollar"></i> Daily Deposit</a>
                </li>
                <li>
                  <a href="expense.php"><i class="fa fa-shopping-cart"></i> Daily Expense</a>
                </li>
                <li>
                  <a href="unpaid.php"><i class="fab fa-creative-commons-nc"></i> Unpaid List </a>
                </li>
                <li>
                  <a href="daily_report.php"><i class="fa fa-funnel-dollar"></i> Daily Report</a>
                </li>

                <li>
                    <a href="monthly_report.php"><i class="fa fa-calendar-day"></i> Monthly Report</a>
                </li>
            </ul>
        </li>
           <li class="<?php if($page=="store"){ echo 'active' ;} ?>">
                    <a href="#storeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-warehouse"></i>
                        <span>Store</span>
                    </a>
                    <ul class="collapse list-unstyled" id="storeSubmenu" style="font-size: 14px;">
                        <li>
                            <a href="instock.php"><i class="fa fa-tools"></i> (In) Stock </a>
                        </li>
                        <li>
                            <a href="outstock.php"><i class="fa fa-tools"></i> (Out) Stock </a>
                        </li>
                        <li>
                            <a href="stock.php"><i class="fa fa-warehouse"></i> Stock List </a>
                        </li>

                    </ul>
                </li>


             <li class="<?php if($page=='learn'){echo 'active';} ?>">
                   <a href="#learnSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-crown"></i>
                        <span>Learning</span>
                    </a>
                    <ul class="collapse list-unstyled" id="learnSubmenu" style="font-size: 14px;">
                        <li>
                            <a href="hostel.php"><i class="fa fa-home"></i> Hostel</a>
                        </li>
                        <li>
                            <a href="st_leave.php"><i class="fa fa-calendar-day"></i> Leave </a>
                        </li>
                     
                        <li>
                            <a href="st_row.php"><i class="fa fa-trophy"></i> Exam</a>
                        </li>

                    </ul>
             </li>
             <li class="<?php if($page=='market'){echo 'active';} ?>">
                   <a href="#marketSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-search-dollar"></i>
                        <span>Marketing</span>
                    </a>
                    <ul class="collapse list-unstyled" id="marketSubmenu" style="font-size: 14px;">
                        <li>
                            <a href="sms.php"><i class="fa fa-sms"></i>  SMS</a>
                        </li>
                        <li>
                            <a href="sms_send.php"><i class="fas fa-envelope-open-text"></i> SMS Send</a>
                        </li>
                        <li>
                            <a href="sms_status.php"><i class="fa fa-sync-alt"></i> SMS Status</a>
                        </li>
                    </ul>
             </li>

            <li class="<?php if($page=='admin'){echo 'active';} ?>">
                   <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-cog"></i>
                        <span>Adminstration</span>
                    </a>
                    <ul class="collapse list-unstyled" id="adminSubmenu" style="font-size: 14px;">
                        <li>
                            <a href="hostel_setting.php"><i class="fa fa-home"></i> Hostel</a>
                        </li>
                        <li>
                            <a href="logo.php"><i class="fa fa-image"></i> Logo</a>
                        </li>
                        <li>
                            <a href="address.php"><i class="fa fa-home"></i> Address</a>
                        </li>
                        <li>
                            <a href="letter_head.php"><i class="fa fa-file-image"></i> Letter Head</a>
                        </li>
                        <li>
                            <a href="letter_foot.php"><i class="fa fa-file-image"></i> Letter Foot</a>
                        </li>
                        <li>
                            <a href="sms_setting.php"><i class="fa fa-envelope-square"></i> SMS Setting</a>
                        </li>
                        <li>
                            <a href="permission.php"><i class="fa fa-lock"></i> Permission </a>
                        </li>
                        
                    </ul>
             </li>
           
  
        <?php

        }else{
                    $get_data = mysqli_query($conn, "SELECT * FROM emp WHERE username='$user' AND freeze=''");
                    $get_row = mysqli_fetch_assoc($get_data);
                    $get_e_id = $get_row['e_id'];

                    $get_menu = mysqli_query($conn, "SELECT * FROM e_menu WHERE e_id='$get_e_id' AND status='1' ");
                    while($result_menu=mysqli_fetch_assoc($get_menu)){
                                $menu_name=$result_menu['menu_name'];
                
        ?>
        
     

        <?php if($menu_name=='hr'){ ?>
          <li class="<?php if($page=="hr"){ echo 'active' ;} ?>">
                    <a href="#hrSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-users"></i>
                        <span>Human Resource</span>
                    </a>
                    <ul class="collapse list-unstyled" id="hrSubmenu" style="font-size: 14px;">
                      <li>
                          <a href="e_attendance.php"><i class="fa fa-calendar-day"></i> Attendance </a>
                      </li>
                      <li>
                          <a href="e_reg.php"><i class="fa fa-registered"></i> Registration </a>
                      </li>
                        <li>
                            <a href="e_list.php"><i class="fa fa-users"></i> Employees</a>
                        </li>

                        <li>
                            <a href="e_leave.php"><i class="fa fa-file"></i> Leave </a>
                        </li>
                      <li>
                            <a href="e_leave_check.php"><i class="fa fa-check"></i> Leave Check</a>
                        </li>

                        <li>
                            <a href="salary.php"><i class="fas fa-hand-holding-usd"></i> Salary </a>
                        </li>
                        <li>
                            <a href="raw_data.php"><i class="fa fa-file-excel"></i> Raw Data </a>
                        </li>
                        <li>
                            <a href="payroll.php"><i class="fa fa-file-excel"></i> Pay Roll</a>
                        </li>
                        <li>
                          <a href="payslip.php"> <i class="fa fa-receipt"></i> Pay Slip </a>
                        </li>
                        <li>
                          <a href="salary_report.php"> <i class="fa fa-file-invoice-dollar"></i> Salary Report</a>
                        </li>
                        <li>
                            <a href="hr_setting.php"><i class="fa fa-tools"></i> Setting </a>
                        </li>
                    </ul>
                </li>
        <?php }//hr // ?>

        <?php if($menu_name=='account'){ ?>   
                   <li class="<?php if($page=="account"){ echo 'active' ;} ?>">
            <a href="#accountSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-university"></i>
                <span>Account</span>
            </a>
            <ul class="collapse list-unstyled" id="accountSubmenu" style="font-size: 14px;">
                <li>
                    <a href="deposit.php"><i class="fa fa-funnel-dollar"></i> Daily Deposit</a>
                </li>
                <li>
                  <a href="expense.php"><i class="fa fa-shopping-cart"></i> Daily Expense</a>
                </li>
                <li>
                  <a href="unpaid.php"><i class="fab fa-creative-commons-nc"></i> Unpaid List </a>
                </li>
                <li>
                  <a href="daily_report.php"><i class="fa fa-funnel-dollar"></i> Daily Report</a>
                </li>
                <li>
                  <a href="monthly_report.php"><i class="fa fa-calendar"></i> Monthly Report</a>
                </li>

            </ul>
        </li>
            <?php } ?>
            <?php if($menu_name=='store'){ ?>
               <li class="<?php if($page=="store"){ echo 'active' ;} ?>">
                    <a href="#storeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-warehouse"></i>
                        <span>Store</span>
                    </a>
                    <ul class="collapse list-unstyled" id="storeSubmenu" style="font-size: 14px;">
                        <li>
                            <a href="instock.php"><i class="fa fa-tools"></i> (In) Stock </a>
                        </li>
                        <li>
                            <a href="outstock.php"><i class="fa fa-tools"></i> (Out) Stock </a>
                        </li>
                        <li>
                            <a href="stock.php"><i class="fa fa-warehouse"></i> Stock List </a>
                        </li>

                    </ul>
                </li>


            <?php } ?>
            <?php if($menu_name=="admin"){ ?>
            <li class="<?php if($page=='admin'){echo 'active';} ?>">
                   <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-tools"></i>
                        <span>Adminstration</span>
                    </a>
                    <ul class="collapse list-unstyled" id="adminSubmenu" style="font-size: 14px;">
                        
                        <li>
                            <a href="hostel_setting.php"><i class="fa fa-home"></i> Hostel</a>
                        </li>
                        <li>
                            <a href="logo.php"><i class="fa fa-image"></i> Logo</a>
                        </li>
                        <li>
                            <a href="address.php"><i class="fa fa-home"></i> Address</a>
                        </li>
                        <li>
                            <a href="letter_head.php"><i class="fa fa-file-image"></i> Letter Head</a>
                        </li>
                        <li>
                            <a href="letter_foot.php"><i class="fa fa-file-image"></i> Letter Foot</a>
                        </li>
                        <li>
                            <a href="sms_setting.php"><i class="fa fa-envelope-square"></i> SMS Setting</a>
                        </li>
                        <li>
                            <a href="permission.php"><i class="fa fa-lock"></i> Permission </a>
                        </li>
                    </ul>
             </li>

         <?php } ?>

         <?php if($menu_name=='learn'){ ?>

             <li class="<?php if($page=='learn'){echo 'active';} ?>">
                   <a href="#learnSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-crown"></i>
                        <span>Learning</span>
                    </a>
                    <ul class="collapse list-unstyled" id="learnSubmenu" style="font-size: 14px;">
                         <li>
                            <a href="hostel.php"><i class="fa fa-home"></i> Hostel</a>
                        </li>
                        <li>
                            <a href="st_leave.php"><i class="fa fa-calendar-day"></i> Leave </a>
                        </li>
                     
                        <li>
                            <a href="st_row.php"><i class="fa fa-trophy"></i> Exam</a>
                        </li>

                    </ul>
             </li>
         <?php }?>

         <?php if($menu_name=='market'){ ?>

              <li class="<?php if($page=='market'){echo 'active';} ?>">
                   <a href="#marketSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-search-dollar"></i>
                        <span>Marketing</span>
                    </a>
                    <ul class="collapse list-unstyled" id="marketSubmenu" style="font-size: 14px;">
                        <li>
                            <a href="sms.php"><i class="fa fa-sms"></i>  SMS</a>
                        </li>
                        <li>
                            <a href="sms_send.php"><i class="fas fa-envelope-open-text"></i> SMS Send</a>
                        </li>
                        <li>
                            <a href="sms_status.php"><i class="fa fa-sync-alt"></i> SMS Status</a>
                        </li>
                    </ul>
             </li>

         <?php } ?>

   <?php  if($menu_name=='fo'){ ?>

        <li class="<?php if($page=="fo"){ echo 'active' ;} ?>">
            <a href="#foSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-th-large"></i>
                <span>Front Office</span>
            </a>
            <ul class="collapse list-unstyled" id="foSubmenu" style="font-size: 14px;">
                <li>
                    <a href="st_reg.php"><i class="fa fa-user"></i> Register </a>
                </li>
                <li>
                  <a href="rows.php"><i class="fa fa-wallet"></i> Fees </a>
                </li>
                <li>
                    <a href="st_list.php"><i class="fa fa-child"></i> Student</a>
                </li>
                <li>
                    <a href="invoice.php"><i class="fa fa-funnel-dollar"></i> Invoice</a>
                </li>
            </ul>
        </li>

        <?php } ?>


    <?php } }//get data and menu // ?>

                
                

            
</nav><!--  Sidebar End -->
