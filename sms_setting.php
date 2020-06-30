<?php include_once "includes/header.php";

  $page="admin";
    error_reporting(0);
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
?>

<div class="wrapper">
  <?php
    include_once('includes/sidebar.php');
    include_once('includes/navbar.php');
  ?>
  <!-- .content -->
        <div class="content mt-3">
          <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header row ml-1 mr-1">
                                <strong class="card-title">SMS API</strong>
                                <button class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#mediumModal" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-plus-circle"></i> Create</button>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size: 12px;">
                                    <thead>
                                        <tr>
                                            <th class="text-info text-right" style="width: 40px;">No</th>
                                            <th class="text-info">Sender Name</th>
                                            <th class="text-info">API Key</th>
                                            <th class="text-info">API Url</th>
                                            <th class="text-info">Message Url</th>
                                            <th class="text-info">Balance Url</th>
                                            <th class="text-info">Credit</th>
                                            <th class="text-center text-info" style="width: 100px;">Action</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no=1;
                                        $get_sms=mysqli_query($conn,"SELECT * FROM sms_api ");
                                        while($result_sms=mysqli_fetch_assoc($get_sms)){

                                        $token=$result_sms['api_key'];
                                        $api_url=$result_sms['balance_url'];
                                    
                                        // SMSPoh Authorization Token
                                        $ch = curl_init($api_url);
                                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                                        curl_setopt($ch, CURLOPT_POSTFIELDS);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                                              'Authorization: Bearer ' . $token,
                                              'Content-Type: application/json'
                                          ]);

                                        $result = curl_exec($ch);

                                        $array= json_decode($result,true);
                                        $sms_data=$array["data"];


                                          $row_sms=mysqli_num_rows($get_sms);
                                ?>
          <tr>
            <td class="text-right" style="width: 40px;"><?php $no<$row_sms; echo $no++; ?></td>
            <td><?php echo $result_sms['sender']; ?></td>
            <td style="word-break:break-all;"><?php echo md5($result_sms['api_key']); ?></td>
            <td style="word-break:break-all;"><?php echo md5($result_sms['api_url']); ?></td>
            <td style="word-break:break-all;"><?php echo md5($result_sms['message_url']); ?></td>
            <td style="word-break:break-all;"><?php echo md5($result_sms['balance_url']); ?></td>
            <td><?php echo $sms_data['credits']?></td>
            <td class="text-center" style="width: 120px;"><button class="btn btn-danger btn-sm" id="draft<?php echo $result_sms['id'];  ?>" style="border-radius: 2px;"><i class="fa fa-minus-circle"></i> Delete</button></td>
          </tr>
          
          <script>
                            $('#draft<?php echo $result_sms['id'];  ?>').on('click', (e) => {
                              Swal.fire({
                                title: 'ပယ်ဖျတ်ပါမည်။?',
                                text: 'အချက်အလက်များကို ပယ်ဖျက်လိုက်ပါက ဆုံးရှုံးနိုင်မှုရှိနိုင်ပါသည်။!',
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonText: '<a href="admin/sms_api_delete.php?id=<?php echo $result_sms['id'];  ?> " class="text-white">သေချာသည်။</a>',
                                cancelButtonText: 'မသေချာသေးပါ။',
                                showCloseButton:'true'
                            });
                        });
                          </script>
          
          <?php 
          }
                    ?>
                                    </tbody>
                                </table>
                            </div>
                            
                           
                            
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
          
    
        </div>
        <!-- .content -->
</div><!-- wrapper end -->
  
  
        
        
 

    
    <!-- Creat Modal-->
     <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">New SMS API</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                           
                    <div class="modal-body">
                      <form action="admin/sms_api.php" method="post">
                         <div class="form-group">   
                                  <div class="input-group">
                                       <label for="api_key" class="mt-1 col-md-1"><i class="fas fa-key"></i></label>
                                        <input type="text" placeholder="API KEY" class="form-control" name="api_key" autocomplete="off" required>
                                      </div>
                        </div>
                        
                         <div class="form-group">   
                                  <div class="input-group">
                                      <label for="sender_name" class="mt-1 col-md-1"><i class="far fa-copyright"></i></label>
                                              <input type="text" placeholder="Sender Name" class="form-control" name="sender_name" maxlength="11" minlength="4"  autocomplete="off" required>
                                      </div>
                        </div>
                        
                         <div class="form-group">   
                                  <div class="input-group">
                                      <label for="url" class="mt-1 col-md-1"><i class="fas fa-external-link-square-alt"></i></label>        
                                              <input type="text" placeholder="API URL" class="form-control" name="url" autocomplete="off" required>
                                      </div>
                        </div>
                        
                        <div class="form-group">   
                                  <div class="input-group">
                                        <label for="message_url" class="mt-1 col-md-1"><i class="fas fa-external-link-square-alt"></i></label>
                                              <input type="text" placeholder="Message Status URL" class="form-control" name="message_url" autocomplete="off" required>
                                      </div>
                        </div>
                        
                         <div class="form-group">   
                                  <div class="input-group">
                                    <label for="balance_url" class="mt-1 col-md-1"><i class="fas fa-external-link-square-alt"></i></label>
                                              <input type="text" placeholder="Balance URL" class="form-control" name="balance_url" autocomplete="off" required>
                                      </div>
                        </div>
                    
                    </div>
                            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;"><i class="fa fa-times-circle"></i> Cancel</button>
                        <button name="save" class="btn btn-primary" style="border-radius: 5px;"><i class="fa fa-check"></i> Save</button>
                     </div>
                    </form>
            </div>
        </div>
     </div>
    <!-- Creat Modal-->

   <?php include_once "includes/footer.php"; ?>
