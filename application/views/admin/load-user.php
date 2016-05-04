<?php get_header($edit_user[0]->FName.' '.$edit_user[0]->LName,'admin admin-view-user'); ?>
        <div class="page-container">
			<?php get_navbar($user_role); ?>		
			<!-- PAGE CONTENT -->
            <div class="page-content">        
                <!-- START X-NAVIGATION VERTICAL -->
				<?php get_topbar(); ?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- START BREADCRUMB -->
                <?php get_breadcrumbs($edit_user[0]->FName.' '.$edit_user[0]->LName); ?>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                     
					<?php page_title("fa-user", $edit_user[0]->FName.' '.$edit_user[0]->LName); ?>		
					<div class=" grid">                        
                        <div class="unit w-1-3">
                            
                            <form action="<?php echo base_url('admin/edit/process/save-user-login'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data" >
							<input type="hidden" name="hdID"  value="<?php echo $edit_user[0]->PersonalInfoID;?>">
								<div class="panel panel-default">                                
									<div class="panel-body">
										<?php 
											if($this->session->flashdata('login')=='success'){ 
												echo'<div class="alert alert-success" role="alert">
														<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
														<strong>Success!</strong> Your changes has been saved.
													</div>';
											}else if($this->session->flashdata('login')=='error'){
												echo'<div class="alert alert-danger" role="alert">
														<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
														<strong>Ooops!</strong> Your changes can\'t been saved.
													</div>';
											}
										?>										
										<h3><?php echo $edit_user[0]->FName.' '.$edit_user[0]->LName; ?></h3>
										<p><?php echo $edit_user[0]->Role; ?></p>
										<div class="text-center" id="user_image">
											<?php if($edit_user[0]->DisplayPic!=null){ ?>
												<img src="<?php echo base_url('assets/img/user-uploads/'.$edit_user[0]->DisplayPic.''); ?>" class="img-thumbnail">
											<?php }else{ ?>
												<img src="http://www.placehold.it/210x210?text=No Image" class="img-thumbnail">
											<?php } ?>
										</div>                                    
									</div>
									<div class="panel-body form-group-separated">
										
										<div class="display-pic form-group">                                        
											<div class="col-md-12 ">
												<label>Change Photo:</label><input type="file" name="fileDP" id="fileDP"  />
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">#ID</label>
											<div class="col-md-9 col-xs-7">
												<input type="text" value="<?php echo $edit_user[0]->PersonalInfoID;?>" class="form-control" disabled="">
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">Username</label>
											<div class="col-md-9 col-xs-7">
												<input type="text" value="<?php echo $edit_user[0]->Username;?>" name="txtUsername" id="txtUsername"  class="form-control">
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">Password</label>
											<div class="col-md-9 col-xs-7">
												<input type="password" value="<?php echo $edit_user[0]->Password;?>" name="txtPassword" class="form-control">
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">E-mail</label>
											<div class="col-md-9 col-xs-7">
												<input type="text" value="<?php echo $edit_user[0]->EmailAddress;?>" name="txtEmail" class="form-control">
											</div>
										</div>
										
										<div class="form-group">                                        
											<div class="col-md-12 col-xs-12 pull-right">
												<button class="btn btn-success">Save</button>
											</div>
										</div>
										
									</div>
								</div>
                            </form>
                            
                        </div>
                        <div class="unit w-1-3">
                            
                            <form action="<?php echo base_url('admin/edit/process/save-user-profile'); ?>" method="post" class="form-horizontal">
							<input type="hidden" name="hdID"  value="<?php echo $edit_user[0]->PersonalInfoID;?>">
                            <div class="panel panel-default">
                                <div class="panel-body">
								<?php 
									if($this->session->flashdata('profile')=='success'){ 
										echo'<div class="alert alert-success" role="alert">
												<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
												<strong>Success!</strong> Your changes has been saved.
											</div>';
									}else if($this->session->flashdata('profile')=='error'){
										echo'<div class="alert alert-danger" role="alert">
												<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
												<strong>Ooops!</strong> Your changes can\'t been saved.
											</div>';
									}
								?>	
                                    <h3><span class="fa fa-pencil"></span> Profile</h3>
                                    <p>This information is confidential, and can only be accessed when logged in.</p>
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">First Name</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $edit_user[0]->FName; ?>" name="txtFname" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Middle Name</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $edit_user[0]->MName; ?>" name="txtMName" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Last Name</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $edit_user[0]->LName; ?>" name="txtLName" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Birthday</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="date" value="<?php echo $edit_user[0]->Birthday; ?>" name="txtBday" class="form-control">
                                        </div>
                                    </div>      
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Gender</label>
                                        <div class="col-md-9 col-xs-7">
											<label>Male:   </label> <input type="radio" name="rdGender" value="M" <?php if($edit_user[0]->Gender == "M"){ echo "checked"; } ?> />
											<label>Female: </label><input type="radio"  name="rdGender"value="F" <?php if($edit_user[0]->Gender == "F"){ echo "checked"; } ?>/ >
                                        </div>
                                    </div>   									
                                    <div class="form-group">
                                        <div class="col-md-12 col-xs-5">
                                            <button class="btn btn-success  pull-right">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            

                        </div>
                        
                        <div class="unit w-1-3">
						 <form action="<?php echo base_url('admin/edit/process/save-user-role'); ?>" method="post" class="form-horizontal">
						 <input type="hidden" name="hdID"  value="<?php echo $edit_user[0]->LoginID;?>">
                            <div class="panel panel-default form-horizontal">
                                <div class="panel-body">
								<?php 
									if($this->session->flashdata('role')=='success'){ 
										echo'<div class="alert alert-success" role="alert">
												<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
												<strong>Success!</strong> Your changes has been saved.
											</div>';
									}else if($this->session->flashdata('role')=='error'){
										echo'<div class="alert alert-danger" role="alert">
												<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
												<strong>Ooops!</strong> Your changes can\'t been saved.
											</div>';
									}
								?>	
                                    <h3><span class="fa fa-info-circle"></span> Quick Info</h3>
                                    <p>Some quick info about this user</p>
                                </div>
                                <div class="panel-body form-group-separated">                                    
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Date Registered</label>
                                        <div class="col-md-8 col-xs-7 line-height-30"><input type="text" value="<?php echo system_date_format($edit_user[0]->DateRegistered); ?>" name="txtDateRegistered" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">User Role</label>
                                        <div class="col-md-8 col-xs-7 line-height-30">										
											<select class="form-control" name="drpRole">
												<option value="admin" <?php if($edit_user[0]->Role == "admin"){ echo "selected"; }?>>Admin</option>
												<option value="user"  <?php if($edit_user[0]->Role == "user"){ echo "selected"; }?>>User</option>
											</select>
										</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Department</label>
                                        <div class="col-md-8 col-xs-7 line-height-30">										
											<select class="form-control" name="drpDepartment">
												<?php
													foreach($departments as $row){
															
														if($edit_user[0]->DepartmentID == $row->DepartmentID){
															$selected = "selected";
															echo '<option value="'.$row->DepartmentID.'" '.$selected.'>'.$row->DepartmentName.'</option>';
														}else{
															echo '<option value="'.$row->DepartmentID.'">'.$row->DepartmentName.'</option>';
														}
														
													}
												?>
											</select>
										</div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-xs-5">
                                            <button class="btn btn-success  pull-right">Save</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
						</form>
                       
                        
                    </div>
					
                    </div>			
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
			
        </div>
<?php get_footer(); ?>