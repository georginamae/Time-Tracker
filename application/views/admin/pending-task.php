<?php get_header('Pending Task','admin pending-task'); ?>
        <div class="page-container">
			<?php get_navbar($user_role); ?>
			<!-- PAGE CONTENT -->
            <div class="page-content">        
                <!-- START X-NAVIGATION VERTICAL -->
				<?php get_topbar(); ?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- START BREADCRUMB -->
                <?php get_breadcrumbs('Pending Task'); ?>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                     
					<?php page_title("fa fa-hourglass-end"," Pending Tasks"); ?>	
					<div class="grid">
					<div class="unit w-1-1">
						<form class="form-horizontal" action="<?php echo base_url('admin/edit/process/delete-projects'); ?>" method="POST" >

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
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-title-box">
										<h3>Pending Task</h3>
										<span>View all the Pending Tasks.</span>
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
									<table class="table datatable dataTable no-footer">
										<thead>
											<tr>
												<th>ID</th>
												<th>Project</th>
												<th>Task name</th>
												<th>Priority Level</th>
												<th>Percentage</th>
												<th>Assigned To</th>
												<th>Date Assigned</th>
												<th style="text-align:right;">Action</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$ctr = 1;
											foreach($tasks as $row){
											$dev = getData('a.LName,a.FName','tbl_personalinfo as a JOIN tbl_assignment as b ON a.PersonalInfoID = b.AssignedTo JOIN tbl_tasks as c ON c.TaskID = b.TaskID',' WHERE c.TaskID = '.$row->TaskID.'  ');
											if($row->PriorityLevel=="low"){
												$class="success";
											}else if($row->PriorityLevel=="medium"){
												$class="warning";
											}else{
												$class="danger";
											}
												echo '<tr>';
													echo '<td>'.$row->TaskID.'</td>';
													echo '<td>'.$row->ProjectName.'</td>';
													echo '<td>'.$row->TaskName.'</td>';
													echo '<td><div class="label label-'.$class.'">'.$row->PriorityLevel.'</div></td>';
													echo '<td>'.$row->TaskPercentage.'%</td>';
													echo '<td>'; 
														foreach($dev as $developer){
															echo $developer->FName.' '.$developer->LName.'<br/>';
														}
													echo'</td>';
													echo '<td>'.system_date_format($row->AssignedDate).'</td>';
													echo '<td style="text-align:right;">';
													echo '<a class="btn btn-xs btn-success" href="'.base_url('admin/load/tasks/'.$row->TaskID.'').'"><i class="fa fa-search"></i ></a>&nbsp;&nbsp;&nbsp;';
													?>
														<a id="transferToModal" data-project="<?=$row->ProjectName;?>"  data-name="<?=$row->TaskName;?>" data-percent="<?=$row->TaskPercentage;?>" data-id="<?=$row->TaskID;?>" data-assigned="<?=$row->AssignedBy;?>" class=" btn btn-xs btn-danger" href="#"><i class="fa fa-clock-o"></i ></a>
													<?php
														echo '</td>';
												echo '</tr>';
												$ctr++;
											}
										?>
																			
										</tbody>
									</table>							
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
<!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn standard" data-sound="alert" id="mb-addtime">
            <div class="mb-container ">
                <div class="mb-middle ">
                    <div class="time-entry-task-title mb-title"></div>
                    <div class="mb-content form-group-separated">
                       <form action="<?=base_url('admin/edit/process/add-time-entry')?>" method="POST" class="form-horizontal">
							<input type="hidden" name="hdAssignedBy" id="hdAssignedBy" />
							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label">Task ID#</label>
								<div class="col-md-9 col-xs-12">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-key"></span></span>
										<input name="txtID" id="txtID" type="text" value="" class="form-control" readonly />
									</div>                                            
								</div>
							</div>	
							
							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label">% Complete</label>
								<div class="col-md-9 col-xs-12">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-percent"></span></span>
										<input name="txtPercent" id="txtPercent" type="number" value="" max="100" class="form-control" required />
									</div>                                            
								</div>
							</div>	

							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label">Hours</label>
								<div class="col-md-9 col-xs-12">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
										<input name="txtHours" id="txtHours" type="number" value="" min="0" class="form-control" step="0.01" required />
									</div>                                            
								</div>
							</div>	
					
							<div class="form-group">                                        
								<label class="col-md-3 col-xs-12 control-label">Comments</label>
								<div class="col-md-9 col-xs-12">                                            
									<textarea class="form-control" value="" name="txtTimeEntryDesc" rows="5"></textarea>
								</div>
							</div>							
						</div>
						<div class="mb-footer">
							<div class="pull-right">
								<button class="btn btn-success btn-lg">Save</button>	
								<button type="button" class="btn btn-danger btn-lg mb-control-close">Cancel</button>
							</div>
						</div>
					 </form>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX--> 

