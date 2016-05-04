<?php get_header('Dashboard','admin dashboard'); ?>
        <div class="page-container">
			<?php get_navbar($user_role); ?>			
			<!-- PAGE CONTENT -->
            <div class="page-content">        
                <!-- START X-NAVIGATION VERTICAL -->
				<?php get_topbar(); ?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- START BREADCRUMB -->
                <?php get_breadcrumbs('Dashboard'); ?>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
				<div class="row">
                        <div class="col-md-3">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-users"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?=$user[0]->cnt;?></div>
                                    <div class="widget-title">System Users</div>
                                    <div class="widget-subtitle">Active</div>
                                </div>      
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon" >
                                <div class="widget-item-left">
                                    <span class="fa fa-hourglass-end"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?=$task[0]->cnt;?></div>
                                    <div class="widget-title">Total Tasks</div>
                                    <div class="widget-subtitle">Pending...</div>
                                </div>      
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET PROJECTS -->
                            <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-area-chart"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?=$project[0]->cnt;?></div>
                                    <div class="widget-title">Projects</div>
                                    <div class="widget-subtitle">on going...</div>
                                </div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                            </div>                            
                            <!-- END WIDGET PROJECTS -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-danger widget-padding-sm">
                                <div class="widget-big-int plugin-clock"></div>                            
                                <div class="widget-subtitle plugin-date"></div>
                                <div class="widget-buttons widget-c3">
                                    <div class="col">
										<a href="<?=base_url();?>"><span class="fa fa-home"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="<?=base_url('admin/view/profile');?>"><span class="fa fa-edit"></span></a>
                                    </div>
                                    <div class="col">
										<a href="<?=base_url('admin/view/settings');?>"><span class="fa fa-cog"></span></a>
                                    </div>
                                </div>                            
                            </div>                        
                            <!-- END WIDGET CLOCK -->
                            
                        </div>
                    </div>                  
					<!--LOAD AND PROJECTS-->
					<div class="row">
                        <div class="col-md-8">
							<div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Developer Load</h3>
                                        <span>A visual representation of tasks</span>
                                    </div>                                     
                                    <ul class="panel-controls panel-controls-title">                                                                      
                                        <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
                                    </ul>                                    
                                </div>
                                <div class="panel-body">                                    
									<div id="task-load" style="height: 250px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Most Recent Projects</h3>
                                        <span>Projects activity</span>
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
                                <div class="panel-body panel-body-table">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-condensed table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="40%">PROJECT</th>
                                                    <th width="20%">STATUS</th>
													 <th width="30%">DEADLINE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php
													$stop = 0;
													foreach($recent_projects as $row){
														$status = "In progress...";
														$class = "danger";
														$deadline = system_date_format($row->Deadline);
														if($row->Status == 2){
																$status = "Done";
																$class = "success";
																$deadline = '<div class="label label-'.$class.'">'.$status.'</div>';
														}													
														if($stop!=7){
															echo '<tr>';
																echo '<td><b><a href="'.base_url('admin/load/project/'.$row->ProjectID.'').'">'.$row->ProjectName.'</a></b></td>';
																echo '<td><div class="label label-'.$class.'">'.$status.'</div></td>';
																echo '<td>'.$deadline.'</td>';
															echo '</tr>';
														}else{break;}
														$stop++;
													}
												?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>
                    </div>
					<!--END LOAD AND PROJECTS-->
                     <div class="row">
					 
						 <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Task Feed</h3>
                                        <span>Task Feed Graph</span>
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
                                <div class="panel-body panel-body-table">
									<div id="task-frequency" style="height: 250px;"></div>
                                </div>
                            </div>						 
						 </div>
						 
						 <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>User Activity</h3>
                                        <span>Monitor User's Time Entry</span>
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
                                <div class="panel-body panel-body-table">
									<div id="time-entry" style="height: 250px;"></div>
                                </div>
                            </div>							 
						 </div>		
						 <!--
						 <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Hourly Rate</h3>
                                        <span>Rate Per Hour</span>
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
                                <div class="panel-body panel-body-table">
									<div class="rate-container">
										<span>$<?=$rates[0]->Rate;?> / Hour</span>
									</div>
                                </div>
                            </div>							 
						 </div>		
						 -->
					 </div>                
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
			
        </div>
<?php get_footer(); ?>
<script>
Morris.Bar({
  element: 'task-load',
  data: [
	<?php
		foreach($developers as $dev){
			$finished = getData('COUNT(TaskPercentage) as finished','tbl_tasks as a','JOIN tbl_assignment as b ON a.TaskID = b.TaskID WHERE a.TaskPercentage = 100 AND b.AssignedTo = '.$dev->PersonalInfoID.'')[0]->finished;
			$pending = getData('COUNT(TaskPercentage) as pending','tbl_tasks as a','JOIN tbl_assignment as b ON a.TaskID = b.TaskID WHERE a.TaskPercentage != 100 AND b.AssignedTo = '.$dev->PersonalInfoID.'')[0]->pending;
			echo "{ y: '".$dev->FName." ".$dev->LName."', finished: ".$finished.", pending: ".$pending." },";
		}
	?>
  ],
  xkey: 'y',
  ykeys: ['finished', 'pending'],
  labels: ['Finished Tasks', 'Pending Tasks'],
  barColors:['#95b75d','#b64645']

});
Morris.Line({
  element: 'task-frequency',
  data: [
	<?php
		for($month = 1; $month <= 12; $month++){
			$date = date('Y')."-".sprintf("%02d", $month);
			echo "{ y: '".$date."', a: ".getTaskFeed($date)."},";

		} 
	?>
  ],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Task Assigned']
});
Morris.Donut({
  element: 'time-entry',
  data: [
	<?php
		foreach($time_entry_dev as $row){
			$dev = getData('SUM(RenderedHours) as sum','tbl_time_entry','WHERE InputedBy = '.$row->PersonalInfoID.' ');
			echo '{label: "'.$row->FName." ".$row->LName.'", value: '.number_format($dev[0]->sum, 2, '.', '').'},';
		}
	?>
  ]
});

</script>