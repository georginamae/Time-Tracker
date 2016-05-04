		  <?php $name = $personal_info[0]->FName.' '.$personal_info[0]->LName; ?>
		  <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="<?=base_url();?>">PRIMEVIEW</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
								<?php if($dp[0]->DisplayPic != null ){ ?>
										<img src="<?php echo base_url('assets/img/user-uploads/'.$dp[0]->DisplayPic.''); ?>" alt="<?php echo $name; ?>" title="<?php echo $name; ?>" />
								<?php }else{ ?>
										<img src="http://placehold.it/200x200" alt="<?php echo $name; ?>" title="<?php echo $name; ?>" />
								<?php } ?>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
								<?php if($dp[0]->DisplayPic != null ){ ?>
										<img src="<?php echo base_url('assets/img/user-uploads/'.$dp[0]->DisplayPic.''); ?>" alt="<?php echo $name; ?>" title="<?php echo $name; ?>" />
								<?php }else{ ?>
										<img src="http://placehold.it/200x200" alt="<?php echo $name; ?>" title="<?php echo $name; ?>" />
								<?php } ?>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $name; ?></div>
                                <div class="profile-data-title"><?php echo $this->session->userdata('role');?></div>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
					
						<li <?php if($selected=='dashboard'){ echo 'class="active"';} ?>>
							<a href="<?php echo base_url('user'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
						</li>  
						
						<li <?php if($selected=='profile'){ echo 'class="active"';} ?>>
							<a href="<?php echo base_url('user/view/profile'); ?>"><span class="fa fa-user"></span> <span class="xn-text">Profile</span></a>                        
						</li> 	
						
						<li class="xn-openable <?php if($openable=='tasks'){ echo 'active';} ?>">
							<a href="#"><span class="fa fa-list-alt"></span> <span class="xn-text">Tasks</span></a>    
							<?php if($pending_count[0]->cnt != 0){?><div class="informer informer-warning"><?=$pending_count[0]->cnt;?></div><?php } ?>						
							<ul>
								<li <?php if($selected=='pending-task'){ echo 'class="active"';} ?> >
									<a href="<?=base_url('user/view/pending-task');?>"><span class="fa fa-hourglass-end"></span> Pending Task</a>
									<?php if($pending_count[0]->cnt != 0){?><div class="informer informer-warning"><?=$pending_count[0]->cnt;?></div><?php } ?>		
									</li>
								<li <?php if($selected=='filter-task'){ echo 'class="active"';} ?> ><a href="<?=base_url('user/view/filter-task');?>"><span class="fa fa-filter"></span> Filter Task</a></li>
							</ul>
						</li>
						
						<li <?php if($selected=='timesheet'){ echo 'class="active"';} ?>>
							<a href="<?php echo base_url('user/view/timesheet'); ?>"><span class="fa fa-calendar"></span> <span class="xn-text">Timesheet</span></a>                        
						</li>  
								
						<li>
							<a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> <span class="xn-text">Sign-out</span></a>                        
						</li> 	
                  
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->