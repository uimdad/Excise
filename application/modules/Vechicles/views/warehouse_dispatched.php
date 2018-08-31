  <!-- Large Size -->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Fsl Report</h4>
                        </div>
							<form  id="fslreceived" enctype="multipart/form-data">
                        <div class="modal-body ">
					
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
                                                <input type="text" name="time" id="time" class="form-control time24" placeholder="Ex: 23:59">
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
						<label>Fsl Picutre</label>
						  
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
						             <button  type="submit" id="submit" name="submit" class="btn bg-green waves-effect">Save</button>
								
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
                               Dispatched vehicle
								    
                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                             
                               
                            </ul>
                        </div>
                        <div class="body table-responsive">
                          <table id="warehouse_dispatched" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Seized By</th>
                <th>Seized Date</th>
                <th>Seized District</th>
                <th>Mobile Squad No</th>
                <th>Reg No</th>
                 <th>Proceed </th>
                 <th>Send To Fsl </th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
        
    </table>
                        </div>
                    </div>