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
								
										<script>
												$(function(){
													$('.datatable tfoot th').each( function () {
														var title = $(this).text();
														$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
													} );
												 
													// DataTable
													$('.datatable').DataTable();	
												 
													// Apply the search
													table.columns().every( function () {
														var that = this;
												 
														$( 'input', this.footer() ).on( 'keyup change', function () {
															if ( that.search() !== this.value ) {
																that
																	.search( this.value )
																	.draw();
															}
														} );
													} );
												});
										</script>