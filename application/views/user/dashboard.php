<?php get_header('Dashboard','user dashboard'); ?>
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
                                    <span class="fa fa-warning"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?=$high[0]->cnt;?></div>
                                    <div class="widget-title">Tasks</div>
                                    <div class="widget-subtitle">Marked as High Priority</div>
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
                                    <span class="fa fa-clock-o"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">
										<?php 
											if($total_time[0]->total!=null){ 
												echo number_format($total_time[0]->total, 2, '.', '');
											}
											else{
												echo "0";
											} 
											?>
											</div>
                                    <div class="widget-title">Total Hours Submitted</div>
                                    <div class="widget-subtitle">Today</div>
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
                                        <a href="<?=base_url('user/view/profile');?>"><span class="fa fa-edit"></span></a>
                                    </div>

                                </div>                            
                            </div>                        
                            <!-- END WIDGET CLOCK -->
                            
                        </div>
                    </div>  
					<!--Graph-->
					<div class="row">
						<div class="col-md-12">
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
									<div id="task-load" style="height: 350px;"></div>
                                </div>
                            </div>							
						</div>
					</div>
					<!--/Graph-->
				</div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
			
        </div>
<?php get_footer(); ?>
<script>
Morris.Line({
  element: 'task-load',
  data: [
	<?php
		for($month = 1; $month <= 12; $month++){
			$date = date('Y')."-".sprintf("%02d", $month);
			echo "{ y: '".$date."', a: ".getDevTaskFeed(pid(),$date)."},";

		} 
	?>
  ],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Task Assigned']
});
</script>