<?php

    include_once "includes/header.php";
    $page = "store";
    session_start();
    if(isset($_SESSION['username'])){
        $user=$_SESSION['username'];
    }
    else{
        $user="";
    }

    if($user){

    }
    else{
        header("location:logout.php");
    }
    $token = md5(rand(1, 1000).time());
    setcookie("csrf", $token);
    
?>


<script src="assets/js/bootstrap.min.js"></script>
<link href="assets/css/bootstrap.css" rel="stylesheet" />

<script src="store/stock.js" charset="utf-8"></script>

<div class="wrapper">

   <!-- .content -->
        <div class="content mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header row ml-1 mr-1" >
                                                   <strong><i class="fa fa-warehouse"></i> Check Stock List</strong> 
                                                    <a href="instock.php" class="ml-auto"><button class="btn btn-primary btn-sm" style="border-radius: 2px;box-shadow: 0 0 3px gray;">
                                                      <i class="fa fa-plus-circle"></i> Add New </button>
                                                    </a>
                                                </div>
                            <div class="card-body">
                                <table id="st_list" class="table table-striped table-bordered" style="font-size: 14px;">
                                    <thead>
                                        <tr>
                                            <th class="text-info text-right" style="width: 20px;">No</th>
                                            <th class="text-info">Purc Date</th>
                                            <th class="text-info">Item</th>
                                            <th class="text-info">In Qut</th>
                                            <th class="text-info">Remark</th>
                                            <th class="text-info">Coast(MMK)</th>
                                            <th class="text-info">Asign</th>
                                            <th class="text-info">In Date</th>
                                            <th class="text-info">Out Qut</th>
                                            <th class="text-info">Refer To</th>
                                            <th class="text-info">Out Asign</th>
                                            <th class="text-info">Out Date</th>
                                            <th class="text-info">Balance</th>
                                            <th class="text-center text-info" style="width: 40px;">IN</th>
                                            <th class="text-center text-info" style="width: 40px;">OUT</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div><!-- card body end -->
                                                        <div class="card-footer text-center">
                                                            <p class="text-danger">သတိပြုရန်။ ။ပစည်းအသစ်များ ၊ ဈေးနှုန်းမတူ သော် ပစည်းများ ထည့်သွင်းလိုလျင် New Instocks မှာ ထည့်သွင်းပေးရမည်။</p>
                                                        </div>
                        </div><!-- card end -->

                    </div>
                </div>
        </div>
        <!-- .content -->
</div><!-- wrapper end -->


    


<?php include_once "includes/footer.php" ?>

<!-- instock Modal Begin -->
<div class="modal fade" id="add_data_Modal2" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="mediumModalLabel"> <i class="fa fa-plus-circle"></i> Input Stock </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>

                <div class="modal-body">
                    <form action="store/instock_add.php" method="post">
                       <input type="hidden" name="token" value="<?= $token ?>">
                        <div class="form-group">
                            <div class="input-group">
                                                            <label for="item">Item</label>
                                <input type="text" id="item" class="form-control" name="item"  autocomplete="off"  style="color:blue;" readonly>
                            </div>
                        </div>
                                                <div class="form-group">
                            <div class="input-group">
                                                            <label for="new_date">Purchase Date</label>
                                <input type="date" id="new_date" class="form-control" name="new_date" required autocomplete="off"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                                            <label for="balance">Instocks Quantity</label>
                                <input type="text" id="balance" class="form-control" name="balance"  autocomplete="off" style="color:blue;" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="quantity" class="form-control" name="quantity" required autocomplete="off" style="color:blue;" placeholder="New Quantity">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="remark" rows="3" cols="55" id="remark" autocomplete="off" placeholder="Detail Description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" id="price" class="form-control" name="price" required autocomplete="off" required style="color:blue;" placeholder="Total Price">
                            </div>
                        </div>


                                                <div class="form-group">
                                                        <div class="input-group">
                                                            <label for="new_balance">New Instocks Quantity</label>
                                                                <input type="text" id="new_balance" class="form-control" name="new_balance" readonly autocomplete="off" required style="color:blue;">
                                                        </div>
                                                </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;">Cancel</button>
                            <button name="add" id="add" class="btn btn-primary" style="border-radius: 5px;"><i class="fas fa-pencil-alt"></i> Submit</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div> <!-- instock Modal End -->

<!-- outstock Modal Begin -->
<div class="modal fade" id="out_Modal2" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="mediumModalLabel"><i class="fa fa-minus-circle"></i> Out Stock </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>

                <div class="modal-body">
                    <form action="store/outstock_add.php" method="post">
                        <input type="hidden" name="token" value="<?= $token ?>">
                        <div class="form-group">
                            <div class="input-group">
                                                            <label for="item_name">Item</label>
                                <input type="text" id="item_name" class="form-control" name="item_name"  autocomplete="off"  style="color:blue;" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                                            <label for="balance">Instocks Quantity</label>
                                <input type="text" id="o_balance" class="form-control" name="balance"  autocomplete="off" style="color:blue;" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="out_quantity" class="form-control" name="out_quantity" required autocomplete="off" style="color:blue;" placeholder="Out Quantity">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <select class="form-control" name="refer_to">
                                    <option value="">Select Employee</option>
                                                                    <?php
                                                                        $get_e = mysqli_query($conn, "SELECT * FROM emp");
                                                                        while($row = mysqli_fetch_assoc($get_e)):
                                                                     ?>
                                                                     <option value="<?php echo $row['e_name'] ?>">
                                                                            <?php echo $row['e_name'] ?> / <?php echo $row['dept_name'] ?>
                                                                     </option>
                                                                 <?php endwhile; ?>
                                </select>
                            </div>
                        </div>


                                                <div class="form-group">
                                                        <div class="input-group">
                                                            <label for="new_balance">New Instocks Quantity</label>
                                                                <input type="text" id="out_new_balance" class="form-control" name="out_new_balance" readonly autocomplete="off" required style="color:blue;">
                                                        </div>
                                                </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;">Cancel</button>
                            <button name="add" id="add" class="btn btn-primary" style="border-radius: 5px;"><i class="fas fa-pencil-alt"></i> Submit</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div> <!-- outstock Modal End -->

<!-- calculate the instocks balance and new instocks -->
<script type="text/javascript">
  $(function () {
    $("#balance, #quantity").keyup(function () {
      $("#new_balance").val(+$("#balance").val() + +$("#quantity").val());
    });
  });
</script>

<!-- calculate the outstocks balance and new instocks -->
<script type="text/javascript">
  $(function () {
    $("#o_balance, #out_quantity").keyup(function () {
      $("#out_new_balance").val(+$("#o_balance").val() - +$("#out_quantity").val());
    });
  });
</script>

