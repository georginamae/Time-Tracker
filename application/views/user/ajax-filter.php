								<table class="table datatable dataTable no-footer">
										<thead>
											<tr>
												<th>ID</th>
												<th>Project</th>
												<th>Task name</th>
												<th>Priority Level</th>
												<th>Percentage</th>
												<th>Assigned By</th>
												<th>Date Assigned</th>
												<th style="text-align:right;">Action</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$ctr = 1;
											foreach($tasks as $row){
											
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
													echo '<td>'.$row->FName.' '.$row->LName.'</td>';
													echo '<td>'.system_date_format($row->AssignedDate).'</td>';
													echo '<td style="text-align:right;">';
															echo '<a class="btn btn-xs btn-success" href="'.base_url('user/load/tasks/'.$row->TaskID.'').'"><i class="fa fa-search"></i ></a>&nbsp;&nbsp;&nbsp;';
															echo '<a title="" class="btn btn-xs btn-danger" href=""><i class="fa fa-clock-o"></i ></a>';
														echo '</td>';
												echo '</tr>';
												$ctr++;
											}
										?>				
										</tbody>
									</table>
								
										<script>
												$(function(){
													 $(".datatable").dataTable();
												});
										</script>