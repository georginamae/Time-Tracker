<?php get_header('Projects','admin projects'); ?>
        <div class="page-container">
			<?php get_navbar($user_role); ?>		
			<!-- PAGE CONTENT -->
            <div class="page-content">        
                <!-- START X-NAVIGATION VERTICAL -->
				<?php get_topbar(); ?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- START BREADCRUMB -->
                <?php get_breadcrumbs('Companies'); ?>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                     
					<?php page_title("fa-area-chart"," Projects"); ?>	
					<div class="grid">
					<div class="unit w-1-1">
						<form class="form-horizontal" action="<?php echo base_url('admin/edit/process/delete-projects'); ?>" method="POST" >
							<div id="bulk-actions" class="pull-right">
								<select name="bulk" id="bulk" class="form-control">
									<option selected disabled>Bulk actions</option>
									<option value="del">Delete</option>
								</select>
								<button class="btn btn-success">Go</button>
							</div><br/><br/>
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
										<h3>Projects</h3>
										<span>View all the Projects of Primeview.</span>
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
												<th><input id="check-all" type="checkbox" /></th>
												<th>#</th>
												<th>Project Name</th>
												<th>Client</th>
												<th>Expected Hours</th>
												<th>Project Creator</th>
												<th>Project Status</th>
												<th style="text-align:right;">Action</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$ctr = 1;
											foreach($projects as $row){
												$status = "In progress...";
												$class = "danger";
												if($row->Status == 2){
														$status = "Done";
														$class = "success";
												}
												echo '<tr>';
													echo '<td><input value="'.$row->ProjectID.'" type="checkbox" name="projects[]" id="projects[]" class="check-all" /></td>';
													echo '<td>'.$ctr.'</td>';
													echo '<td>'.$row->ProjectName.'</td>';
													echo '<td>'.$row->CompanyName.'</td>';
													echo '<td>'.$row->ProjectHours.'</td>';
													echo '<td>'.$row->FName.' '.$row->LName.'</td>';
													echo '<td><div class="label label-'.$class.'">'.$status.'</div></td>';
													echo '<td style="text-align:right;"><a class="btn btn-xs btn-success" href="'.base_url('admin/load/project/'.$row->ProjectID.'').'"><i class="fa fa-search"></i > View</a></td>';
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