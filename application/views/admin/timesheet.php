<?php get_header('Timesheet','admin timesheet'); ?>
        <div class="page-container">
			<?php get_navbar($user_role); ?>		
			<!-- PAGE CONTENT -->
            <div class="page-content">        
                <!-- START X-NAVIGATION VERTICAL -->
				<?php get_topbar(); ?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- START BREADCRUMB -->
                <?php get_breadcrumbs('Timesheet'); ?>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                     
					<?php page_title("fa-calendar"," Timesheet"); ?>	
					<div class="grid">
					<div class="unit w-1-1">

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
										<h3>Timesheet</h3>
										<span>View all the Submitted Timesheet.</span>
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
									<div id='calendar'></div>						
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
<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: '<?php echo date('Y-m-d');?>',
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			
			events:[
				<?php 
					foreach($time_entry as $row){
						$comment = $row->TaskComment;
						$msg = "";
						if($comment!=null){
							$msg = "[M]";
						}
						echo '{
							title :  "'.$msg.' # '.$row->TimeEntryID.' - '.$row->LName.' : '.number_format((float)$row->RenderedHours, 2, '.', '').' hr",
							start : "'.date('Y-m-d',strtotime($row->DateInputted)).'",
							url   : "'.base_url('admin/load/timesheet/'.$row->TimeEntryID.'').'"
						},';
					}
				?>
			]
			
		});
		
	});

</script>