<?php get_header('Single Task','admin admin-single-task'); ?>
        <div class="page-container">
			<?php get_navbar($user_role); ?>
			<!-- PAGE CONTENT -->
            <div class="page-content">        
                <!-- START X-NAVIGATION VERTICAL -->
				<?php get_topbar(); ?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- START BREADCRUMB -->
                <?php get_breadcrumbs('Assign Single Task'); ?>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                     
					<?php page_title("fa-list-ol"," Assign Single Task"); ?>	
						<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-title-box">
										<h3>Assign Single Task</h3>
										<span>Fill out the fields to add new task</span>
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
								<div class="panel-body form-group-separated">
									<div class="row">
										<div class="col-md-12">
											<form class="form-horizontal" action="<?=base_url('admin/edit/process/assign-single-task'); ?>" method="POST">
													<br>	
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
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Project</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-area-chart"></span></span>
																<select name="drpProject" class="form-control" required>
																	<option selected disabled>--SELECT PROJECT--</option>
																	<?php
																		foreach($projects as $row){
																			echo  '<option value="'.$row->ProjectID.'">'.$row->ProjectName.'</option>';
																		}
																	?>
																</select>
															</div>                                            
														</div>
													</div>															
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label" >Task Name</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																<input type="text" class="form-control" name="txtTaskName" required>
															</div>                                            
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Task Description</label>
														<div class="col-md-6 col-xs-12">                                            
															<textarea class="form-control" name="txtTaskDesc" rows="5"></textarea>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Priority Level</label>
														<div class="col-md-6 col-xs-12">  
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-warning"></span></span>														
																<select name="drpPrio" class="form-control" required>
																	<option value="low">Low</option>
																	<option value="medium">Medium</option>
																	<option value="high">High</option>
																</select>
															</div>  
														</div>
													</div>													
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Expected Hours</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
																<input type="number" class="form-control"  value="8" name="txtExpected" required step="0.1" />
															</div>                                            
														</div>
													</div>
											
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Task Category</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-list"></span></span>
																<select onchange="return getSubCatViaCatID(this.value)" id="drpCat" name="drpCat" class="form-control" required>
																	<?php
																		foreach($category as $row){
																			echo '<option value="'.$row->CategoryID.'">'.$row->CategoryName.'</option>';
																		}
																	?>
																</select>
															</div>                                            
														</div>
													</div>		
													<div id="sub-cat-ajax"></div>
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Assign To</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-user"></span></span>
																<select name="drpDev" class="form-control" >
																	<?php
																		foreach($users as $row){
																			echo'<option value="'.$row->PersonalInfoID.'">'.$row->FName.' '.$row->LName.'</option>';
																		}
																	?>
																</select>
															</div>                                            
														</div>
													</div>
													<div class="narrow-grid ">
														<button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
													</div>
											</form>
										</div>
									</div>												
								</div>
							</div>
				
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
			
        </div>
<?php get_footer(); ?>