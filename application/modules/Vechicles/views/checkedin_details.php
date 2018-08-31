<style>


</style>
<div class="card">
                        <div class="header">
                            <h2>Vechicles REPORT
                                <small></small>
                            </h2>
                        </div>
                  

        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                           FORM A
                        </a>
                    </li>

                    <li role="presentation" >
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                           FORM B
                        </a>
                    </li>
                   
                    <li role="presentation" >
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                          
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                       <div class="container">
                           <div class="row">
                              <div class="border_bottom">
                                 <a href="#"><span class="icon-name">Download</span> <i class="material-icons">picture_as_pdf</i> </a>
                                  <div class="col-md-6">
                                    
                                  </div>
                                  <div class="col-md-6">
                                      
                                  </div>
                              </div>
                           </div>
                       </div>
                      
                    <div class="row">
				
				<div class="col-md-4">
				 
					 <div class="clearfix"></div>
					  <div class="row" style="margin-top:20px;">
					 <div class="col-md-6 col-md-offset-1">
					 <div class="row brder_botom" >
					 <p class="text-left padding-5">Form Serial No</p>
					 
					 </div>
					 </hr>
					 <div class="row brder_botom">
					 <p  class="text-left padding-5">District</p>
					 </div> 
					 <div class="row brder_botom">
					 <p  class="text-left padding-5">Vechicle Make</p>
					 </div>
					 <div class="row brder_botom">
					 <p  class="text-left padding-5">Vechicle Type</p>
					 </div>
					 <div class="row brder_botom">
					 <p  class="text-left padding-5"> Vechicle Model Year</p>
					 </div>	
					 <div class="row brder_botom">
					 <p  class="text-left padding-5">Vechicle Model</p>
					 </div>
					 <div class="row brder_botom">
					 <p  class="text-left padding-5">Driver Cnic no</p>
					 </div> 
					 <div class="row brder_botom">
					 <p  class="text-left padding-5">Driver Mobile Number</p>
					 </div>
					 
					 <div class="row brder_botom">
					 <p  class="text-left">Driver Address</p>
					 </div> 
					 <div class="row brder_botom">
					 <p  class="text-left">Vechicle Owner Name</p>
					 </div> 
					 <div class="row brder_botom">
					 <p  class="text-left">Vechicle Owner Cnic</p>
					 </div>
					 <div class="row brder_botom" >
					 <p  class="text-left">Vechicle Owner Mobile</p>
					 </div>
					 <div class="row brder_botom">
					 <p  class="text-left">Mobile Squad Number</p>
					 </div>
					 <div class="row brder_botom">
					 <p  class="text-left">Car Mileage</p>
					 </div> 
					 <div class="row brder_botom">
					 <p  class="text-left">Vechicle Details</p>
					 </div>	 
					 <div class="row brder_botom">
					 <p  class="text-left">transmission</p>
					 </div>
					 <div class="row brder_botom">
					 <p  class="text-left">Engine Type</p>
					 </div> 
					 <div class="row brder_botom">
					 <p  class="text-left">Assembeled</p>   
					 </div>
					 </div>
					 <div class="col-md-5" style="border-right: 2px solid #D3D3D3;">
					 
					 <?php foreach($all_vechicle_specific->result() as $data):?>
					<div class="row brder_botom text-left" <p><?php  if(empty($data->formserialno)){echo "Not Entered";}else{ echo $data->formserialno;};?></p></div>
					 <div class="row brder_botom text-left"><p><?php if(empty($data->districtname)){echo "Not Entered";}else{ echo $data->districtname;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php if(empty($data->makename)){ echo "Not Entered"; }else{echo $data->makename;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php if(empty($data->vehicletype)){ echo "Not Entered";}else{ echo $data->vehicletype;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php if(empty($data->modelyear)){echo "Not Entered";}else{ echo $data->modelyear; }?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->submakename)){ echo "Not Entered"; }else{echo $data->submakename; }?></p></div>
					<div class="row brder_botom text-left"> <p><?php if(empty ($data->drivercnicno)){ echo "Not Entered"; }else{ echo $data->drivercnicno;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php if(empty($data->drivermobileno)){ echo "Not Entered";}else{ echo $data->drivermobileno;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php if(empty($data->driveraddress)){ echo "Not Entered";}else{ echo $data->driveraddress;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php if(empty($data->vechileownername)){echo "Not Entered";}else{ echo $data->vechileownername;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php if(empty($data->vechileownercnic)){ echo "Not Entered";}else{ echo $data->vechileownercnic;} ?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->vechileownermobileno)){ echo "Not Entered";}else{ echo $data->vechileownermobileno;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->mobilesquadno)){ echo "Not Entered";}else{ echo $data->mobilesquadno; }?></p></div>
					<div class="row brder_botom text-left"> <p><?php if(empty($data->mileage)){echo "Not Entered";}else{ echo $data->mileage; }?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->vechicledescription)){ echo "Not Entered";}else{ echo $data->vechicledescription; }?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->transmission)){ echo "Not Entered";}else{ echo $data->transmission;}?></p></div>
					<div class="row brder_botom text-left" > <p><?php  if(empty($data->enginetype)){ echo "Not Entered";}else{ echo $data->enginetype;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->assembely)){ echo "Not Entered"; }else{ echo $data->assembely;}?></p></div>
					 <?php endforeach; ?>
					 </div>

					 </div>
				
				</div>
					  <div class="col-md-5 col-md-offset-1">
			  <ul id="image-gallery" class="gallery list-unstyled cS-hidden" style="   margin-top:30px; background: black;" >
			  <?php foreach($all_vechicle_images->result() as $key=>$img):?>
                    <li data-thumb="<?php echo base_url();?>/uploads/<?php echo $img->imagepath; ?>"  style="width: 560px;
    margin-right: 0px;" > 
                        <img src="<?php echo base_url();?>/uploads/<?php echo $img->imagepath; ?>" class="col-md-offset-1"  />
                         </li>
						 <?php endforeach; ?>
                 
                </ul>
				</div>
                    
           
                   
                    <div class="clearfix"></div>
          
        </div>
			 <div class="row">
<div class="col-md-12">					 
					  <h5 class="col-md-offset-1"> Vechicle FEATURES</h5>
						<?php foreach($all_vechicle_accesories->result() as $accesories):?>
					 <?php echo "<div class='col-md-5 col-md-offset-1'><p>".$accesories->accessoryicon." ".$accesories->accessoryname."</p></div>";?>
					 <?php endforeach; ?>
					 </div>

				</div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
					<div class="container">
                        <div class="row">
						<div class="col-md-5">
						  
						  <h5>Date</h5>
						  <h5>Time</h5>

						  <h5>FormB No</h5>
						  						  <h5>Description</h5>
						</div>
						<div class="col-md-6">
						<?php foreach($all_vechicle_specific->result() as $data):?>
						<p><?php echo $data->date;?></p>
						<p><?php echo $data->time;?></p>
						
						<p><?php echo $data->form_bno;?></p>
						<p><?php echo $data->description;?></p>
						<p><a href="http://maps.google.com/?q=<?php echo $data->lat;?>,<?php echo $data->long;?>" target="_blank">View Location</a>
					
</p>
						<?php endforeach;?>
						</div>
						</div>
						
						</div>
						
                       
                    
                    </div>
                   
            </form>
        </div>
    

        </div>