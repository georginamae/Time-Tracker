<?php get_header("Edit Project",'admin admin-edit-project'); ?>
        <div class="page-container">
			<?php get_navbar($user_role); ?>		
			<!-- PAGE CONTENT -->
            <div class="page-content">        
                <!-- START X-NAVIGATION VERTICAL -->
				<?php get_topbar(); ?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- START BREADCRUMB -->
                <?php get_breadcrumbs("Edit Project"); ?>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                     
						<div class="row">
							<div class="col-md-6 pull-left">
								<?php page_title("fa-area-chart"," Edit Project"); ?>	
							</div>
							<div  align="right" class="col-md-6 ">
								<a href="#" data-box="#mb-taskhours" class="mb-control btn btn-xs btn-danger"><i class="fa fa-eye"></i> Show Hours Rendered</a>
							</div>						
						</div>	
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-title-box">
										<h3>Edit Project</h3>
										<span>Fill out the fields to edit Project</span>
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
										<div class="col-md-6">
											<form class="form-horizontal" action="<?=base_url('admin/edit/process/edit-project');?>" method="POST" >
												<input type="hidden" name="hdID" value="<?=$project[0]->ProjectID;?>" />
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
																<input type="text" value="<?=$project[0]->ProjectName;?>" class="form-control" name="txtProjectTitle" > 
															</div>                                            
														</div>
													</div>
													
													<div class="form-group">                                        
														<label class="col-md-3 col-xs-12 control-label">Project Description</label>
														<div class="col-md-6 col-xs-12">                                            
															<textarea class="form-control" name="txtProjectDesc" rows="5" value="<?=$project[0]->ProjectDesc;?>" ><?=$project[0]->ProjectDesc;?></textarea>
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Total Hours Rendered</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
																<input readonly type="number" class="form-control" value="<?php if($rendered[0]->total != null){ echo $rendered[0]->total; }else{ echo "0"; }?>" name="txtExpected" >
															</div>                                            
														</div>
													</div>	
													
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Expected Hours</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
																<input type="number" class="form-control" value="<?=$project[0]->ProjectHours;?>" name="txtExpected" >
															</div>                                            
														</div>
													</div>
													<?php
														$deadline   = date_create(date('Y-m-d',strtotime($project[0]->Deadline)));
														$date_today = date_create(date('Y-m-d'));
														$remaining = date_diff($date_today,$deadline);
														$class="";
														$remainingDays = "";
														//If not done, display the remaining days until deadline
														if($project[0]->Status != 2){
															if($remaining->format("%R%a") == 0){
																$class="warning";
																$remainingDays = '<div class="label label-'.$class.'">Deadline Today</div>';
															}else if($remaining->format("%R%a") == 1){
																$class="success";	
																$remainingDays = '<div class="label label-'.$class.'">'.$remaining->format("%a day remaining").'</div>';														
															}else if($remaining->format("%R%a") > 1){
																$class="success";
																$remainingDays = '<div class="label label-'.$class.'">'.$remaining->format("%a days remaining").'</div>';
																
															}else if($remaining->format("%R%a") < 0){
																$class="danger";
																$remainingDays = '<div class="label label-'.$class.'">'.$remaining->format("%a day overdue").'</div>';
															}
														}
													?>
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Project Deadline <?=$remainingDays;?></label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
																<input type="date" class="form-control" value="<?=$project[0]->Deadline;?>" name="txtDeadline" >
															</div>                                            
														</div>
													</div>												
												
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Company / Client</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-globe"></span></span>
																<select name="drpCompany" class="form-control">
																	<?php
																		foreach($company as $row){
																			if($row->CompanyID == $project[0]->CompanyID){
																				echo '<option value="'.$row->CompanyID.'" selected>'.$row->CompanyName.'</option>';
																			}else{
																				echo '<option value="'.$row->CompanyID.'">'.$row->CompanyName.'</option>';
																			}
																			
																		}
																	?>
																</select>
															</div>                                            
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Project Status</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-info"></span></span>
																<select name="drpStatus" class="form-control">
																	<option <?php if($project[0]->Status == 1) echo "selected"; ?> value="1">In Progress</option>
																	<option <?php if($project[0]->Status == 2) echo "selected"; ?> value="2">Done</option>
																</select>
															</div>                                            
														</div>
													</div>													
													
													<div class="narrow-grid ">
														<button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
													</div>
											</form>
										</div>
										<div class="col-md-6">
										<br/>
										<h3 class="task-list">Task lists</h3>
										<!--View Task-->
										<div class="tree-container">
											<ul id="tree">
												<?php
													foreach($category_name as $cat){
														echo '<li>';
															echo '<input type="checkbox" checked/>';
															echo '<!--Task Category-->';
															echo '<span>'.$cat->CategoryName.'</span>';
															//This Category has subcategory
															if(isset(getAvailableSubCategoryViaCatID($cat->CategoryID)[0]->SubcategoryID)){
																echo '<ul>';
																	foreach(getAvailableSubCategoryViaCatID($cat->CategoryID,$cat->ProjectID) as $sub){
																		echo '<li>';
																			echo '<input type="checkbox" checked/>';
																			echo '<span>'.$sub->SubcategoryName.'</span>';
																				//if this subcategory has dev assigned
																				if(getDevViaSubCatID($sub->SubcategoryID,$sub->ProjectID)!=null){
																					echo '<ul>';
																						foreach(getDevViaSubCatID($sub->SubcategoryID,$sub->ProjectID) as $dev){
																							echo '<li>';
																								echo '<input type="checkbox" checked/>';
																								echo '<span>'.$dev->FName.' '.$dev->LName.'</span>';
																									//if dev has task assigned
																									if(getTaskViaPersonalInfoID($dev->PersonalInfoID,$dev->ProjectID,$dev->SubcategoryID)!=null){
																										echo '<ul>';
																											echo '<!--task-->';
																											foreach(getTaskViaPersonalInfoID($dev->PersonalInfoID,$dev->ProjectID,$dev->SubcategoryID) as $task){
																												echo '<li>';
																													echo '<span><a href="'.base_url('admin/load/tasks/'.$task->TaskID.'').'">ID#'.$task->TaskID.': '.$task->TaskName.'</a></span>';
																												echo '</li>';
																											}
																										echo '</ul>';
																									}
																							echo '</li>';
																						}
																					echo '</ul>';
																				}
																		echo '</li>';
																	}
																echo '</ul>';
															}else{
																//No Subcategory 
																echo '<ul>';
																	foreach(getDevViaCatID($cat->CategoryID,$cat->ProjectID) as $dev){
																		echo '<li>';
																			echo '<input type="checkbox" checked/>';
																			echo '<span>'.$dev->FName.' '.$dev->LName.'</span>';
																				//if dev has task assigned
																				//if(getTaskViaPersonalInfoID($dev->PersonalInfoID)!=null){
																						echo '<ul>';
																						echo '<!--task-->';
																						foreach(getTaskViaPersonalInfoID($dev->PersonalInfoID,$dev->ProjectID,0) as $task){
																							echo '<li>';
																								echo '<span><a href="'.base_url('admin/load/tasks/'.$task->TaskID.'').'">ID#'.$task->TaskID.': '.$task->TaskName.'</a></span>';
																							echo '</li>';
																						}
																					echo '</ul>';
																				//}
																		echo '</li>';
																	}							
																echo '</ul>';
															}
														echo '</li>';
													}
												?>
						
											</ul>
										</div>
										<!--View Task-->
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
<div class="message-box animated fadeIn standard" data-sound="alert" id="mb-taskhours">
            <div class="mb-container">
                <div class="mb-middle">

                    <div class="mb-content">
							<!--Load Project-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-title-box">
										<h3>Rendered Hours</h3>
										<span>View all the Rendered hours of per Developer.</span>
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
									<table class="full-width table datatable dataTable no-footer">
										<thead>
											<tr>
												<th>ID#</th>
												<th>Taskname</th>
												<th>Developer</th>
												<th>Percentage</th>
												<th>Total Hours Rendered</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>ID#</th>
												<th>Taskname</th>
												<th>Developer</th>
												<th>Percentage</th>
												<th>Total Hours Rendered</th>
											</tr>
										</tfoot>										
										<tbody>
										<?php
											$ctr = 1;
											foreach($total_hours as $row){	
												$sum = totalTaskHourPerDev($row->TaskID,$row->PersonalInfoID);
												echo '<tr>';
													echo '<td>'.$row->TaskID.'</td>';
													echo '<td>'.$row->TaskName.'</td>';
													echo '<td>'.$row->FName.' '.$row->LName.'</td>';
													echo '<td>'.$row->TaskPercentage.'</td>';
													echo '<td>'.number_format($sum, 2, '.', '').'</td>';
												echo '</tr>';
												$ctr++;
											}
										?>
																			
										</tbody>
									</table>							
								</div>
							</div>
							<!--./Load Project-->
                    </div>
					 <div align="right" class="mb-footer">
						<a href="#" class="mb-control-close  btn btn-danger">Close</a>
					 </div>

                </div>
            </div>
        </div>

