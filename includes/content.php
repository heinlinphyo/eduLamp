<style>
    .card{
        border-radius: 6px;
        box-shadow: 0 2px 2px rgba(204, 197, 185, 0.5);
        background-color: #FFFFFF;
        color: #252422;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
    }
    .card .content{
        padding: 15px 15px 10px 15px;
    }
    .icon-big{
        font-size: 1.5em;
        min-height: 64px;
    }
    .numbers{

        text-align: right;
    }
    .card p{
        margin: 0px;
    }
    .card .stats{
        color: #a9a9a9;
    }
    #profileSubmenu{
        margin-top: 3px;
    }
    #profileSubmenu li {
        padding: 5px;
    }
    #profileSubmenu li a {
        font-size: 13px;
        background: none !important;
    }
    #profileSubmenu li a:hover{
        color: blue;
    }
    p{ font-size: 13px;}
    .stats{ font-size: 11px; }


</style>
    
        <div class="content"><!-- content start -->
            <div class="container-fluid">

            <?php if($user=='admin'){  ?> 

                <div class="row"><!--row begin-->  
                    <div class="col-lg-3 col-sm-6">
                        <a href="st_reg.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-primary text-center">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                   
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p><strong>Registration</strong></p>
                                        </div>
                                    </div>

                                </div>
                                <a href="st_reg.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <a href="rows.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-success text-center">
                                        <i class="fa fa-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p> <strong>FeesCollection</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <a href="rows.php">
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <a href="invoice.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-danger text-center">
                                        <i class="fas fa-money-check-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p> <strong>Invoices</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="invoice.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <a href="st_list.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-info text-center">
                                        <i class="fas fa-id-badge"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p><strong>Students</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="st_list.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
                

               
                    <div class="col-lg-3 col-sm-6">
                        <a href="e_list.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-primary text-center">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p><strong>Employees</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="e_list.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <a href="e_leave.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-success text-center">
                                        <i class="fas fa-briefcase"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p> <strong>Emp Leave</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="e_leave.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                    <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <a href="salary.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-danger text-center">
                                        <i class="fas fa-hand-holding-usd"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p> <strong>Emp Salary</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="salary.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <a href="e_attendance.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-info text-center">
                                        <i class="fa fa-chart-line"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p><strong>Emp Attendance</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="teachers_view.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
           
                <div class="col-lg-3 col-sm-6">
                    <a href="raw_data.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-primary text-center">
                                        <i class="fas fa-file-excel"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p><strong>Raw Data</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="raw_data.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="payroll.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-success text-center">
                                        <i class="fas fa-tags"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p> <strong>PayRoll</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="payroll.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                    <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="payslip.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-danger text-center">
                                        <i class="fas fa-receipt"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p> <strong>PaySlip</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="payslip.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="salary_report.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-info text-center">
                                        <i class="fa fa-file-invoice-dollar"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p><strong>Salary Report</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="salary_report.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
            
                <div class="col-lg-3 col-sm-6">
                    <a href="e_reg.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-primary text-center">
                                        <i class="fas fa-registered"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p><strong>Emp Registration</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="e_reg.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="e_leave_check.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-success text-center">
                                        <i class="fas fa-file-word"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p> <strong>Check Leaves</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="e_leave_check.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                    <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="hr_setting.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-danger text-center">
                                        <i class="fas fa-tools"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p> <strong>HR Setting</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="hr_setting.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="payroll_check.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-info text-center">
                                        <i class="fa fa-file-invoice-dollar"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p><strong>Check PayRoll</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="payroll_check.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
             
                <div class="col-lg-3 col-sm-6">
                    <a href="deposit.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-primary text-center">
                                        <i class="fas fa-funnel-dollar"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p><strong>Daily Deposit</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="deposit.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="expense.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-success text-center">
                                        <i class="fas fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p> <strong>Daily Expense</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="expense.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                    <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="unpaid.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-danger text-center">
                                        <i class="fab fa-creative-commons-nc"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p> <strong>Unpaid List</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="unpaid.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="daily_report.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-info text-center">
                                        <i class="fa fa-file-archive"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p><strong>Daily Report</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="daily_report.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>

                <div class="col-lg-3 col-sm-6">
                    <a href="monthly_report.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-primary text-center">
                                        <i class="fas fa-file-archive"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p><strong>Monthly Report</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="monthly_report.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="expense.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-success text-center">
                                        <i class="fa fa-chart-pie"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p> <strong>Profit & Lost</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="expense.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                    <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
                   

                <div class="col-lg-3 col-sm-6">
                    <a href="instock.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-danger text-center">
                                        <i class="fas fa-tools"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p><strong>(In) Stock</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="instock.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="outstock.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-info text-center">
                                        <i class="fas fa-tools"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p> <strong>(Out) Stock</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="outstock.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                    <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="stock.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-primary text-center">
                                        <i class="fas fa-warehouse"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p> <strong>Stocks</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="stock.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-info text-center">
                                        <i class="fas fa-crown"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p> <strong>Classes</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="branch_view.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>
                </div><!-- row end -->
                <?php 
                // admin end //
                 }
                 else{
                    $get_data = mysqli_query($conn, "SELECT * FROM emp WHERE username='$user' AND freeze=''");
                    $get_row = mysqli_fetch_assoc($get_data);
                    $get_e_id = $get_row['e_id'];

                    $get_menu = mysqli_query($conn, "SELECT * FROM e_menu WHERE e_id='$get_e_id' AND status='1' ");
                    while($result_menu=mysqli_fetch_assoc($get_menu)){
                                $menu_name=$result_menu['menu_name'];
                
                ?>
                <?php if($menu_name=='fo'){ ?>
               
                <div class="row"><!--row begin-->  
                    <div class="col-lg-3 col-sm-6">
                        <a href="st_reg.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-primary text-center">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                   
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p><strong>Registration</strong></p> 
                                        </div>
                                    </div>

                                </div>
                                <a href="st_reg.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                                </a>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <a href="rows.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-success text-center">
                                        <i class="fa fa-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p> <strong>FeesCollection</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="rows.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                    <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="invoice.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-danger text-center">
                                        <i class="fas fa-money-check-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p> <strong>Invoices</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="invoice.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="st_list.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3">
                                        <div class="icon-big text-info text-center">
                                        <i class="fas fa-id-badge"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-sm-9">
                                        <div class="numbers">
                                            <p><strong>Students</strong></p>

                                        </div>
                                    </div>
                                </div>
                                <a href="st_list.php">
                                    <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fa fa-arrow-right"></i>  View
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </a>
                    </div>

                </div><!--row end-->

                 <?php } // fo end  ?>   


             <?php } } // else and while end ?>











































            </div><!-- container end -->
        </div><!-- content end -->


        <div class="footer text-center"><!-- footer begin -->
            <p>&copy; Copyright 2020. All right reserved.</p>
        </div><!-- footer end -->
