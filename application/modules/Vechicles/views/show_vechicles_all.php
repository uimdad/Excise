     <div class="card">
                        <div class="header">
                            <h2>Confiscation Requests
                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <i class="material-icons" id="refresh">refresh</i>
                               
                            </ul>
                        </div>
						<!-- Large Size -->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Confiscation Order</h4>
                        </div>
							<form  action="#" id="sentbackbyeto" enctype="multipart/form-data">
                        <div class="modal-body ">
					
						<div class="row demo-masked-input">
						<div class="row">
						<div class="col-md-2">
						<label>Confiscation Order No</label>
						</div>
						<div class="col-md-6">
						<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="orderno" name="orderno" class="form-control" placeholder="Enter Letter no">
                                        </div>
                                    </div>
						</div>
					
						</div>
						<div class="row">  
						<div class="col-md-2">
						<label>Confiscation Order Date</label>
						</div>
						<div class="col-md-6">
						<div class="input-group demo-masked-input">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" id="date" name="date" class="form-control date" placeholder="Ex: 30/07/2016">
                                            </div>
                                        </div>
						</div>
					
						</div>
						
							<div class="row">
						<div class="col-md-2">
						<label>Confiscation Order Time</label>
						  
						</div>
						<div class="col-md-6">
						<div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">access_time</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="time" id="time" class="form-control time24" placeholder="Ex: 23:59">
                                            </div>
                                        </div>
						</div>
					
						</div>
							<div class="row">
						<div class="col-md-2">
						<label>Confiscation Description</label>
						  
						</div>
						<div class="col-md-6">
						<div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" name="description" id="description" class="form-control no-resize" placeholder="Please type Your Description"></textarea>
                                        </div>
                                    </div>
						</div>
					
						</div>
							<div class="row">
						<div class="col-md-2">
						<label>Letter Issued</label>
						  
						</div>
						<div class="col-md-6">
						<div class="form-group">
                                        <div class="form-line">
                                               <input type="file" name="userfile" id="userfile" class="form-control" >
                                        </div>
                                    </div>
						</div>
					
						</div>
						</div> 
                          <input type="hidden" name="vechicle_id" id="vechicle_id" >
						             <button  type="submit" id="submit" name="submit" class="btn bg-green waves-effect">Confiscat</button>
								
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
						  	</form>
                        </div>
                        <div class="modal-footer">
                 
                        </div>
					
                    </div>
                </div>
            </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Seized by</th>
                                        <th>Chases No</th>
                                        <th>Engine No</th>
                                        <th>vechileregistrationno</th>
										<th> Seize Date</th>
										
                                    </tr>
                                </thead>
                                <tbody>
								<?php  $key=0;  foreach($all_vechicle->result() as $vechicle):?>
                                    <tr>
                                        <th scope="row"><?php echo $key++;?></th>
                                        <td><?php echo $vechicle->username;?></td>
										  <td><?php echo $vechicle->chasisno;?></td>
                                        <td><?php echo $vechicle->engineno;?></td>
                                        <td><?php echo $vechicle->vechileregistrationno;?></td>
                                        <td><?php echo $vechicle->datesiezeddate;?></td>
                                      
                                       
                                         <td><a href="<?php echo base_url();?>index.php/Vechicles/show_vechicle_report/<?php echo $vechicle->vechileid;?>" type="button" class=" btn btn-danger waves-effect">view Details</a></td>
                                         <td><button type="button" class="btn btn-danger waves-effect m-r-20 m-r-1" id="show_val<?php echo $vechicle->vechileid; ?>"  onclick="clicked(this);" custom="<?php echo $vechicle->vechileid; ?>">Confiscat</button></td>
                                    </tr>
                                  <?php endforeach; ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>