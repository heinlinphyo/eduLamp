<?php include_once "includes/header.php";

	$page="market";

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
    setcookie("csrf",$token);

?>


<script src="vendor/sms_counter/sms_counter.js"></script>

<style>
	.sms-counter li{
  	float: left; 
  }
</style>
	<div class="wrapper">
        <?php
            include_once('includes/sidebar.php');
            include_once('includes/navbar.php');
        ?>
        <!-- .content -->
        <div class="content mt-3">
     
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header row ml-1 mr-1">
                                <strong class="card-title"><i class="fas fa-envelope-open-text"></i> SMS Send</strong>
                              
                                <button class="btn btn-info btn-sm ml-auto " data-toggle="modal" data-target="#add_data_Modal" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fas fa-envelope"></i> Create SMS</button>
                            </div>
                            <div class="card-body">
                                <table  class="table table-striped table-bordered table-hover" style="font-size: 12px;">
                                    <thead>
                                        <tr>
                                            <th class="text-info text-right" style="width: 60px;">No</th>
                                             <th class="text-info text-center">Message</th>
                                            
                                             <th class="text-info">Send Type</th>
                                             <th class="text-info">Send Date</th>
                                            <th class="text-info">Send Time</th>                                        
                                            <th class="text-center text-info" style="width: 100px;" colspan="3">Action</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            $get_promotion=mysqli_query($conn,"SELECT * FROM sms_promotion WHERE status='' ORDER BY id DESC");
                                            while($result_promotion=mysqli_fetch_assoc($get_promotion)){
                                                    $row=mysqli_num_rows($get_promotion);
                                        ?>
                                        <tr>
                                            <td class="text-right align-middle" style="width: 60px;"><?php $no<$row; echo $no++; ?></td>
                                        
                                            <td class="align-middle"><?php echo $result_promotion['text_name'];  ?></td>
                                          
                                            <td class="align-middle"><?php echo $result_promotion['send_type'];  ?></td>
                                            
                                            
                                            <td class="align-middle text-center"><?php echo $result_promotion['send_date'];  ?></td>
                                            <td class="align-middle text-center"><?php echo $result_promotion['send_time'];  ?></td>
                                            


                                            <td class="align-middle text-center"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?php echo $result_promotion['id']; ?>" style="border-radius: 2px;box-shadow: 0 0 3px gray;width: 80px;"><i class="fa fa-edit"></i> Edit</button></td>

                                            <td class="align-middle text-center"><button class="btn btn-warning btn-sm" id="send<?php echo $result_promotion['id'];  ?>" style="border-radius: 2px;box-shadow: 0 0 3px gray;width: 80px;"><i class="fa fa-location-arrow"></i> Send</button><button class="btn btn-primary btn-sm" id="load<?php echo $result_promotion['id'];  ?>" style="border-radius:2px;box-shadow:0 0 3px gray;display:none;" type="button" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Wait</button></td>

                                            <td class="align-middle text-center"><button class="btn btn-danger btn-sm" id="draft<?php echo $result_promotion['id'];  ?>" style="border-radius: 2px;box-shadow: 0 0 3px gray;width: 100px;"><i class="fa fa-times-circle"></i> Delete</button></td>

                                        </tr>
                                        
                                        
                                        
                                        <script>
                                                    $('#draft<?php echo $result_promotion['id'];  ?>').on('click', (e) => {
                                                        Swal.fire({
                                                            title: 'ပယ်ဖျတ်ပါမည်။?',
                                                            text: 'အချက်အလက်များကို ပယ်ဖျက်လိုက်ပါက ဆုံးရှုံးနိုင်မှုရှိနိုင်ပါသည်။!',
                                                            type: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonText: '<a href="market/sms_del.php?id=<?php echo $result_promotion['id'];  ?> " class="text-white">သေချာသည်။</a>',
                                                            cancelButtonText: 'မသေချာသေးပါ။'
                                                        });
                                                });
                                                </script>
                                                
                                                <script>
                                                    $('#send<?php echo $result_promotion['id'];  ?>').on('click', (e) => {
                                                        Swal.fire({
                                                            title: 'သတိပေးချက်',
                                                            text:  'SMS ပေးပို့မှုအားဆက်လက်လုပ်ဆောင်လိုပါသလား။',
                                                            type: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonText: '<a href="market/sms_send.php?id=<?php echo $result_promotion['id'];  ?>" id="send_sms<?php echo $result_promotion['id'];  ?>" class="text-white">သေချာသည်။</a>',
                                                            cancelButtonText: 'မသေချာသေးပါ။'
                                                        });
                                                });
                                                </script>
                                                
                                        
                                            <script>
                                            $(function(){
                                                $('#send_sms<?php echo $result_promotion['id'];  ?>').on('click',function(){
                                                    $('#load<?php echo $result_promotion['id']; ?>').show();
                                                    $('#send<?php echo $result_promotion['id'];  ?>').hide();
                                            });
            
            

                                        });
                                 </script>
                                                
                                            
                                                
    <!-- Edit Modal-->
     <div class="modal fade" id="edit<?php echo $result_promotion['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel"><i class="fa fa-edit"></i> <?php echo $result_promotion['text_name']; ?> SMS Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                           
                    <div class="modal-body">
                      <form action="market/sms_update.php?id=<?php echo $result_promotion['id'];  ?>" method="post">
                        <input type="hidden" name="token" value="<?= $token ?>">
                        <div class="form-group">   
                                    <div class="input-group">
                                                <label class="mt-2 col-md-3">Message Name</label>
                                                <input type="text" class="form-control" name="text_name"   autocomplete="off" style="color:blue;" required  value="<?php echo $result_promotion['text_name']; ?>">
                                            
                                        </div>
                        </div>
                      
                      
                       <div class="form-group">   
                                    <div class="input-group">
                                                <label class="mt-2 col-md-3">Text</label>
                                                 <textarea name="text_desc" class="form-control" id="promotion_text<?php echo $result_promotion['id']; ?>" minlength="5" rows="5" cols="30" required><?php echo $result_promotion['text_desc']; ?></textarea>
                                                
                                            
                                        </div>
                        </div>
                        
                           <div class="form-group">   
                                    <div class="input-group">
                                             <label class="mt-2 col-md-3"></label>
                                                <ul id="sms-counter<?php echo $result_promotion['id']; ?>" class="sms-counter" style="list-style: none;">
                                                    
                                                    <li>Length: <span class="length"></span>, </li>
                                                    <li>Messages: <span class="messages"></span>, </li>
                                                    
                                                    <li>Remaining: <span class="remaining"></span>.</li>
                                                </ul>
                                     </div>
                        </div>
                        
                       
                        
                          <div class="form-group">   
                                    <div class="input-group">
                                                <label class="mt-2 col-md-3">Send Type</label>
                                                <select class="form-control" name="send_type" required>
                                                    <option value="<?php echo $result_promotion['send_type']; ?>"><?php echo $result_promotion['send_type']; ?></option>
                                                    <option value="Employee">Employee</option>
                                                    <option value="Student">Student</option>
                                                    <option value="Trainer">Trainer</option>
                                                    
                                                </select>
                                     </div>
                        </div>
                        

                
                           <div class="form-group">   
                                    <div class="input-group">
                                                <label class="mt-2 col-md-3">Send Date</label>
                                                <input type="date" name="send_date" class="form-control"   autocomplete="off" required value="<?php echo $result_promotion['send_date']; ?>"  >
                                     </div>
                        </div>
                        
                         <div class="form-group">   
                                    <div class="input-group">
                                                <label class="mt-2 col-md-3">Send Time</label>
                                                <input type="time" name="send_time" class="form-control"   autocomplete="off" required value="<?php echo $result_promotion['send_time']; ?>"  >
                                     </div>
                        </div>


                        
                         <div class="form-group">   
                                    <div class="input-group">
                                                <label class="mt-2 col-md-3"></label>
                                                <h6 style="color:red;">အချက်အလက်များအားပြည့်စုံစွာဖြည့်ပေးပါ။</h6>
                                     </div>
                        </div>
                        
                        
                
                    
                    </div>
                            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-times-circle"></i> Cancel</button>
                        <button name="update" class="btn btn-primary" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-edit"></i> Update</button>
                     </div>
                    </form>
            </div>
        </div>
     </div>
    <!-- Creat Modal-->
    
    <script>
        $('#promotion_text<?php echo $result_promotion['id']; ?>').countSms('#sms-counter<?php echo $result_promotion['id']; ?>');
    </script>
                                                
                                        
                                        <?php
                                            }
                                        ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            
                           <div id="loader-icon" style="display:none;"><img src="images/preview.gif" /></div>
        
        
                            
                            
                            
                        </div>
                    </div>


                </div>
            
            
    
        </div>
        <!-- .content -->

        <!-- New Modal-->
     <div class="modal fade" id="add_data_Modal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel"><i class="fas fa-envelope"></i> New SMS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                           
                    <div class="modal-body">
                     <form action="market/sms_save.php" method="post">
                        <input type="hidden" name="token" value="<?= $token ?>">
                        <div class="form-group">   
                                    <div class="input-group">
                                                <label class="mt-2 col-md-3">Message Name</label>
                                                <input type="text" name="text_name" id="text_name" class="form-control" autocomplete="off" style="color:blue;" required>
                                        </div>
                        </div>
                      
                      
                      <div class="form-group">   
                                    <div class="input-group">
                                    <label class="mt-2 col-md-3">Text</label>
                                       <textarea  class="form-control" name="text_desc" id="text_desc" placeholder="Text Message" minlength="5" rows="5" cols="30" required></textarea>
                                                
                                            
                                        </div>
                        </div>
                        
                    

                              <div class="form-group">   
                                    <div class="input-group">
                                             <label class="mt-2 col-md-3"></label>
                                                <ul id="sms-counter" class="sms-counter" style="list-style: none;">
                                                    
                                                    <li>Length: <span class="length"></span>, </li>
                                                    <li>Messages: <span class="messages"></span>, </li>
                                                    
                                                    <li>Remaining: <span class="remaining"></span>.</li>
                                                </ul>
                                     </div>
                        </div>
                        
                          <div class="form-group">   
                                    <div class="input-group">
                                                <label class="mt-2 col-md-3">Send Type</label>
                                                <select class="form-control" name="send_type" required id="send_type">
                                                    <option value="Employee">Employee</option>
                                                    <option value="Student">Student</option>
                                                    <option value="Trainer">Trainer</option>
                                                </select>
                                     </div>
                        </div>
                        
                       
                        
                        
                      
                
                           <div class="form-group">   
                                    <div class="input-group">
                                      <label class="mt-2 col-md-3">Send Date</label>
                                      <input type="date" class="form-control" id="send_date" name="send_date" autocomplete="off" required  >
                                     </div>
                        </div>
                        
                         <div class="form-group">   
                                    <div class="input-group">
                                      <label class="mt-2 col-md-3">Send Time</label>
                                        <input type="time" class="form-control" name="send_time" id="send_time" autocomplete="off" required  >
                                     </div>
                        </div>
                        
                        <div class="form-group">   
                                    <div class="input-group">
                                                <label class="mt-2 col-md-3"></label>
                                                <h6 style="color:red;">အချက်အလက်များအားပြည့်စုံစွာဖြည့်ပေးပါ။</h6>
                                     </div>
                        </div>
                        
                        
                
                    
                    </div>
                            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-times-circle"></i> Cancel</button>
                        <button  id="save_data" class="btn btn-primary" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-th-large"></i> Save</button>
                     </div>
                    </form>
            </div>
        </div>
     </div>
    <!-- Creat Modal-->
           <script>
       
        $('#text_desc').countSms('#sms-counter');
    </script>

    </div><!-- wrapper end -->
 


   <?php include_once "includes/footer.php"; ?>
