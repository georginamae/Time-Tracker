<?php get_header("Add Project",'admin admin-add-project'); ?>
        <div class="page-container">
			<?php get_navbar($user_role); ?>		
			<!-- PAGE CONTENT -->
            <div class="page-content">        
                <!-- START X-NAVIGATION VERTICAL -->
				<?php get_topbar(); ?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- START BREADCRUMB -->
                <?php get_breadcrumbs("Add Project"); ?>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                     
					<?php page_title("fa-area-chart","Add Project"); ?>		
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-title-box">
										<h3>Add Project</h3>
										<span>Fill out the fields to add new Project</span>
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
											<form class="form-horizontal" action="<?=base_url('admin/edit/process/add-project');?>" method="POST" >
													<br/>
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
														<label class="col-md-3 col-xs-12 control-label">Project Title</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																<input type="text" class="form-control" name="txtProjectTitle" >
															</div>                                            
														</div>
													</div>
													
													<div class="form-group">                                        
														<label class="col-md-3 col-xs-12 control-label">Project Description</label>
														<div class="col-md-6 col-xs-12">                                            
															<textarea class="form-control" name="txtProjectDesc" rows="5"></textarea>
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Expected Hours</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
																<input type="number" class="form-control" name="txtExpected" >
															</div>                                            
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Deadline</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
																<input type="date" class="form-control" name="txtDeadline" min="<?php echo date('Y-m-d');?>">
															</div>                                            
														</div>
													</div>													
												
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Company / Client</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-globe"></span></span>
																<select name="drpCompany" class="form-control">
																	<option selected disabled>--SELECT COMPANY--</option>
																	<?php
																		foreach($company as $row){
																			echo '<option value="'.$row->CompanyID.'">'.$row->CompanyName.'</option>';
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