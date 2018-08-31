
 <div class="card">
                        <div class="header">
                            <h2>
                                  <?php echo $name; ?>
                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                              <a href="<?php echo base_url();?>Users/add_users" class="btn bg-indigo waves-effect">Add User</a>
                               
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        
                                        <th>Name</th>
                                        <th>Role</th>
                                         <th>cnic</th>
                                             <th>Mobile</th>
                                         <th>Edit</th>
                                         <th>Delete</th>
                                         
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <?php foreach($all_users as $key=>$result): ?>
                                            <tr>
                                        <th scope="row"><?php echo $key; ?></th>
                                        <td><?php echo $result->username; ?></td>
                                       <td><?php echo $result->name; ?></td>
                                       <td><?php echo $result->usercnic; ?></td>
                                        <td><?php echo $result->usermobile; ?></td>
                                        <td><a href="<?php echo base_url();?>Users/edit_user/<?php echo $result->userid;?>" class="btn bg-indigo waves-effect">Edit</a></td>
                                         <td><a href="<?php echo base_url();?>/Roles/Delete" class="btn bg-indigo waves-effect">Delete</a></td>
                                         <td><?php if($result->isactive == 1){ ?><a href="<?php echo base_url();?>/Roles/Delete" onclick="return confirm('Do you want to Active user');" class="btn btn-danger waves-effect">Disable</a> <?php }else{ ?>
										 <a href="<?php echo base_url();?>/Roles/Delete" onclick="return confirm('Do you want to Disable user');"class="btn btn-success waves-effect">Activate</a> <?php }?>
										 </td>
                                          </tr>
                                    <?php endforeach; ?>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>