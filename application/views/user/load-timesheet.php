<?php get_header("View Time Entry",'admin admin-view-time-entry'); ?>
        <div class="page-container">
			<?php get_navbar($user_role); ?>		
			<!-- PAGE CONTENT -->
            <div class="page-content">        
                <!-- START X-NAVIGATION VERTICAL -->
				<?php get_topbar(); ?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- START BREADCRUMB -->
                <?php get_breadcrumbs("Timesheet"); ?>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                     
					<?php page_title("fa-calendar"," View Timesheet"); ?>		
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-title-box">
										<h3>View Time sheet</h3>
										<span>View the submitted time</span>
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
								<div class="panel-body form-group-separated form-horizontal">
									<div class="row">
										<div class="col-md-12">
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
														<label class="col-md-3 col-xs-12 control-label">Date Submitted</label>
														<div class="col-md-9 col-xs-12">                                            
															<div class="input-group">
																<p><?=system_date_format($timesheet[0]->DateInputted);?></p>
															</div>                                            
														</div>
													</div>		
												
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Project</label>
														<div class="col-md-9 col-xs-12">                                            
															<div class="input-group">
																<p><a href="<?=base_url('admin/load/project/'.$timesheet[0]->ProjectID.'');?>"><?=$timesheet[0]->ProjectName;?></a></p>
															</div>                                            
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Taskname</label>
														<div class="col-md-9 col-xs-12">                                            
															<div class="input-group">
																<p><a href="<?=base_url('admin/load/tasks/'.$timesheet[0]->TaskID.'');?>"><?=$timesheet[0]->TaskName;?></a></p>
															</div>                                            
														</div>
													</div>		
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Total Hours Submitted</label>
														<div class="col-md-9 col-xs-12">                                            
															<div class="input-group">
																<p><?=$timesheet[0]->RenderedHours;?></p>
															</div>                                            
														</div>
													</div>		
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Submitted By</label>
														<div class="col-md-9 col-xs-12">                                            
															<div class="input-group">
																<p><?=$timesheet[0]->FName;?> <?=$timesheet[0]->LName;?></p>
															</div>                                            
														</div>
													</div>		
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Attached Message</label>
														<div class="col-md-9 col-xs-12">                                            
															<div class="input-group">
																<p><?=$timesheet[0]->TaskComment;?></p>
															</div>                                            
														</div>
													</div>	
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Progress</label>
														<div class="col-md-6 col-xs-12">                            

																<div class="progress">
																	<div class="progress-bar progress-bar-striped progress-bar-success " role="progressbar" aria-valuenow="<?=$timesheet[0]->TaskPercentage?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$timesheet[0]->TaskPercentage?>%"><?=$timesheet[0]->TaskPercentage?>% Complete</div>
																</div>
																												
														</div>
													</div>														
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