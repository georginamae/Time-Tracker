													<div class="form-group">
														<label class="col-md-3 col-xs-12 control-label">Subcategory</label>
														<div class="col-md-6 col-xs-12">                                            
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																<select id="drpSubcat" name="drpSubcat" class="form-control">
																	<?php
																		foreach($subcat as $row){
																			echo '<option value="'.$row->SubcategoryID.'">'.$row->SubcategoryName.'</option>';
																		}
																	?>
																</select>
															</div>                                            
														</div>
													</div>