  <!-- send to Mra modal -->
   <!-- Default Size -->
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-gray">
                            <h4 class="modal-title" id="defaultModalLabel">Send vehicle To Mra</h4>
                        </div>
						<form  action="#" id="sendtomra" enctype="multipart/form-data">
                        <div class="modal-body">
                           <div class="row demo-masked-input">
						<div class="row">
						<div class="col-md-2">
						<label>Letter no</label>
						</div>
						<div class="col-md-6">
						<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="letterno" name="letterno" class="form-control" placeholder="Enter Letter no">
                                        </div>
                                    </div>
						</div>
					
						</div>
						<div class="row">  
						<div class="col-md-2">
						<label>Date</label>
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
						<label>Time</label>
						  
						</div>
						<div class="col-md-6">
						<div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">access_time</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="time" id="time" class="form-control time12" placeholder="Ex: 23:59">
                                            </div>
                                        </div>
						</div>
					
						</div>
							<div class="row">
						<div class="col-md-2">
						<label>Description</label>
						  
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
						<div class="col-md-4">
						<label>Attach letter Image</label>
						  
						</div>
						<div class="col-md-4">
						<div class="form-group">
                                        <div class="form-line">
                                               <input type="file" name="userfile" id="userfile" class="form-control" >
                                        </div>
                                    </div>
						</div>
					
						</div>
						</div>
                          <input type="hidden" name="vechicle_id" id="vechicle_id" >
							
							
                        </div>    
                        <div class="modal-footer">
                            <button  type="submit" id="submit" name="submit" class="btn bg-green  waves-effect" >Send</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
						</form>
                    </div>
                </div>
            </div>
  <!-- send to Mra modal -->
  
  
  
  
  
  
  
  
  
  
  
  
  <div class="card">
                        <div class="header">
                            <h2>
                                Seized Vechicle
                                <small></small>
                            </h2>
							
                            <ul class="header-dropdown m-r--5">
                              
                               <i class="material-icons" id="refresh">refresh</i>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Time</th>    
                                        <th>Form A</th>
                                        <th>Seized Category</th>
                                        <th>Mobile Squad No</th>   
                                        
                                        <th>Reg No</th>
                                        <th>Actions</th>
										
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($seized_vechicles->result() as $key=>$data):?>
                                    <tr>
                                        <th scope="row"><?php echo $key; ?></th>
                                          <td><?php echo $data->datesiezeddate; ?></td>
                                          <td><?php echo $data->siezedtime; ?></td>
                                          <td><?php echo $data->formserialno; ?></td>
                                          <td><?php echo $data->seizedtype; ?></td>
                                           
                              
                                        <td><?php echo $data->mobilesquadno; ?></td>
                                        <td><?php echo $data->vechileregistrationno;?></td>
                                 <td><div class="btn-group" role="group">
                                   
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-success waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo site_url("Vechicles/change_proceed_status/"); ?><?php echo $data->vechileid; ?>" onclick="return confirm('Are you want to Proceed ?');">Send To Warehouse</a></li>
                                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#defaultModal" class=" waves-effect waves-block" custom="<?php echo $data->vechileid; ?>" id="mra" onclick="clicked(this);">Send To Mra</a></li>
                                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Release</a></li>
                                        </ul>
                                    </div>
                                </div></td>
                                        <td></td>
                                        <td><a href="<?php echo site_url("Vechicles/show_specific_vechicle/"); ?><?php echo $data->vechileid; ?>" class="btn bg-indigo waves-effect">Details</a></td>
                                        <td><a href="http://maps.google.com/?q=<?php echo $data->seizedlocationlat.",".$data->seizedlocationlong; ?>" target="_blank" class=" waves-effect"><i class="material-icons">location_on</i></a></td>
                                    </tr>
									
									<?php endforeach; ?>
                                   
                                   
                                </tbody>
                            </table>
							<?php  if($this->session->flashdata("msg")){ 
							$type = "success";
							$msg = $this->session->flashdata("msg");?> 
							<script type="text/javascript">
                          
                                   //Set theme
                                  Command: toastr["success"]('<?php echo $msg; ?>')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
                             
                      </script> 
					  <?php } //$this->session->sess_destory($this->session->flashdata("msg"));?>
                        </div>
                    </div>