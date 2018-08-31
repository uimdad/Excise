  <!-- Large Size -->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Allot Vechicle</h4>
                        </div>
							<form  action="#" id="allotvechicle" enctype="multipart/form-data">
                        <div class="modal-body ">
					
						<div class="row demo-masked-input">
						<div class="row">
						<div class="col-md-2">
						<label>Department name</label>
						</div>
						<div class="col-md-6">
						<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="departmentname" name="departmentname" class="form-control" placeholder="Enter Letter no">
                                        </div>
                                    </div>
						</div>
					
						</div>
						<div class="row">  
						<div class="col-md-2">
						<label>Designation</label>
						</div>
						<div class="col-md-6">
						<div class="input-group ">
                                            
                                            <div class="form-line">
                                                <input type="text" id="designation" name="designation" class="form-control " placeholder="">
                                            </div>
                                        </div>
						</div>
					
						</div>
						<div class="row">
						<div class="col-md-2">
						<label>authorisedby</label>
						    
						</div>
						<div class="col-md-6">
						<div class="input-group ">
                                            
                                            <div class="form-line">
											<select id="authorisedby" name="authorisedby" class="form-control ">
											<option value="Secretary">Secretary</option>
											<option value="DG Excise">DG Excise</option>
											<option value="Minister Excise">Minister Excise</option>
											</select>
                                             
                                            </div>
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
						<div class="col-md-2">
						<label>Attach Evidance</label>
						  
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
						             <button  type="submit" id="submit" name="submit" class="btn bg-green waves-effect">Allot vehicle</button>
								
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
						  	</form>
                        </div>
                        <div class="modal-footer">
                 
                        </div>
					
                    </div>
                </div>
            </div>
 
 <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $name;?>
								    
                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                            
                               
                            </ul>
                        </div>
                        <div class="body table-responsive">
                          <table id="allot" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Seized By</th>
                <th>Seized Date</th>
                <th>Seized District</th>
                <th>Mobile Squad No</th>
                <th>Reg No</th>
                 <th>Proceed </th>
                 <th>Allot </th>
                 <th>Return to Owner </th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
        
    </table>
                        </div>
                    </div>