<?php get_header('Tasks','admin admin-load-task'); ?>
        <div class="page-container">
			<?php get_navbar($user_role); ?>	
			<!-- PAGE CONTENT -->
            <div class="page-content">        
                <!-- START X-NAVIGATION VERTICAL -->
				<?php get_topbar(); ?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- START BREADCRUMB -->
                <?php get_breadcrumbs("Tasks"); ?>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                     
					<?php page_title("fa-university"," Tasks"); ?>		
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-title-box">
										<h3>Task</h3>
										<span>View task details here.</span>
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
											<form class="form-horizontal" action="<?=base_url('admin/edit/process/edit-task');?>" method="POST" >
												<input value="<?=$task[0]->TaskID;?>" type="hidden" class="form-control" name="hdID" >
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
														if($task[0]->PriorityLevel == "low"){
															$priority = "success";
														}else if($task[0]->PriorityLevel == "medium"){
															$priority = "warning";
														}else{
															$priority = "danger";
														}
													?>		
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Task ID#</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-key"></span></span>
																<input value="<?=$task[0]->TaskID;?>" type="text" class="form-control" name="txtTaskID" readonly>
															</div>                                            
														</div>
													</div>		
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Project</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-area-chart"></span></span>
																<input value="<?=$task[0]->ProjectName;?>" type="text" class="form-control" name="txtTaskID" disabled>
															</div>                                            
														</div>
													</div>														
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label"><div class="label label-<?=$priority;?>"><?=$task[0]->PriorityLevel;?></div> Task Name</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																<input value="<?=$task[0]->TaskName;?>" type="text" class="form-control" name="txtTaskName" >
															</div>                                            
														</div>
													</div>
													<div class="form-group">                                        
														<label class="col-md-3 col-xs-12 control-label">Task Description</label>
														<div class="col-md-6 col-xs-12">                                            
															<textarea value="<?=$task[0]->TaskDesc;?>" class="form-control" name="txtTaskDesc" rows="15"><?=$task[0]->TaskDesc;?></textarea>
														</div>
													</div>			
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Resources</label>
														<div class="col-md-6 col-xs-12">                                            
															<ul>
																<?php 
																	foreach($dev as $row){
																		echo '<li>'.$row->FName.' '.$row->LName.'</li>';
																	}
																?>
															</ul>
															<div id="add-developer-container" class="hide">
																<br/>
																<label><b>Hold CTR + Click to select multiple values</b></label>
																<select name="developers[]" class="form-control" multiple >
																	<?php
																		foreach($developers as $row){
																			echo '<option value="'.$row->PersonalInfoID.'">'.$row->FName.' '.$row->LName.'</option>';
																		}
																	?>
																</select>
															</div><br/>
															<button id="add-developer" type="button" class="btn btn-danger"><i class="fa fa-plus"></i> Add Other Developer</button>
														</div>
													</div>	
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Assigned Date</label>
														<div class="col-md-6 col-xs-12">                                            
															<p><b><?=system_date_format($assigned_date[0]->AssignedDate);?></b></p>
														</div>
													</div>		
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Hours (EST)</label>
														<div class="col-md-6 col-xs-12">                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
																<input value="<?=$task[0]->ExpectedHour;?>" type="number" class="form-control" name="txtExpectedHour" >
															</div> 														
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Total Hours Rendered</label>
														<div class="col-md-6 col-xs-12">                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
																<input value="<?php if($total_hours[0]->TotalHours != null){ echo $total_hours[0]->TotalHours; }else{ echo "0"; }?> " type="text" class="form-control" disabled >
															</div> 														
														</div>
													</div>		
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Progress</label>
														<div class="col-md-6 col-xs-12">                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
																<input value="<?=$task[0]->TaskPercentage?>" type="number" max="100" min="0" class="form-control"  name="txtProgress" />
															</div> 														
														</div>
													</div>	
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Priority Level</label>
														<div class="col-md-6 col-xs-12">                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-warning"></span></span>
																<select name="drpPrio" class="form-control">
																	<option value="low" <?php if($task[0]->PriorityLevel == "low") echo "selected";?> >Low</option>
																	<option value="medium" <?php if($task[0]->PriorityLevel == "medium") echo "selected";?> >Medium</option>
																	<option value="high" <?php if($task[0]->PriorityLevel == "high") echo "selected";?> >High</option>
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