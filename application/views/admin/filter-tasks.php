<?php get_header('Filter Tasks','admin admin-filter-task'); ?>
        <div class="page-container">
			<?php get_navbar($user_role); ?>		
			<!-- PAGE CONTENT -->
            <div class="page-content">        
                <!-- START X-NAVIGATION VERTICAL -->
				<?php get_topbar(); ?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- START BREADCRUMB -->
                <?php get_breadcrumbs('Filter Tasks'); ?>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                     
					<?php page_title("fa fa-filter","Filter Tasks"); ?>	
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
										<h3>Filter Task</h3>
										<span>Filter All The Task.</span>
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
									<div class="pull-right filtration-bar">
										<select name="filter" id="filter" class="form-control" onclick="filterTask('<?=$user_role?>');" >
											<option selected="" disabled="">--Filter By--</option>
											<option value="all">All Tasks</option>
											<option value="pending">Pending Tasks</option>
											<option value="finish">Finished Tasks</option>
											<option value="low">Low Priority</option>
											<option value="med">Medium Priority</option>
											<option value="high">High Priority</option>
										</select>
									</div>
									<div id="filter-task-container">
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
										       <tfoot>
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
												</tfoot>	
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
														echo '<td style="text-align:right;"><a class="btn btn-xs btn-success" href="'.base_url('admin/load/tasks/'.$row->TaskID.'').'"><i class="fa fa-search"></i > View</a></td>';
													echo '</tr>';
													$ctr++;
												}
											?>
																				
											</tbody>
										</table>	
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