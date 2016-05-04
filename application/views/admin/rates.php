<?php get_header("Hourly Rate",'admin admin-rate'); ?>
        <div class="page-container">
			<?php get_navbar($user_role); ?>	
			<!-- PAGE CONTENT -->
            <div class="page-content">        
                <!-- START X-NAVIGATION VERTICAL -->
				<?php get_topbar(); ?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- START BREADCRUMB -->
                <?php get_breadcrumbs("Hourly Rate"); ?>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                     
					<?php page_title("fa-clock-o"," Hourly Rate"); ?>		
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-title-box">
										<h3>Hourly Rate</h3>
										<span>Modify fields to edit Hourly Rate</span>
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
											<form class="form-horizontal" action="<?=base_url('admin/edit/process/edit-rates');?>" method="POST" >
											<input value="<?=$rates[0]->RateID;?>" type="hidden" class="form-control" name="hdID" >
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
														<label class="col-md-3 col-xs-12 control-label">Hourly Rate (USD)</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-usd"></span></span>
																<input value="<?=$rates[0]->Rate;?>" type="number" class="form-control" name="txtRate"  min="1" />
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