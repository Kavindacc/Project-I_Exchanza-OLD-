<?php 

include("includes/header.php"); ?>

<div class="row">
    <div class="col-md-12">
    
        <div class="card">
            <div class="card-header">
                <h4>
                    Add User
                    <a href="users.php" style="background-color:#CEC0B9; color:#4C3F31;" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="code.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Phone No.</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label>Select Role</label>
                                <select name="role" class="form-select">
                                    <option value="">Select role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Is Ban</label>
                                </br>
                                <input type="checkbox" name="is_ban" style="width:30px;height:30px">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                            </br>
                                <button type="submit" name="saveuser" style="background-color:#897062; color:white;" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>

</div>




<?php include("includes/footer.php");?>