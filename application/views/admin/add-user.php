<?php get_header("Add New User",'admin admin-add-user'); ?>
        <div class="page-container">
			<?php get_navbar($user_role); ?>		
			<!-- PAGE CONTENT -->
            <div class="page-content">        
                <!-- START X-NAVIGATION VERTICAL -->
				<?php get_topbar(); ?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- START BREADCRUMB -->
                <?php get_breadcrumbs("Add User"); ?>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                     
					<?php page_title("fa-user"," Add User"); ?>		
					<div class="row">
                        <div class="col-md-12">
                            <!-- START WIZARD WITH SUBMIT BUTTON -->
						<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-title-box">
										<h3>Add a User</h3>
										<span>Add a user here using wizard.</span>
									</div>
									<ul class="panel-controls" style="margin-top: 2px;">
										<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>

										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
											<ul class="dropdown-menu">
												<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
												<li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
											</ul>                                        
										</li>                                        
									</ul>
								</div>						
                                <div class="panel-body">
								<?php 
									if($this->session->flashdata('resp')=='failed'){ 
									echo'<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
											<strong>Oh snap!</strong> Change a few things up and try submitting again.
										</div>';
									}else if($this->session->flashdata('resp')=='success'){ 
									echo'<div class="alert alert-success" role="alert">
											<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
											<strong>Success!</strong> your changes has been saved.
										</div>';
									}
								?>		
                                               
                                    <form method="POST" action="<?=base_url('admin/edit/process/add-user');?>" role="form" class="form-horizontal" id="smart-validate">
									<?php generateRandomString(40); ?>
                                                                 
                                       
                                     <div class="step" data-step="0">
									  <p for="step-1">Personal Information</p>
									  <p for="step-2">Login Information</p>
									  <p for="step-3">Submit</p>
									</div> 
									<br/>									
                                    <div class="stepContainer" >
											<div id="personal-info" class="content show" >   
													<div class="form-group">
														<label class="col-md-2 control-label">User key</label>
														<div class="col-md-10">
															<input type="text" value="<?=getRandomString();?>" class="form-control" name="txtKey"  readonly required/>
														</div>	
													</div>  
													<div class="form-group">
														<label class="col-md-2 control-label">Firstname</label>
														<div class="col-md-10">
															<input type="text" class="focus form-control" name="txtFName" required />
														</div>	
													</div>  
													<div class="form-group">
														<label class="col-md-2 control-label">Middlename</label>
														<div class="col-md-10">
															<input type="text" class="form-control" name="txtMName" required />
														</div>	
													</div>  
													<div class="form-group">
														<label class="col-md-2 control-label">Lastname</label>
														<div class="col-md-10">
															<input type="text" class="form-control" name="txtLName" required/>
														</div>	
													</div>  
													<div class="form-group">
														<label class="col-md-2 control-label">Department</label>
														<div class="col-md-10">
															<select class="form-control" name="drpDepartment"  >
																<option selected value="">--Select Department--</option>
																<?php
																	foreach($department as $row){
																		echo '<option value="'.$row->DepartmentID.'">'.$row->DepartmentName.'</option>';
																	}
																?>
															</select>
														</div>   
													</div> 													
													<div class="form-group">
														<label class="col-md-2 control-label">Email Address</label>
														<div class="col-md-10">
															<input type="email" class="form-control" name="txtEmail" required/>
														</div>	
													</div> 
													<div class="form-group">
														<label class="col-md-2 control-label">Birthday</label>
														<div class="col-md-10">
															<input type="date" class="form-control" name="txtBday"   />
														</div>	
													</div> 
													<div class="form-group">
														<label class="col-md-2 control-label">Gender</label>
														<div class="col-md-10">
															<select class="form-control" name="drpgender">
																<option selected value="">--Select Gender--</option>
																<option value="M">Male</option>
																<option value="F">Female</option>
															</select>
														</div>   
													</div>
													<div class="pull-right">
														<button id="userNext" class="btn btn-default" type="button">Next</button>
													</div>
												</div>
												
												<div id="login-info" class="content hide">
													<div class="form-group">
														<label class="col-md-2 control-label">Username</label>
														<div class="col-md-10">
															<input type="text" class="focus form-control" name="txtUsername" placeholder="" required/>
														</div>   
													</div>  
	 												<div class="form-group">
														<label class="col-md-2 control-label">Password</label>
														<div class="col-md-10">
															<input type="password" class="same-target form-control" name="txtPassword" id="txtPassword" placeholder="" required/>
														</div>   
													</div>                                                                      
	 												<div class="form-group">
														<label class="col-md-2 control-label">Confirm Password</label>
														<div class="col-md-10">
															<input  type="password" class="same-parent form-control" name="txtConfirm" id="txtConfirm" placeholder="" required/>
														</div>   
													</div> 
													<div class="form-group">
														<label class="col-md-2 control-label">System Role</label>
														<div class="col-md-10">
															<select class="form-control" name="drpRole">
																<option selected value="">--Select System Role--</option>
																<option value="admin">Admin</option>
																<option value="user">User</option>
															</select>
														</div>   
													</div>   
													<div class="row">
														<div class="col-xs-6">
															<div class="pull-left">
																<button id="userPrev" class="btn btn-default" type="button">Previous</button>
															</div>		
														</div>															
														<div class="col-xs-6">
															<div class="pull-right">
																<button id="userSubmit" class="btn btn-success" type="button">Submit</button>
															</div>		
														</div>
												
													</div>	
												</div>
											</div>
									
                                    </form>
                                </div>
                            </div>               
                            <!-- END WIZARD WITH SUBMIT BUTTON -->


                        </div>

                    </div>			
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
			
        </div>
<?php get_footer(); ?>