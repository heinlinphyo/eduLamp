<style type="text/css">
    #dropdown-toggle::after{ display: none !important; }
    #dropdown-menu{ left:  -120px !important; }
    .nav-link:hover{ color: green; }
</style>

<div id="article" class="article">
<nav class="navbar navbar-expand-lg navbar-light bg-light"><!-- nav start -->
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn_1 text-success">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdown-toggle">
                            <?php
                                if($user=="admin"){
                            ?>        
                            <img class="user-avatar rounded-circle" src="assets/images/profile.svg.png" alt="User Avatar" width="40px">
                            
                            <?php

                                }elseif($get_row['image']!=""){
                            ?>
                              <img class="user-avatar rounded-circle" src="hr/photos/<?php echo $get_row['image']; ?>" alt="User Avatar" width="40px">
                            <?php
                                }
                                else{
                            ?>
                            <img class="user-avatar rounded-circle" src="assets/images/profile.svg.png" alt="User Avatar" width="40px">
                            <?php
                                }
                            
                            ?>
                 
                        </a>

                        <div class="user-menu dropdown-menu" id="dropdown-menu">
                            <a class="nav-link" href="emp_profile.php"><i class="fa fa-user"></i> <?php echo $user; ?></a>
                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
</nav><!-- nav end -->
