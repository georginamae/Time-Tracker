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
							<a href="<?php echo base_url('admin'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
						</li>  
						
						<li <?php if($selected=='profile'){ echo 'class="active"';} ?>>
							<a href="<?php echo base_url('admin/view/profile'); ?>"><span class="fa fa-user"></span> <span class="xn-text">Profile</span></a>                        
						</li> 	
						
						<li class="xn-openable <?php if($openable=='users'){ echo 'active';} ?>">
							<a href=""><span class="fa fa-users"></span> <span class="xn-text">Users</span></a>     
							<ul>
								<li <?php if($selected=='add-user'){ echo 'class="active"';} ?> ><a href="<?=base_url('admin/view/add-user'); ?>"><span class="fa fa-user-plus"></span> Add User</a></li>
								<li <?php if($selected=='view-users'){ echo 'class="active"';} ?> ><a href="<?=base_url('admin/view/users'); ?>"><span class="fa fa-search"></span> View Users</a></li>
								<li <?php if($selected=='deactivated-users'){ echo 'class="active"';} ?> ><a href="<?=base_url('admin/view/deactivated-users'); ?>"><span class="fa fa-trash-o"></span>Deactivated Users</a></li>

							</ul>
						</li>	
						
						<li class="xn-openable <?php if($openable=='departments'){ echo 'active';} ?>">
							<a href=""><span class="fa fa-briefcase"></span> <span class="xn-text">Departments</span></a>     
							<ul>
								<li <?php if($selected=='add-department'){ echo 'class="active"';} ?> ><a href="<?=base_url('admin/view/add-department'); ?>"><span class="fa fa-plus"></span> Add Department</a></li>
								<li <?php if($selected=='view-departments'){ echo 'class="active"';} ?> ><a href="<?=base_url('admin/view/departments'); ?>"><span class="fa fa-search"></span> View Departments</a></li>
								<li <?php if($selected=='deactivated-departments'){ echo 'class="active"';} ?> ><a href="<?=base_url('admin/view/deactivated-departments'); ?>"><span class="fa fa-trash-o"></span>Deleted Departments</a></li>
							</ul>
						</li>
						
						<li class="xn-openable <?php if($openable=='companies'){ echo 'active';} ?>">
							<a href=""><span class="fa fa-university"></span> <span class="xn-text">Companies</span></a>     
							<ul>
								<li <?php if($selected=='add-company'){ echo 'class="active"';} ?> ><a href="<?=base_url('admin/view/add-company'); ?>"><span class="fa fa-plus"></span>Add Company</a></li>
								<li <?php if($selected=='view-companies'){ echo 'class="active"';} ?> ><a href="<?=base_url('admin/view/companies'); ?>"><span class="fa fa-search"></span>View Companies</a></li>
								<li <?php if($selected=='deleted-companies'){ echo 'class="active"';} ?> ><a href="<?=base_url('admin/view/deleted-companies'); ?>"><span class="fa fa-trash-o"></span>Deleted Companies</a></li>
							</ul>
						</li>
						
						<li class="xn-openable <?php if($openable=='tasks'){ echo 'active';} ?>">
							<a href="#"><span class="fa fa-list-alt"></span> <span class="xn-text">Tasks</span></a>     
							<ul>
								<li <?php if($selected=='single-task'){ echo 'class="active"';} ?> ><a href="<?=base_url('admin/view/single-task');?>"><span class="fa fa-list-ol"></span>Assign Single task</a></li>
								<li <?php if($selected=='joint-task'){ echo 'class="active"';} ?> ><a href="<?=base_url('admin/view/joint-task');?>"><span class="fa fa-sitemap"></span>Assign Joint task</a></li>
								<li <?php if($selected=='pending-task'){ echo 'class="active"';} ?> ><a href="<?=base_url('admin/view/pending-task');?>"><span class="fa fa-hourglass-end"></span> Pending Task</a></li>
								<li <?php if($selected=='filter-tasks'){ echo 'class="active"';} ?> ><a href="<?=base_url('admin/view/filter-tasks');?>"><span class="fa fa-filter"></span> Filter Task</a></li>
							</ul>
						</li>
					
						<li class="xn-openable <?php if($openable=='projects'){ echo 'active';} ?>">
							<a href="#"><span class="fa fa-area-chart"></span> <span class="xn-text">Projects</span></a>     
							<ul>
								<li <?php if($selected=='add-project'){ echo 'class="active"';} ?> ><a href="<?=base_url('admin/view/add-project');?>"><span class="fa fa-plus"></span>Add Project</a></li>
								<li <?php if($selected=='view-projects'){ echo 'class="active"';} ?> ><a href="<?=base_url('admin/view/projects');?>"><span class="fa fa-search"></span>View Projects</a></li>
								<li <?php if($selected=='deleted-projects'){ echo 'class="active"';} ?> ><a href="<?=base_url('admin/view/deactivated-projects');?>"><span class="fa fa-trash-o"></span>Deleted Projects</a></li>
							</ul>
						</li>
						<li <?php if($selected=='timesheet'){ echo 'class="active"';} ?>>
							<a href="<?php echo base_url('admin/view/timesheet'); ?>"><span class="fa fa-calendar"></span> <span class="xn-text">Timesheet</span></a>                        
						</li>  					
						<!--
						<li class="xn-openable <?php if($openable=='reports'){ echo 'active';} ?>">
							<a href="#"><span class="fa fa-th-list"></span> <span class="xn-text">Reports</span></a>     
							<ul>
								<li <?php if($selected=='timesheet'){ echo 'class="active"';} ?> ><a href=""><span class="fa fa-calendar"></span>Timesheet</a></li>
								<li <?php if($selected=='invoice'){ echo 'class="active"';} ?> ><a href=""><span class="fa fa-usd"></span>Invoice</a></li>
							</ul>
						</li>	
						-->
						<li <?php if($selected=='rate'){ echo 'class="active"';} ?>>
							<a href="<?php echo base_url('admin/view/rates'); ?>"><span class="fa fa-clock-o"></span> <span class="xn-text">Hourly Rate</span></a>                        
						</li>  	
						<li>
							<a href="<?=base_url('admin/backup/'.$_SERVER["REQUEST_URI"].'');?>"><span class="fa fa-cloud-download"></span> <span class="xn-text">Database Backup</span></a>                        
						</li>  								
						<li <?php if($selected=='settings'){ echo 'class="active"';} ?>>
							<a href="<?php echo base_url('admin/view/settings'); ?>"><span class="fa fa-cog"></span> <span class="xn-text">System Settings</span></a>                        
						</li> 
					
						<li>
							<a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> <span class="xn-text">Sign-out</span></a>                        
						</li> 	
                  
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->