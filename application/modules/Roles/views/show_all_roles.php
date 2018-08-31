 <div class="card">
                        <div class="header">
                            <h2>
                                  <?php echo $name; ?>
                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                              <a href="<?php echo base_url();?>/Roles/add_role" class="btn bg-indigo waves-effect">Add Role</a>
                               
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        
                                        <th>Role Name</th>
                                        <th>Edit Role</th>
                                         <th>Delete Role</th>
                                         
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <?php foreach($all_roles as $key=>$roles):?>
                                            <tr>
                                        <th scope="row"><?php echo $key; ?></th>
                                        <td><?php echo $roles->name; ?></td>
                                       
                                        <td><a href="<?php echo base_url();?>Roles/role_edit/<?php echo $roles->id;?>" class="btn bg-indigo waves-effect">Edit</a></td>
                                         <td><a href="<?php echo base_url();?>/Roles/Delete" class="btn bg-indigo waves-effect">Delete</a></td>
                                          
                                          </tr>
                                    <?php endforeach; ?>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>